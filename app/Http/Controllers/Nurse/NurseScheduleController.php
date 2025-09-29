<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\NurseSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseScheduleController extends Controller
{
    /**
     * Tampilkan jadwal milik perawat yang sedang login.
     */
    public function index()
    {
        $schedules = NurseSchedule::with('nurse') // eager-load relasi biar efisien
            ->where('nurse_id', Auth::id())
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('nurse.schedules.index', compact('schedules'));
    }

    /**
     * Form buat tambah jadwal (pakai skema sederhana milik perawat).
     */
    public function create()
    {
        $nurseName = Auth::user()->name;
        return view('nurse.schedules.create', compact('nurseName'));
    }

    /**
     * Simpan jadwal baru (mengisi kolom: nurse_name, task, schedule_date).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'shift' => 'required|string|in:Pagi,Siang,Malam',
            'task'  => 'required|string',
            'date'  => 'required|date',
        ]);

        $user = Auth::user();

        NurseSchedule::create([
            'nurse_id'      => $user->id,
            'nurse_name'    => $user->name,
            'task'          => 'Shift ' . $validated['shift'] . ': ' . $validated['task'],
            'schedule_date' => $validated['date'],
        ]);

        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Form edit jadwal.
     */
    public function edit(NurseSchedule $schedule)
    {
        if ($schedule->nurse_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit jadwal ini.');
        }

        return view('nurse.schedules.edit', compact('schedule'));
    }

    /**
     * Update jadwal (pakai skema perawat).
     */
    public function update(Request $request, NurseSchedule $schedule)
    {
        if ($schedule->nurse_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'shift' => 'required|string|in:Pagi,Siang,Malam',
            'task'  => 'required|string',
            'date'  => 'required|date',
        ]);

        $user = Auth::user();

        $schedule->update([
            'nurse_name'    => $user->name,
            'task'          => 'Shift ' . $validated['shift'] . ': ' . $validated['task'],
            'schedule_date' => $validated['date'],
        ]);

        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Hapus jadwal.
     */
    public function destroy(NurseSchedule $schedule)
    {
        if ($schedule->nurse_id !== Auth::id()) {
            abort(403);
        }

        $schedule->delete();

        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil dihapus.');
    }
}
