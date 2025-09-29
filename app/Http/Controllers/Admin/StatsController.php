<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomStatus;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // --- Ruangan
        $totalRooms   = RoomStatus::count();
        $sumCapacity  = (int) RoomStatus::sum('capacity');
        $sumOccupied  = (int) RoomStatus::sum('occupied');
        $utilization  = $sumCapacity > 0 ? round(($sumOccupied / $sumCapacity) * 100) : 0;

        // --- Janji temu (pakai created_at sebagai fallback tanggal)
        $totalAppointments = Appointment::count();
        $todayAppointments = Appointment::whereDate('created_at', $today)->count();

        // --- Emergency (langsung via query builder supaya tidak tergantung model)
        $totalEmergencies  = DB::table('emergency_responses')->count();
        $todayEmergencies  = DB::table('emergency_responses')->whereDate('created_at', $today)->count();

        // --- Pengguna per peran (sesuai enum di DB: user/doctor/perawat)
        $patients = User::where('role', 'user')->count();
        $doctors  = User::where('role', 'doctor')->count();
        $nurses   = User::where('role', 'perawat')->count();

        // --- Tren 7 hari (pakai created_at)
        $labels = [];
        $appointmentsDaily = [];
        $emergenciesDaily  = [];
        for ($i = 6; $i >= 0; $i--) {
            $d = $today->copy()->subDays($i);
            $labels[] = $d->format('d M');
            $appointmentsDaily[] = Appointment::whereDate('created_at', $d)->count();
            $emergenciesDaily[]  = DB::table('emergency_responses')->whereDate('created_at', $d)->count();
        }
        $maxDaily = max(1, max($appointmentsDaily), max($emergenciesDaily));

        return view('admin.stats.index', compact(
            'today',
            'totalRooms',
            'sumCapacity',
            'sumOccupied',
            'utilization',
            'totalAppointments',
            'todayAppointments',
            'totalEmergencies',
            'todayEmergencies',
            'patients',
            'doctors',
            'nurses',
            'labels',
            'appointmentsDaily',
            'emergenciesDaily',
            'maxDaily'
        ));
    }
}
