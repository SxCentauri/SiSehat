<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\NurseSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseScheduleController extends Controller
{
    /**
     * Menampilkan daftar jadwal HANYA untuk perawat yang sedang login.
     */
    public function index()
    {
        $schedules = NurseSchedule::where('nurse_id', Auth::id())
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('nurse.schedules.index', compact('schedules'));
    }

    /**
     * Menampilkan form untuk membuat jadwal baru.
     */
    public function create()
    {
        $nurseName = Auth::user()->name;
        return view('nurse.schedules.create', compact('nurseName'));
    }

    /**
     * Menyimpan jadwal baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shift' => 'required|string|in:Pagi,Siang,Malam',
            'task'  => 'required|string',
            'date'  => 'required|date',
        ]);

        $user = Auth::user();

        $scheduleData = [
            'nurse_id'      => $user->id,
            'nurse_name'    => $user->name, // Mengisi kolom nurse_name
            'task'          => 'Shift ' . $validatedData['shift'] . ': ' . $validatedData['task'],
            'schedule_date' => $validatedData['date'],
        ];

        NurseSchedule::create($scheduleData);

        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit jadwal.
     */
    public function edit(NurseSchedule $schedule)
    {
        // Keamanan: Pastikan perawat hanya bisa mengedit jadwal miliknya sendiri.
        if ($schedule->nurse_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit jadwal ini.');
        }

        return view('nurse.schedules.edit', compact('schedule'));
    }

    /**
     * Memperbarui jadwal di database.
     */
    public function update(Request $request, NurseSchedule $schedule)
    {
        // Keamanan: Pastikan perawat hanya bisa mengupdate jadwal miliknya sendiri.
        if ($schedule->nurse_id !== Auth::id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'shift' => 'required|string|in:Pagi,Siang,Malam',
            'task'  => 'required|string',
            'date'  => 'required|date',
        ]);

        // ✅ DEFINISIKAN $user DI SINI UNTUK MENGHINDARI ERROR
        $user = Auth::user();

        $scheduleData = [
            'nurse_name'    => $user->name, // Pastikan nama juga diupdate jika perlu
            'task'          => 'Shift ' . $validatedData['shift'] . ': ' . $validatedData['task'],
            'schedule_date' => $validatedData['date'],
        ];

        $schedule->update($scheduleData);

        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Menghapus jadwal dari database.
     */
    public function destroy(NurseSchedule $schedule)
    {
        // Keamanan: Pastikan perawat hanya bisa menghapus jadwal miliknya sendiri.
        if ($schedule->nurse_id !== Auth::id()) {
            abort(403);
        }

        $schedule->delete();

        return redirect()->route('nurse.schedules.index')->with('ok', 'Jadwal berhasil dihapus.');
    }
}

