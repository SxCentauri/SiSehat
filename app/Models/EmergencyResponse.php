<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'description',
        'level',  // low, medium, high, critical
        'status', // pending, handled, resolved
    ];
}
