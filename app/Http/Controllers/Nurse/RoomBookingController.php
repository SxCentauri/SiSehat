<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use App\Models\RoomStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomBookingController extends Controller
{
    /**
     * Menampilkan daftar semua permintaan booking ruangan.
     */
    public function index()
    {
        $bookings = RoomBooking::with(['patient', 'room', 'nurse'])
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('nurse.room_bookings.index', compact('bookings'));
    }

    /**
     * Menampilkan form untuk mengelola booking yang pending.
     */
    public function edit(RoomBooking $roomBooking)
    {
        // Hanya booking yang 'pending' yang bisa diedit
        if ($roomBooking->status !== 'pending') {
            return redirect()->route('nurse.room-bookings.index')->with('error', 'Booking ini sudah diproses.');
        }

        // Ambil ruangan yang tersedia (kapasitas belum penuh)
        $availableRooms = RoomStatus::where('status', 'available')
            ->whereRaw('occupied < capacity')
            ->get();

        return view('nurse.room_bookings.edit', compact('roomBooking', 'availableRooms'));
    }

    /**
     * Memproses persetujuan atau penolakan booking.
     */
    public function update(Request $request, RoomBooking $roomBooking)
    {
        if ($roomBooking->status !== 'pending') {
            return back()->with('error', 'Booking ini sudah diproses sebelumnya.');
        }

        $status = $request->input('status');
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'room_id' => 'required_if:status,approved|exists:room_statuses,id',
            'rejection_reason' => 'nullable|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($request, $roomBooking, $status) {
                if ($status === 'approved') {
                    $room = RoomStatus::find($request->input('room_id'));

                    // Keamanan lapis kedua untuk cek kapasitas
                    if ($room->occupied >= $room->capacity) {
                        throw new \Exception('Kapasitas ruangan yang dipilih sudah penuh. Silakan pilih ruangan lain.');
                    }

                    $roomBooking->room_id = $room->id;
                    $room->occupied++;
                    $room->save();
                }

                $roomBooking->status = $status;
                $roomBooking->nurse_id = auth()->id();
                $roomBooking->rejection_reason = $request->input('rejection_reason');
                $roomBooking->save();
            });

            return redirect()->route('nurse.room-bookings.index')->with('success', 'Status booking berhasil diperbarui.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui booking: ' . $e->getMessage());
        }
    }

    /**
     * Menyelesaikan masa inap pasien dan mengosongkan ruangan.
     */
    public function checkout(RoomBooking $roomBooking)
    {
        if ($roomBooking->status !== 'approved' || is_null($roomBooking->room_id)) {
            return back()->with('error', 'Hanya booking yang disetujui dan memiliki ruangan yang bisa diselesaikan.');
        }

        try {
            DB::transaction(function () use ($roomBooking) {
                // 1. Ubah status booking menjadi 'completed'
                $roomBooking->status = 'completed';
                $roomBooking->save();

                // 2. Kurangi jumlah penghuni di ruangan terkait
                $room = RoomStatus::find($roomBooking->room_id);
                if ($room && $room->occupied > 0) {
                    $room->occupied--;
                    $room->save();
                }
            });

            return redirect()->route('nurse.room-bookings.index')->with('success', 'Pasien berhasil di-checkout dan ruangan telah diperbarui.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
    }
}

