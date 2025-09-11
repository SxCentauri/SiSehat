<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\EmergencyResponse;
use Illuminate\Http\Request;

class EmergencyResponseController extends Controller
{
    public function index()
    {
        $responses = EmergencyResponse::all();
        return view('nurse.emergencies.index', compact('responses'));
    }

    public function create()
    {
        return view('nurse.emergencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:100',
            'description'  => 'required|string',
            'level'        => 'required|in:low,medium,high,critical',
            'status'       => 'required|in:pending,handled,resolved',
        ]);

        EmergencyResponse::create($request->all());
        return redirect()->route('nurse.emergencies.index')->with('ok', 'Laporan emergency dibuat.');
    }

    public function edit(EmergencyResponse $emergency)
    {
        return view('nurse.emergencies.edit', compact('emergency'));
    }

    public function update(Request $request, EmergencyResponse $emergency)
    {
        $request->validate([
            'patient_name' => 'required|string|max:100',
            'description'  => 'required|string',
            'level'        => 'required|in:low,medium,high,critical',
            'status'       => 'required|in:pending,handled,resolved',
        ]);

        $emergency->update($request->all());
        return redirect()->route('nurse.emergencies.index')->with('ok', 'Laporan emergency diperbarui.');
    }

    public function destroy(EmergencyResponse $emergency)
    {
        $emergency->delete();
        return redirect()->route('nurse.emergencies.index')->with('ok', 'Laporan emergency dihapus.');
    }
}
