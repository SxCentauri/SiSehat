<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\ChatMessage;
use App\Models\DoctorProfile;
use App\Models\MedicalRecord;
use App\Models\DoctorSupport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; // [FIX] Menggunakan namespace yang benar untuk Auth

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $doctorId = Auth::id(); // Sekarang Auth::id() akan berfungsi dengan benar
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        // Kartu statistik
        $pendingCount   = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'pending')->count();

        $todayApproved  = Appointment::where('doctor_id', $doctorId)
            ->where('status', 'approved')
            ->whereDate('date', $today)
            ->count();

        $recordsCount   = MedicalRecord::where('doctor_id', $doctorId)->count();

        // Pesan belum dibaca (dari pasien)
        $unreadMessages = ChatMessage::where('doctor_id', $doctorId)
            ->where('sender_type', 'patient')
            ->whereNull('read_at')
            ->count();

        // Next 5 upcoming appointments (approved/pending)
        $upcoming = Appointment::with('patient')
            ->where('doctor_id', $doctorId)
            ->whereIn('status', ['approved', 'pending'])
            ->whereDate('date', '>=', $today)
            ->orderBy('date')
            ->orderBy('time')
            ->limit(5)
            ->get();

        $supportRequestsCount = DoctorSupport::where('dokter_id', $doctorId)
            ->whereIn('status', ['Terkirim', 'Dilihat'])
            ->count();

        // Skor kelengkapan profil
        $profile = DoctorProfile::firstOrCreate(['user_id' => $doctorId]);
        $fields  = ['specialization', 'bio', 'clinic_address', 'phone', 'avatar_path'];
        $filled  = collect($fields)->filter(fn($f) => !empty($profile->{$f}))->count();
        $profileScore = intval(($filled / count($fields)) * 100);

        return view('doctor.dashboard', compact(
            'pendingCount',
            'todayApproved',
            'recordsCount',
            'unreadMessages',
            'upcoming',
            'profileScore',
            'profile',
            'supportRequestsCount'
        ));
    }
}
