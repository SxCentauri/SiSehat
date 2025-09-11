<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Menampilkan daftar pasien yang pernah chat dengan dokter
     */
    public function index()
{
    $doctorId = auth()->id();

    // Ambil daftar pasien yang pernah mengirim pesan ke dokter ini
    $patients = User::whereHas('messagesAsPatient', function($query) use ($doctorId) {
            $query->where('doctor_id', $doctorId);
        })
        ->with(['messagesAsPatient' => function($query) use ($doctorId) {
            $query->where('doctor_id', $doctorId)
                  ->latest()
                  ->take(1);
        }])
        ->get();

    // Hubungkan pesan terakhir agar bisa diakses di Blade
    $patients->each(function ($patient) {
        $patient->latest_message = $patient->messagesAsPatient->first();
    });

    return view('doctor.chat.index', compact('patients'));
}

    /**
     * Menampilkan percakapan antara dokter dan pasien tertentu
     */
    public function thread(User $patient, Request $request)
    {
        abort_unless($request->user()->role === 'doctor', 403);

        $messages = ChatMessage::where('doctor_id', $request->user()->id)
            ->where('patient_id', $patient->id)
            ->orderBy('created_at')
            ->get();

        return view('doctor.chat.thread', compact('patient', 'messages'));
    }

    /**
     * Dokter mengirim pesan ke pasien
     */
    public function send(User $patient, Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        ChatMessage::create([
            'doctor_id'   => $request->user()->id,
            'patient_id'  => $patient->id,
            'sender_type' => 'doctor',
            'message'     => $data['message'],
        ]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
