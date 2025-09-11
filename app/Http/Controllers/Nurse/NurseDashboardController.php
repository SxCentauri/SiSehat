<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import semua model nurse
use App\Models\NurseSchedule;
use App\Models\PatientMonitoring;
use App\Models\RoomStatus;
use App\Models\MedicationReminder;
use App\Models\DoctorSupport;
use App\Models\EmergencyResponse;

class NurseDashboardController extends Controller
{
    public function index()
    {
        return view('nurse.dashboard', [
            'schedules'   => NurseSchedule::count(),
            'inpatients'  => PatientMonitoring::count(),
            'rooms'       => RoomStatus::count(),
            'reminders'   => MedicationReminder::count(),
            'supports'    => DoctorSupport::count(),
            'emergencies' => EmergencyResponse::count(),
        ]);
    }
}
