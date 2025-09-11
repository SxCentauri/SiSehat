<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'condition',
        'notes',
        'recorded_at',
    ];

    public function room()
    {
        return $this->belongsTo(RoomStatus::class, 'room_id');
    }
}
