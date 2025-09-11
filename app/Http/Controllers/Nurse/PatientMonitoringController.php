<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\PatientMonitoring;
use Illuminate\Http\Request;

class PatientMonitoringController extends Controller
{
    /**
     * Tampilkan semua data monitoring pasien.
     */
    public function index()
    {
        $monitorings = PatientMonitoring::latest()->paginate(10);
        return view('nurse.monitorings.index', compact('monitorings'));
    }

    /**
     * Form tambah data monitoring.
     */
    public function create()
    {
        return view('nurse.monitorings.create');
    }

    /**
     * Simpan data monitoring baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_name'  => 'required|string|max:100',
            'condition'     => 'required|string|max:255',
            'notes'         => 'nullable|string',
            'recorded_at'   => 'required|date',
        ]);

        PatientMonitoring::create($request->all());

        return redirect()->route('nurse.monitorings.index')
                         ->with('success', 'Data monitoring pasien berhasil ditambahkan.');
    }

    /**
     * Detail monitoring pasien.
     */
    public function show(PatientMonitoring $monitoring)
    {
        return view('nurse.monitorings.show', compact('monitoring'));
    }

    /**
     * Form edit monitoring.
     */
    public function edit(PatientMonitoring $monitoring)
    {
        return view('nurse.monitorings.edit', compact('monitoring'));
    }

    /**
     * Update monitoring pasien.
     */
    public function update(Request $request, PatientMonitoring $monitoring)
    {
        $request->validate([
            'patient_name'  => 'required|string|max:100',
            'condition'     => 'required|string|max:255',
            'notes'         => 'nullable|string',
            'recorded_at'   => 'required|date',
        ]);

        $monitoring->update($request->all());

        return redirect()->route('nurse.monitorings.index')
                         ->with('success', 'Data monitoring pasien berhasil diperbarui.');
    }

    /**
     * Hapus monitoring pasien.
     */
    public function destroy(PatientMonitoring $monitoring)
    {
        $monitoring->delete();

        return redirect()->route('nurse.monitorings.index')
                         ->with('success', 'Data monitoring pasien berhasil dihapus.');
    }
}
