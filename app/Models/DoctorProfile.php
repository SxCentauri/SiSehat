<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    protected $fillable = ['user_id', 'specialization', 'bio', 'clinic_address', 'phone', 'avatar_path'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
