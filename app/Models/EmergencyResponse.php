<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'description',
        'level',
        'status',
        'handled_by_nurse_id',
        'assigned_doctor_id',
        'assigned_room_id',
    ];

    /**
     * Relasi ke pasien (User)
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Relasi ke perawat yang menangani (User)
     */
    public function nurse()
    {
        return $this->belongsTo(User::class, 'handled_by_nurse_id');
    }

    /**
     * Relasi ke dokter yang ditugaskan (User)
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'assigned_doctor_id');
    }

    /**
     * Relasi ke ruangan yang ditugaskan (RoomStatus)
     */
    public function room()
    {
        return $this->belongsTo(RoomStatus::class, 'assigned_room_id');
    }
}
