<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\MedicationReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicationReminderController extends Controller
{
    /**
     * Menampilkan daftar reminder obat untuk pasien yang sedang login.
     */
    public function index()
    {
        $reminders = MedicationReminder::where('patient_id', Auth::id())
            ->orderBy('time')
            ->get();

        return view('patient.reminders.index', compact('reminders'));
    }

    /**
     * Menandai reminder sebagai 'selesai' (done).
     */
    public function markAsDone(MedicationReminder $reminder)
    {
        // Otorisasi: Pastikan hanya pasien yang bersangkutan yang bisa mengubah status
        if ($reminder->patient_id !== Auth::id()) {
            return back()->with('error', 'Anda tidak diizinkan melakukan tindakan ini.');
        }

        // Update status menjadi 'done'
        $reminder->update(['status' => 'done']);

        return back()->with('success', 'Terima kasih! Status obat telah diperbarui.');
    }
}
