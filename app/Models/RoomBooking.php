<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'patient_id',
        'condition',
        'notes',
        'status',
        'room_id',
        'nurse_id',
        'rejection_reason',
    ];

    /**
     * Mendapatkan data user (pasien) yang melakukan booking.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /**
     * Mendapatkan data ruangan yang di-booking.
     */
    public function room()
    {
        return $this->belongsTo(RoomStatus::class, 'room_id');
    }

    /**
     * Mendapatkan data user (perawat) yang memproses booking.
     */
    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }
}

