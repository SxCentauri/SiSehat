<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $schedules = $request->user()->doctorSchedules()->orderBy('day_of_week')->get();
        return view('doctor.schedule.index', compact('schedules'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'day_of_week' => 'required|integer|min:0|max:6',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_available' => 'sometimes|boolean'
        ]);

        $data['is_available'] = $request->boolean('is_available');
        $request->user()->doctorSchedules()->create($data);

        return back()->with('ok', 'Jadwal ditambahkan');
    }

    public function destroy(DoctorSchedule $schedule, Request $request)
    {
        abort_unless($schedule->doctor_id === $request->user()->id, 403);
        $schedule->delete();
        return back()->with('ok', 'Jadwal dihapus');
    }
}
