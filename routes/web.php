<?php

use Illuminate\Support\Facades\Route;

// === Breeze / Profile bawaan ===
use App\Http\Controllers\ProfileController;

// === Dokter Controllers ===
use App\Http\Controllers\Doctor\{
    DashboardController,
    ProfileController as DoctorProfileController,
    ScheduleController,
    AppointmentController,
    ChatController,
    MedicalRecordController,
    TreatmentController
};

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('home');

/*
|--------------------------------------------------------------------------
| Breeze default (dashboard + profile user biasa)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Dokter Area (protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:doctor'])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {

        // Dashboard dokter → name: doctor.dashboard, URL: /doctor
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // >>> Tambahkan alias ini agar /doctor/dashboard tidak 404
        Route::get('/dashboard', fn() => redirect()->route('doctor.dashboard'));

        // Profil dokter
        Route::get('/profile/edit',    [DoctorProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update', [DoctorProfileController::class, 'update'])->name('profile.update');

        // Jadwal
        Route::get('/schedules',                  [ScheduleController::class, 'index'])->name('schedules.index');
        Route::post('/schedules',                 [ScheduleController::class, 'store'])->name('schedules.store');
        Route::delete('/schedules/{schedule}',    [ScheduleController::class, 'destroy'])->name('schedules.destroy');

        // Appointments
        Route::get('/appointments',                        [AppointmentController::class, 'index'])->name('appointments.index');
        Route::post('/appointments/{appointment}/approve', [AppointmentController::class, 'approve'])->name('appointments.approve');
        Route::post('/appointments/{appointment}/reject',  [AppointmentController::class, 'reject'])->name('appointments.reject');
        Route::post('/appointments/{appointment}/complete', [AppointmentController::class, 'complete'])->name('appointments.complete');

        // Chat
        Route::get('/chat/{patient}',  [ChatController::class, 'thread'])->name('chat.thread');
        Route::post('/chat/{patient}', [ChatController::class, 'send'])->name('chat.send');

        // Rekam Medis
        Route::get('/records/create/{appointment}', [MedicalRecordController::class, 'create'])->name('records.create');
        Route::post('/records/store/{appointment}', [MedicalRecordController::class, 'store'])->name('records.store');
        Route::get('/records/{record}',             [MedicalRecordController::class, 'show'])->name('records.show');

        // Perawatan
        Route::post('/records/{record}/treatments', [TreatmentController::class, 'store'])->name('treatments.store');
    });

// Debug helper (opsional)
Route::get('/debug-send-verification', function () {
    $u = \App\Models\User::first();
    if (!$u) return 'No user';
    $u->sendEmailVerificationNotification();
    return 'Sent. Cek storage/logs/laravel.log';
});
