<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Queue;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $upcoming = Appointment::where('patient_id', $user->id)
            ->whereIn('status', ['pending', 'approved'])
            ->orderBy('date')->orderBy('time')
            ->limit(5)->get();

        $queues = Queue::whereHas('appointment', fn($q) => $q->where('patient_id', $user->id))
            ->orderByDesc('created_at')->limit(5)->get();

        $recentRecords = MedicalRecord::where('patient_id', $user->id)
            ->orderByDesc('created_at')->limit(5)->get();

        return view('patient.dashboard', compact('upcoming', 'queues', 'recentRecords'));
    }
}
