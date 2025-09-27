<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmergencyResponse;
use App\Models\Appointment;
use App\Models\RoomStatus;
use App\Models\RoomBooking;
use App\Models\NurseSchedule;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        return view('admin.dashboard', [
            'stats' => [
                'patients'           => User::whereIn('role', ['user','patient'])->count(),
                'doctors'            => User::where('role','doctor')->count(),
                'nurses'             => User::whereIn('role', ['perawat','nurse'])->count(),
                'rooms'              => RoomStatus::count(),
                'emergencies_today'  => EmergencyResponse::whereDate('created_at', $today)->count(),
                'appointments_today' => Appointment::whereDate('date', $today)->count(),
                // fix: ganti start_at jadi created_at
                'bookings_today'     => RoomBooking::whereDate('created_at', $today)->count(),
            ],
            'recent' => [
                'appointments' => Appointment::with(['doctor','patient'])->latest()->limit(8)->get(),
                'emergencies'  => EmergencyResponse::latest()->limit(8)->get(),
                'bookings'     => RoomBooking::with(['room','patient','nurse'])->latest()->limit(8)->get(),
                'schedules'    => NurseSchedule::with('nurse')->latest()->limit(8)->get(),
            ],
        ]);
    }
}
