<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- 1. Impor class Auth
use App\Models\DoctorProfile;

class WelcomeController extends Controller
{
    public function index()
    {
        $profile = null; // 3. Set profil ke null secara default

        // 4. Periksa apakah ada pengguna yang sedang login
        if (Auth::check()) {
            $user = Auth::user();

            // 5. Ambil profil berdasarkan peran pengguna
            if ($user->role === 'doctor') {
                $profile = DoctorProfile::firstOrCreate(['user_id' => $user->id]);
            } elseif ($user->role === 'nurse') {
                // Tambahkan ini jika perawat juga punya profil
                // $profile = NurseProfile::firstOrCreate(['user_id' => $user->id]);
            }
            // Tambahkan peran lain jika perlu
        }

        // 6. Kirim variabel $profile (yang bisa jadi berisi data atau null) ke view
        return view('welcome', compact('profile'));
    }
}
