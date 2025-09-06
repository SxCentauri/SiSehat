<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $appointments = Appointment::where('doctor_id', $request->user()->id)
            ->orderByDesc('date')->orderByDesc('time')
            ->paginate(15);

        return view('doctor.appointments.index', compact('appointments'));
    }

    public function approve(Appointment $appointment, Request $request)
    {
        abort_unless($appointment->doctor_id === $request->user()->id, 403);
        $appointment->update(['status' => 'approved']);
        return back()->with('ok', 'Booking disetujui');
    }

    public function reject(Appointment $appointment, Request $request)
    {
        abort_unless($appointment->doctor_id === $request->user()->id, 403);
        $appointment->update(['status' => 'rejected']);
        return back()->with('ok', 'Booking ditolak');
    }

    public function complete(Appointment $appointment, Request $request)
    {
        abort_unless($appointment->doctor_id === $request->user()->id, 403);
        $appointment->update(['status' => 'completed']);
        return back()->with('ok', 'Booking selesai');
    }
}
