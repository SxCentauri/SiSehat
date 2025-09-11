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

// === Nurse Controllers ===
use App\Http\Controllers\Nurse\{
    NurseDashboardController,
    NurseScheduleController,
    PatientMonitoringController,
    RoomStatusController,
    MedicationReminderController,
    DoctorSupportController,
    EmergencyResponseController
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
    $user = auth()->user();

    if ($user->role === 'doctor') {
        return redirect()->route('doctor.dashboard');
    }
    if ($user->role === 'perawat') {
        return redirect()->route('nurse.dashboard');
    }

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

        Route::get('/chats', [ChatController::class, 'index'])->name('chat.index'); // Daftar pasien chat
        Route::get('/chat/{patient}', [ChatController::class, 'thread'])->name('chat.thread'); // Lihat percakapan
        Route::post('/chat/{patient}', [ChatController::class, 'send'])->name('chat.send');   // Kirim pesan
        
        // Rekam Medis
        Route::get('/records', [MedicalRecordController::class, 'index'])->name('records.index');
        Route::get('/records/create/{appointment}', [MedicalRecordController::class, 'create'])->name('records.create');
        Route::post('/records/store/{appointment}', [MedicalRecordController::class, 'store'])->name('records.store');
        Route::get('/records/{record}', [MedicalRecordController::class, 'show'])->name('records.show');

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

/*
|--------------------------------------------------------------------------
| Nurse Area (protected)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:perawat'])
    ->prefix('nurse')
    ->name('nurse.')
    ->group(function () {

        // Dashboard perawat → name: nurse.dashboard, URL: /nurse
        Route::get('/', [NurseDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', fn() => redirect()->route('nurse.dashboard'));

        // Jadwal & Tugas Harian
        Route::resource('schedules', NurseScheduleController::class);

        // Pantau pasien rawat inap
        Route::resource('monitorings', PatientMonitoringController::class);

        // Update status ruangan
        Route::resource('rooms', RoomStatusController::class);

        // Reminder obat pasien
        Route::resource('reminders', MedicationReminderController::class);

        // Support dokter
        Route::resource('supports', DoctorSupportController::class);

        // Emergency respon
        Route::resource('emergencies', EmergencyResponseController::class);
    });
