<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'status',
        'capacity',
        'occupied',
        'notes'
    ];

    protected $casts = [
        'capacity' => 'integer',
        'occupied' => 'integer',
    ];
}
