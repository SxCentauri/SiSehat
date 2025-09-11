<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ======= Relasi Dokter =======
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

    // ======= Relasi Pasien =======
    public function patientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }

    // ======= Relasi Chat =======
    public function messagesAsDoctor()
    {
        return $this->hasMany(ChatMessage::class, 'doctor_id');
    }

    public function messagesAsPatient()
    {
        return $this->hasMany(ChatMessage::class, 'patient_id');
    }

    /**
     * Relasi untuk mengambil pesan terakhir antara dokter dan pasien
     */
    public function latestMessage()
    {
        return $this->hasOne(ChatMessage::class, 'patient_id')->latestOfMany();
    }

    // ======= Relasi Rekam Medis =======
    public function medicalRecordsAsDoctor()
    {
        return $this->hasMany(MedicalRecord::class, 'doctor_id');
    }

    public function medicalRecordsAsPatient()
    {
        return $this->hasMany(MedicalRecord::class, 'patient_id');
    }
}
