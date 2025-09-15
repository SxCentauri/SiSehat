<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encounter extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'patient_id',
        'doctor_id',
        'started_at',
        'ended_at',
        'type',   // outpatient|inpatient|telemed
        'status', // open|closed|cancelled
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ended_at'   => 'datetime',
    ];

    // Relasi
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    // Catatan: di migration Encounter kita refer ke tabel 'patients'
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Catatan: di migration Encounter kita refer ke 'doctor_profiles'
    public function doctor()
    {
        return $this->belongsTo(DoctorProfile::class, 'doctor_id');
    }

    // Relasi ke invoice (billable morph)
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'billable');
    }

    public const TYPE_OUTPATIENT = 'outpatient';
    public const TYPE_INPATIENT  = 'inpatient';
    public const TYPE_TELEMED    = 'telemed';

    public const STATUS_OPEN      = 'open';
    public const STATUS_CLOSED    = 'closed';
    public const STATUS_CANCELLED = 'cancelled';
}
