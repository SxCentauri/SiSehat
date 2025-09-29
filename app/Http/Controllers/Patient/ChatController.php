<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $me = \Illuminate\Support\Facades\Auth::user();

        // Dokter yang pernah di-chat, urut terbaru
        $recentDoctorIds = ChatMessage::where('patient_id', $me->id)
            ->orderByDesc('created_at')
            ->pluck('doctor_id')
            ->unique()
            ->values();

        $recentDoctors = User::whereIn('id', $recentDoctorIds)->get();

        // Semua dokter lain (untuk mulai chat jika belum ada riwayat)
        $allDoctors = User::where('role', 'doctor')
            ->when($recentDoctorIds->isNotEmpty(), fn($q) => $q->whereNotIn('id', $recentDoctorIds))
            ->orderBy('name')
            ->get();

        // Hitung pesan belum dibaca dari dokter per doctor_id
        $unread = ChatMessage::selectRaw('doctor_id, COUNT(*) as unread')
            ->where('patient_id', $me->id)
            ->where('sender_type', 'doctor')
            ->whereNull('read_at')
            ->groupBy('doctor_id')
            ->pluck('unread', 'doctor_id');

        return view('patient.chats.index', compact('recentDoctors', 'allDoctors', 'unread'));
    }

    public function show(User $doctor)
    {
        abort_unless($doctor->role === 'doctor', 404);

        $user = Auth::user();
        $messages = ChatMessage::where('doctor_id', $doctor->id)
            ->where('patient_id', $user->id)
            ->orderBy('created_at')
            ->get();

        // set read_at untuk pesan dokter → pasien
        ChatMessage::where('doctor_id', $doctor->id)
            ->where('patient_id', $user->id)
            ->where('sender_type', 'doctor')
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('patient.chats.thread', compact('doctor', 'messages'));
    }

    public function store(Request $request, User $doctor)
    {
        abort_unless($doctor->role === 'doctor', 404);

        $request->validate([
            'message' => ['required', 'string', 'max:2000']
        ]);

        ChatMessage::create([
            'doctor_id'   => $doctor->id,
            'patient_id'  => Auth::id(),
            'sender_type' => 'patient',
            'message'     => $request->message,
        ]);

        return back();
    }
}
