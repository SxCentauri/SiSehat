<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function thread(User $patient, Request $request)
    {
        abort_unless($request->user()->role === 'doctor', 403);

        $messages = ChatMessage::where('doctor_id', $request->user()->id)
            ->where('patient_id', $patient->id)
            ->orderBy('created_at')
            ->get();

        return view('doctor.chat.thread', compact('patient', 'messages'));
    }

    public function send(User $patient, Request $request)
    {
        $data = $request->validate(['message' => 'required|string']);

        ChatMessage::create([
            'doctor_id'   => $request->user()->id,
            'patient_id'  => $patient->id,
            'sender_type' => 'doctor',
            'message'     => $data['message'],
        ]);

        return back();
    }
}
