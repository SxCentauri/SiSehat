<?php

use Illuminate\Support\Facades\Route;

// === Breeze / Profile bawaan ===
use App\Http\Controllers\Doctor\ProfileController;
use App\Http\Controllers\WelcomeController;

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
// === user Controllers ===
use App\Http\Controllers\Patient\{
    DashboardController as PatientDashboardController,
    ChatController      as PatientChatController,
    RoomController      as PatientRoomController,
    AppointmentController as PatientAppointmentController,
    QueueController     as PatientQueueController,
    MedicalRecordController as PatientMedicalRecordController,
    PrescriptionController  as PatientPrescriptionController,
    PaymentController       as PatientPaymentController,
    EmergencyController     as PatientEmergencyController,
    RoomBookingController as PatientRoomBookingController,
    MedicationReminderController as PatientReminderController,
};


// === Nurse Controllers ===
use App\Http\Controllers\Nurse\{
    NurseDashboardController,
    NurseScheduleController,
    PatientMonitoringController,
    RoomStatusController,
    MedicationReminderController,
    DoctorSupportController,
    EmergencyResponseController,
    ProfileController as NurseProfileController,
    RoomBookingController as NurseRoomBookingController,

};
// === patent Controllers ===

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', [WelcomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Breeze default (dashboard + profile user biasa)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = auth()->user();
    if (!$user) {
        return redirect()->route('login');
    }

    return match ($user->role) {
        'doctor'  => redirect()->route('doctor.dashboard'),
        'perawat' => redirect()->route('nurse.dashboard'),
        default   => redirect()->route('patient.dashboard'), // <-- patient & role lain
    };
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
        Route::resource('/schedules', NurseScheduleController::class);

        // Pantau pasien rawat inap
        Route::resource('/monitorings', PatientMonitoringController::class);

        // Update status ruangan
        Route::resource('/rooms', RoomStatusController::class);

        // Reminder obat pasien
        Route::resource('/reminders', MedicationReminderController::class);

        // Support dokter
        Route::resource('/supports', DoctorSupportController::class);

        // Emergency respon
        Route::resource('/emergencies', EmergencyResponseController::class)->only(['index', 'edit', 'update']);
        Route::put('emergencies/{emergency}/resolve', [EmergencyResponseController::class, 'resolve'])->name('emergencies.resolve');

        // Profile
        Route::get('/profile', [NurseProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [NurseProfileController::class, 'update'])->name('profile.update');

        Route::get('/room-bookings', [NurseRoomBookingController::class, 'index'])->name('room-bookings.index');
        Route::get('/room-bookings/{roomBooking}/edit', [NurseRoomBookingController::class, 'edit'])->name('room-bookings.edit');
        Route::put('/room-bookings/{roomBooking}', [NurseRoomBookingController::class, 'update'])->name('room-bookings.update');
        Route::put('/room-bookings/{roomBooking}/checkout', [NurseRoomBookingController::class, 'checkout'])->name('room-bookings.checkout');
    });

    // --- Patient area ---
    Route::prefix('patient')->name('patient.')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/', [PatientDashboardController::class, 'index'])->name('dashboard');

    Route::get('/chats', [PatientChatController::class, 'index'])->name('chats.index');
    Route::get('/chats/{doctor}', [PatientChatController::class, 'show'])->name('chats.show');
    Route::post('/chats/{doctor}', [PatientChatController::class, 'store'])->name('chats.store');

    Route::get('/rooms', [PatientRoomController::class, 'index'])->name('rooms.index');

    Route::get('/appointments', [PatientAppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [PatientAppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [PatientAppointmentController::class, 'store'])->name('appointments.store');

    Route::get('/queues', [PatientQueueController::class, 'index'])->name('queues.index');

    Route::get('/records', [PatientMedicalRecordController::class, 'index'])->name('records.index');
    Route::get('/records/{record}', [PatientMedicalRecordController::class, 'show'])->name('records.show');

    Route::get('/prescriptions', [PatientPrescriptionController::class, 'index'])->name('prescriptions.index');
    Route::get('/prescriptions/{rx}', [PatientPrescriptionController::class, 'show'])->name('prescriptions.show');
    Route::post('/prescriptions/{rx}/checkout', [PatientPrescriptionController::class, 'checkout'])->name('prescriptions.checkout');

    Route::get('/payments/{invoice}', [PatientPaymentController::class, 'show'])->name('payments.show');
    Route::post('/payments/{invoice}/qris', [PatientPaymentController::class, 'createQris'])->name('payments.qris');

    Route::post('/emergency', [PatientEmergencyController::class, 'store'])->name('emergency.store');

    Route::get('/room-bookings', [PatientRoomBookingController::class, 'index'])->name('bookingroom.index');
    Route::get('/room-bookings/create', [PatientRoomBookingController::class, 'create'])->name('bookingroom.create');
    Route::post('/room-bookings', [PatientRoomBookingController::class, 'store'])->name('bookingroom.store');
    // Halaman untuk menampilkan daftar reminder
    Route::get('/reminders', [PatientReminderController::class, 'index'])->name('reminders.index');
    Route::put('/reminders/{reminder}/done', [PatientReminderController::class, 'markAsDone'])->name('reminders.markAsDone');
    });
