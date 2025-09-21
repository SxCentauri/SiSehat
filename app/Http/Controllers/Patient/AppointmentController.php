<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $items = Appointment::where('patient_id', Auth::id())
            ->orderByDesc('date')->orderByDesc('time')->paginate(10);
        return view('patient.appointments.index', compact('items'));
    }

    public function create()
    {
        // daftar dokter (user role doctor)
        $doctors = User::where('role', 'doctor')->orderBy('name')->get();
        return view('patient.appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => ['required', 'exists:users,id'],
            'date'      => ['required', 'date'],
            'time'      => ['required'],
            'reason'    => ['nullable', 'string', 'max:500'],
        ]);

        $appt = Appointment::create([
            'patient_id' => Auth::id(),
            'doctor_id'  => $request->doctor_id,
            'date'       => $request->date,
            'time'       => $request->time,
            'status'     => 'pending',
            'reason'     => $request->reason,
        ]);

        return redirect()->route('patient.appointments.index')->with('success', 'Pengajuan janji temu dikirim.');
    }
}
