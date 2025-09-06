<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $fillable = ['doctor_id', 'day_of_week', 'start_time', 'end_time', 'is_available'];
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}
