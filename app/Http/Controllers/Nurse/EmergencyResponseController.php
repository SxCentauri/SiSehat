<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\EmergencyResponse;
use App\Models\RoomStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmergencyResponseController extends Controller
{
    /**
     * Menampilkan daftar permintaan darurat.
     */
    public function index()
    {
        $emergencies = EmergencyResponse::with('patient')->orderByDesc('created_at')->paginate(10);
        return view('nurse.emergencies.index', compact('emergencies'));
    }

    /**
     * Menampilkan form untuk menangani permintaan darurat.
     */
    public function edit(EmergencyResponse $emergency)
    {
        // Hanya bisa mengedit permintaan yang masih pending
        if ($emergency->status !== 'pending') {
            return redirect()->route('nurse.emergencies.index')->with('error', 'Permintaan ini sudah ditangani.');
        }

        $doctors = User::where('role', 'doctor')->orderBy('name')->get();
        $availableRooms = RoomStatus::where('status', 'available')
            ->whereRaw('occupied < capacity')
            ->get();

        return view('nurse.emergencies.edit', compact('emergency', 'doctors', 'availableRooms'));
    }

    /**
     * Memproses dan menyimpan keputusan perawat.
     */
    public function update(Request $request, EmergencyResponse $emergency)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'assigned_doctor_id' => 'required_if:status,approved|exists:users,id',
            'assigned_room_id' => 'required_if:status,approved|exists:room_statuses,id',
        ]);

        try {
            DB::transaction(function () use ($request, $emergency) {
                $status = $request->input('status');

                $emergency->status = $status;
                $emergency->handled_by_nurse_id = Auth::id();

                if ($status === 'approved') {
                    $room = RoomStatus::findOrFail($request->input('assigned_room_id'));

                    if ($room->occupied >= $room->capacity) {
                        throw new \Exception('Kapasitas ruangan penuh. Pilih ruangan lain.');
                    }

                    $emergency->assigned_doctor_id = $request->input('assigned_doctor_id');
                    $emergency->assigned_room_id = $request->input('assigned_room_id');

                    // Update jumlah penghuni ruangan
                    $room->occupied++;
                    $room->save();
                }

                $emergency->save();
            });
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memproses permintaan: ' . $e->getMessage());
        }

        return redirect()->route('nurse.emergencies.index')->with('success', 'Permintaan darurat berhasil diproses.');
    }

    /**
     * [BARU] Menyelesaikan kasus darurat dan mengosongkan ruangan.
     */
    public function resolve(EmergencyResponse $emergency)
    {
        // Pastikan hanya kasus yang sudah disetujui yang bisa diselesaikan
        if ($emergency->status !== 'approved') {
            return back()->with('error', 'Hanya permintaan yang sudah disetujui yang bisa diselesaikan.');
        }

        try {
            DB::transaction(function () use ($emergency) {
                // 1. Ubah status emergency menjadi 'completed'
                $emergency->status = 'completed';
                $emergency->save();

                // 2. Jika ada ruangan yang terhubung, kurangi jumlah penghuninya
                if ($emergency->assigned_room_id) {
                    $room = RoomStatus::find($emergency->assigned_room_id);
                    if ($room && $room->occupied > 0) {
                        $room->occupied--;
                        $room->save();
                    }
                }
            });
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menyelesaikan permintaan: ' . $e->getMessage());
        }

        return redirect()->route('nurse.emergencies.index')->with('success', 'Kasus darurat telah ditandai selesai.');
    }
}
