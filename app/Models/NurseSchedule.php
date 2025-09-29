<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NurseSchedule extends Model
{
    protected $fillable = [
        'nurse_id',
        // kolom baru yang dipakai UI:
        'day_of_week',
        'start_time',
        'end_time',
        'notes',
        // kolom lama tetap dibiarkan supaya data lama aman:
        'nurse_name',
        'task',
        'schedule_date',
    ];

    public function nurse(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }
}
