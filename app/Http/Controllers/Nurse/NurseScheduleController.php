<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\NurseSchedule;
use Illuminate\Http\Request;

class NurseScheduleController extends Controller
{
    public function index()
    {
        $schedules = NurseSchedule::all();
        return view('nurse.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('nurse.schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nurse_name' => 'required|string|max:100',
            'task' => 'required|string|max:255',
            'schedule_date' => 'required|date',
        ]);

        NurseSchedule::create($request->all());
        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(NurseSchedule $schedule)
    {
        return view('nurse.schedules.edit', compact('schedule'));
    }

    public function update(Request $request, NurseSchedule $schedule)
    {
        $request->validate([
            'nurse_name' => 'required|string|max:100',
            'task' => 'required|string|max:255',
            'schedule_date' => 'required|date',
        ]);

        $schedule->update($request->all());
        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(NurseSchedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil dihapus.');
    }
}
