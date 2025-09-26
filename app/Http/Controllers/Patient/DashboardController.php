<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\RoomStatus;
use App\Models\RoomBooking;
use App\Models\MedicationReminder;
use App\Models\EmergencyResponse; // Import model EmergencyResponse
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

        $recentRecords = MedicalRecord::where('patient_id', $user->id)
            ->orderByDesc('created_at')->limit(5)->get();

        $roomStatuses = RoomStatus::orderBy('name')->get();

        $pendingBookingCount = RoomBooking::where('patient_id', $user->id)
            ->where('status', 'pending')
            ->count();

        // [TAMBAHAN] Menghitung kasus darurat yang masih aktif (pending atau approved)
        $emergencyCount = EmergencyResponse::where('patient_id', $user->id)
            ->whereIn('status', ['pending', 'approved'])
            ->count();

        // Variabel lain yang mungkin Anda butuhkan dari history
        $pendingRemindersCount = MedicationReminder::where('patient_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $medicalRecordCount = MedicalRecord::where('patient_id', $user->id)->count();

        return view('patient.dashboard', compact(
            'upcoming',
            'recentRecords',
            'roomStatuses',
            'pendingBookingCount',
            'emergencyCount', // Mengirim data hitungan ke view
            'pendingRemindersCount',
            'medicalRecordCount',
        ));
    }
}

