<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class ChatController extends Controller
{
    /**
     * Menampilkan daftar pasien yang pernah chat dengan dokter
     */
    public function index()
    {
        $doctorId = Auth::id();

        // Mengambil pasien dengan relasi 'latestMessage' yang sudah didefinisikan di model User
        // Ini lebih bersih dan efisien
        $patients = User::whereHas('messagesAsPatient', function ($query) use ($doctorId) {
                $query->where('doctor_id', $doctorId);
            })
            ->with('latestMessageForDoctor') // Menggunakan relasi yang disarankan
            ->get();

        return view('doctor.chat.index', compact('patients'));
    }

    /**
     * Menampilkan percakapan antara dokter dan pasien tertentu
     */
    public function thread(User $patient)
    {
        $doctor = Auth::user();

        // Keamanan: Pastikan dokter ini pernah berinteraksi dengan pasien ini.
        // Ini jauh lebih aman daripada hanya mengecek role.
        $hasChat = ChatMessage::where('doctor_id', $doctor->id)
                              ->where('patient_id', $patient->id)
                              ->exists();

        abort_unless($hasChat, 403, 'Anda tidak memiliki akses ke percakapan ini.');

        // Fungsionalitas: Tandai semua pesan dari pasien sebagai telah dibaca
        ChatMessage::where('patient_id', $patient->id)
            ->where('doctor_id', $doctor->id)
            ->where('sender_type', 'patient')
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        // PENTING: Ubah urutan menjadi 'desc' agar cocok dengan CSS 'column-reverse'
        $messages = ChatMessage::where('doctor_id', $doctor->id)
            ->where('patient_id', $patient->id)
            ->latest() // Ini adalah singkatan dari orderBy('created_at', 'desc')
            ->get();

        return view('doctor.chat.thread', compact('patient', 'messages'));
    }

    /**
     * Dokter mengirim pesan ke pasien
     */
    public function send(User $patient, Request $request)
    {
        // Keamanan: Anda bisa menambahkan pengecekan otorisasi di sini juga
        // atau menggunakan Laravel Policy untuk penanganan yang lebih baik.
        // Untuk saat ini, kita asumsikan jika dokter bisa mengirim, berarti dia berhak.

        $data = $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        ChatMessage::create([
            'doctor_id'   => Auth::id(),
            'patient_id'  => $patient->id,
            'sender_type' => 'doctor',
            'message'     => $data['message'],
        ]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}
