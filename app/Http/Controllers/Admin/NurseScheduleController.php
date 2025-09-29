<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NurseSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class NurseScheduleController extends Controller
{
    public function index(Request $request)
    {
        $q = NurseSchedule::query()->with('nurse')->latest();

        if ($s = $request->string('q')->toString()) {
            $q->where(function ($qq) use ($s) {
                $qq->where('day_of_week', 'like', "%{$s}%")
                    ->orWhere('notes', 'like', "%{$s}%")
                    ->orWhereHas('nurse', fn($n) => $n->where('name', 'like', "%{$s}%"));
            });
        }

        $items = $q->paginate(20)->withQueryString();   // <-- pakai $items
        return view('admin.nurse-schedules.index', compact('items'));
    }

    public function create()
    {
        return view('admin.nurse-schedules.create', [
            'nurses' => User::whereIn('role', ['perawat', 'nurse'])->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nurse_id'    => 'required|exists:users,id',
            'day_of_week' => 'required|string|max:20',     // Senin, Selasa, dst
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i|after:start_time',
            'notes'       => 'nullable|string',
        ]);

        NurseSchedule::create($data);
        return to_route('admin.nurse-schedules.index')->with('success', 'Schedule created');
    }

    public function edit(NurseSchedule $nurse_schedule)
    {
        return view('admin.nurse-schedules.edit', [
            'nurse_schedule' => $nurse_schedule,
            'nurses'         => User::whereIn('role', ['perawat', 'nurse'])->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, NurseSchedule $nurse_schedule)
    {
        $data = $request->validate([
            'nurse_id'    => 'required|exists:users,id',
            'day_of_week' => 'required|string|max:20',
            'start_time'  => 'required|date_format:H:i',
            'end_time'    => 'required|date_format:H:i|after:start_time',
            'notes'       => 'nullable|string',
        ]);

        $nurse_schedule->update($data);
        return to_route('admin.nurse-schedules.index')->with('success', 'Schedule updated');
    }

    public function destroy(NurseSchedule $nurse_schedule)
    {
        $nurse_schedule->delete();
        return back()->with('success', 'Schedule deleted');
    }
}
