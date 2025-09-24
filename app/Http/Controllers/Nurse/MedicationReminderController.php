<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\MedicationReminder;
use App\Models\User;
use Illuminate\Http\Request;

class MedicationReminderController extends Controller
{
    public function index()
    {
        // Eager load relasi 'patient' untuk efisiensi query
        $reminders = MedicationReminder::with('patient')->latest()->paginate(10);
        return view('nurse.reminders.index', compact('reminders'));
    }

    public function create()
    {
        // Ambil semua user dengan role 'user' untuk ditampilkan di dropdown
        $patients = User::where('role', 'user')->orderBy('name')->get();
        return view('nurse.reminders.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'medication' => 'required|string|max:100',
            'dosage'     => 'nullable|string|max:100',
            'time'       => 'required|date_format:H:i',
        ]);

        MedicationReminder::create($request->all());
        return redirect()->route('nurse.reminders.index')->with('success', 'Reminder obat berhasil ditambahkan.');
    }

    public function edit(MedicationReminder $reminder)
    {
        $patients = User::where('role', 'user')->orderBy('name')->get();
        return view('nurse.reminders.edit', compact('reminder', 'patients'));
    }

    public function update(Request $request, MedicationReminder $reminder)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'medication' => 'required|string|max:100',
            'dosage'     => 'nullable|string|max:100',
            'time'       => 'required|date_format:H:i',
            'status'     => 'required|in:pending,done',
        ]);

        $reminder->update($request->all());
        return redirect()->route('nurse.reminders.index')->with('success', 'Reminder obat berhasil diperbarui.');
    }

    public function destroy(MedicationReminder $reminder)
    {
        $reminder->delete();
        return redirect()->route('nurse.reminders.index')->with('success', 'Reminder obat berhasil dihapus.');
    }
}
