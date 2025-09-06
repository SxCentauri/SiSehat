<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'appointment_id', 'complaints', 'diagnosis', 'notes'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }
}
