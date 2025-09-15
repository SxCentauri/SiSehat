<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\MedicationReminder;
use Illuminate\Http\Request;

class MedicationReminderController extends Controller
{
    public function index()
    {
        $reminders = MedicationReminder::paginate(10);
        return view('nurse.reminders.index', compact('reminders'));
    }

    public function create()
    {
        return view('nurse.reminders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:100',
            'medication'   => 'required|string|max:100',
            'dosage'       => 'nullable|string|max:100',
            'time'         => 'required',
            'status'       => 'required|in:pending,done',
        ]);

        MedicationReminder::create($request->all());
        return redirect()->route('nurse.reminders.index')->with('ok', 'Reminder obat ditambahkan.');
    }

    public function edit(MedicationReminder $reminder)
    {
        return view('nurse.reminders.edit', compact('reminder'));
    }

    public function update(Request $request, MedicationReminder $reminder)
    {
        $request->validate([
            'patient_name' => 'required|string|max:100',
            'medication'   => 'required|string|max:100',
            'dosage'       => 'nullable|string|max:100',
            'time'         => 'required',
            'status'       => 'required|in:pending,done',
        ]);

        $reminder->update($request->all());
        return redirect()->route('nurse.reminders.index')->with('ok', 'Reminder obat diperbarui.');
    }

    public function destroy(MedicationReminder $reminder)
    {
        $reminder->delete();
        return redirect()->route('nurse.reminders.index')->with('ok', 'Reminder obat dihapus.');
    }
}
