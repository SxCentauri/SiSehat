<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'medication',
        'dosage',
        'time',
        'status',
    ];

    /**
     * Mendapatkan data pasien (user) yang memiliki reminder ini.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
