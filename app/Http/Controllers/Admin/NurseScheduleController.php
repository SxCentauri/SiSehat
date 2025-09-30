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
        $query = NurseSchedule::query()->with('nurse')->latest();

        if ($search = $request->string('q')->trim()) {
            $query->where(function ($q) use ($search) {
                $q->where('nurse_name', 'like', "%{$search}%")
                  ->orWhere('task', 'like', "%{$search}%")
                  ->orWhere('schedule_date', 'like', "%{$search}%");
            });
        }

        $items = $query->paginate(20)->withQueryString();
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
        $validatedData = $request->validate([
            'nurse_id'      => 'required|exists:users,id',
            'task'          => 'required|string|max:255',
            'schedule_date' => 'required|date',
        ]);

        $nurse = User::find($validatedData['nurse_id']);
        $validatedData['nurse_name'] = $nurse->name;

        NurseSchedule::create($validatedData);

        return to_route('admin.nurse-schedules.index')->with('success', 'Jadwal perawat berhasil dibuat.');
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
        $validatedData = $request->validate([
            'nurse_id'      => 'required|exists:users,id',
            'task'          => 'required|string|max:255',
            'schedule_date' => 'required|date',
        ]);

        $nurse = User::find($validatedData['nurse_id']);
        $validatedData['nurse_name'] = $nurse->name;

        $nurse_schedule->update($validatedData);

        return to_route('admin.nurse-schedules.index')->with('success', 'Jadwal perawat berhasil diperbarui.');
    }

    public function destroy(NurseSchedule $nurse_schedule)
    {
        $nurse_schedule->delete();
        return back()->with('success', 'Jadwal perawat berhasil dihapus.');
    }
}
