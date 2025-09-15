<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // ✅ INI YANG BENAR
use Illuminate\Support\Facades\Auth;
use App\Models\DoctorProfile;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Kode ini akan berjalan setiap kali 'layouts.medicare' dipanggil
        View::composer('layouts.medicare', function ($view) {
            if (Auth::check()) { // Hanya jika user sudah login
                $profile = DoctorProfile::firstOrCreate(
                    ['user_id' => Auth::id()]
                );
                $view->with('profile', $profile); // Otomatis kirim $profile
            }
        });
    }
}
