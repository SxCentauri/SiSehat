<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index(Request $request)
    {
        $records = MedicalRecord::where('doctor_id', $request->user()->id)
        ->with(['patient', 'appointment', 'treatments'])
        ->orderBy('created_at', 'desc')
        ->get();
    
    return view('doctor.records.index', compact('records'));
    }

    public function create(Appointment $appointment, Request $request)
    {
        abort_unless($appointment->doctor_id === $request->user()->id, 403);
        return view('doctor.records.create', compact('appointment'));
    }

    public function store(Appointment $appointment, Request $request)
    {
        abort_unless($appointment->doctor_id === $request->user()->id, 403);

        $data = $request->validate([
            'complaints' => 'nullable|string',
            'diagnosis'  => 'nullable|string',
            'notes'      => 'nullable|string',
        ]);

        $record = MedicalRecord::create([
            'patient_id'    => $appointment->patient_id,
            'doctor_id'     => $appointment->doctor_id,
            'appointment_id' => $appointment->id,
            'complaints'    => $data['complaints'] ?? null,
            'diagnosis'     => $data['diagnosis'] ?? null,
            'notes'         => $data['notes'] ?? null,
        ]);

        return redirect()->route('doctor.records.show', $record)->with('ok', 'Rekam medis tersimpan');
    }

    public function show(MedicalRecord $record, Request $request)
    {
        abort_unless($record->doctor_id === $request->user()->id || $record->patient_id === $request->user()->id, 403);
        
        // Load relationships dengan eager loading
        $record->load([
            'treatments', 
            'patient', 
            'doctor', 
            'appointment'
        ]);
        
        return view('doctor.records.show', compact('record'));
    }
}