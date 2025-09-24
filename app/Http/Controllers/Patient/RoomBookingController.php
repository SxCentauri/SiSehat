<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomBookingController extends Controller
{
    /**
     * Menampilkan riwayat booking ruangan pasien.
     */
    public function index()
    {
        $bookings = RoomBooking::where('patient_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('patient.bookingroom.index', compact('bookings'));
    }

    /**
     * Menampilkan formulir untuk membuat booking baru.
     */
    public function create()
    {
        return view('patient.bookingroom.create');
    }

    /**
     * Menyimpan data booking baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'condition' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        RoomBooking::create([
            'patient_id' => Auth::id(),
            'condition' => $request->condition,
            'notes' => $request->notes,
        ]);

        return redirect()->route('patient.bookingroom.index')->with('success', 'Permintaan booking ruangan berhasil dikirim.');
    }
}
