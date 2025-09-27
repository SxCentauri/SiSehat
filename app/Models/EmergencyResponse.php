<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmergencyResponse extends Model
{
    use HasFactory;

    // pastikan nama tabel sesuai migration (default plural -> emergency_responses)
    // protected $table = 'emergency_responses';

    protected $fillable = [
        'patient_id',
        'description',
        'level',                 // opsional jika kolom ada
        'status',
        'handled_by_nurse_id',
        'assigned_doctor_id',
        'assigned_room_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /** Pasien pelapor */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    /** Perawat (nama pendek & alias) */
    public function nurse(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by_nurse_id');
    }
    public function handledByNurse(): BelongsTo
    {
        return $this->belongsTo(User::class, 'handled_by_nurse_id');
    }

    /** Dokter (nama pendek & alias) */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_doctor_id');
    }
    public function assignedDoctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_doctor_id');
    }

    /** Ruangan (nama pendek & alias) */
    public function room(): BelongsTo
    {
        return $this->belongsTo(RoomStatus::class, 'assigned_room_id'); // ganti ke Room::class jika modelmu Room
    }
    public function assignedRoom(): BelongsTo
    {
        return $this->belongsTo(RoomStatus::class, 'assigned_room_id'); // atau Room::class
    }
}
