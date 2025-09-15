<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'queue_number',
        'status',
        'scheduled_date',
    ];

    protected $casts = [
        'scheduled_date' => 'date',
    ];

    // Relasi
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    // Helper status
    public const STATUS_WAITING   = 'waiting';
    public const STATUS_CALLED    = 'called';
    public const STATUS_SERVED    = 'served';
    public const STATUS_SKIPPED   = 'skipped';
    public const STATUS_CANCELLED = 'cancelled';
}
