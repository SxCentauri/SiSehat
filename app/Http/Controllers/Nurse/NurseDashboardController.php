<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Import semua model nurse
use App\Models\NurseSchedule;
use App\Models\PatientMonitoring;
use App\Models\RoomStatus;
use App\Models\MedicationReminder;
use App\Models\DoctorSupport;
use App\Models\EmergencyResponse;
use App\Models\NurseProfile;
use App\Models\RoomBooking;

class NurseDashboardController extends Controller
{
    public function index()
    {
        $nurseId = Auth::id();

        // 1. Ambil atau buat profil perawat
        $profile = NurseProfile::firstOrCreate(['user_id' => $nurseId]);

        // 2. Definisikan field yang akan dihitung kelengkapannya
        $fields = ['department', 'bio', 'phone', 'avatar_path'];

        // 3. Hitung field yang sudah terisi
        $filled = collect($fields)->filter(fn($f) => !empty($profile->{$f}))->count();

        // 4. Hitung skor dalam persentase
        $profileScore = (count($fields) > 0) ? intval(($filled / count($fields)) * 100) : 0;

        $pendingBookingCount = RoomBooking::where('status', 'pending')->count();

        $pendingEmergenciesCount = EmergencyResponse::where('status', 'pending')->count();

        return view('nurse.dashboard', [
            'schedules'   => NurseSchedule::count(),
            'pendingBookings' => $pendingBookingCount,
            'rooms'       => RoomStatus::count(),
            'reminders'   => MedicationReminder::count(),
            'supports'    => DoctorSupport::count(),
            'emergencies' => $pendingEmergenciesCount,
            'profile'     => $profile,       // Variabel profil ditambahkan
            'profileScore'=> $profileScore,
        ]);
    }
}
