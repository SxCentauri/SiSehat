<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $q = Appointment::query()->with(['doctor','patient']);

        if ($s = $request->string('q')->toString()) {
            $q->where('status','like',"%{$s}%");
        }

        $appointments = $q->latest()->paginate(20)->withQueryString();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('admin.appointments.create', [
            'doctors'  => User::where('role','doctor')->orderBy('name')->get(),
            'patients' => User::whereIn('role',['user','patient'])->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id'  => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'date'       => 'required|date',
            'time'       => 'required',
            'status'     => 'required|string|max:50', // pending|approved|rejected|done|completed|canceled (sesuaikan)
            'notes'      => 'nullable|string',
        ]);

        Appointment::create($data);

        return to_route('admin.appointments.index')->with('success','Appointment created');
    }

    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', [
            'appointment' => $appointment,
            'doctors'     => User::where('role','doctor')->orderBy('name')->get(),
            'patients'    => User::whereIn('role',['user','patient'])->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'doctor_id'  => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'date'       => 'required|date',
            'time'       => 'required',
            'status'     => 'required|string|max:50',
            'notes'      => 'nullable|string',
        ]);

        $appointment->update($data);

        return to_route('admin.appointments.index')->with('success','Appointment updated');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success','Appointment deleted');
    }
}
