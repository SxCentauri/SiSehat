<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\DoctorProfile;
use App\Models\NurseProfile;

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
        View::composer('layouts.medicare', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $profile = null;

                if ($user->role === 'doctor') {
                    $profile = DoctorProfile::firstOrCreate(['user_id' => $user->id]);
                }
                elseif ($user->role === 'perawat') {
                    $profile = NurseProfile::firstOrCreate(['user_id' => $user->id]);
                }

                $view->with('profile', $profile);
            }
        });
    }
}