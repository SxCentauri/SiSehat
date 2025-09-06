<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh di-mass assign (sesuaikan dengan kolom tabel users kamu).
     * Kalau di tabelmu tidak ada 'phone' atau 'role', hapus dari array ini.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
    ];

    /**
     * Sembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting atribut.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // Laravel 10+ bisa pakai 'hashed' agar otomatis di-hash saat set password
        'password' => 'hashed',
    ];

    // ======= Relasi Dokter/Patient =======
    public function doctorProfile()
    {
        return $this->hasOne(DoctorProfile::class, 'user_id');
    }

    public function doctorSchedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'doctor_id');
    }

    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function patientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    public function messagesAsDoctor()
    {
        return $this->hasMany(ChatMessage::class, 'doctor_id');
    }

    public function messagesAsPatient()
    {
        return $this->hasMany(ChatMessage::class, 'patient_id');
    }

    public function medicalRecordsAsDoctor()
    {
        return $this->hasMany(MedicalRecord::class, 'doctor_id');
    }

    public function medicalRecordsAsPatient()
    {
        return $this->hasMany(MedicalRecord::class, 'patient_id');
    }
}
