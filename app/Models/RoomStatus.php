<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function patients()
    {
        return $this->hasMany(PatientMonitoring::class, 'room_id');
    }
}
