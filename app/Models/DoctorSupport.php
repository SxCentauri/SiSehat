<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- Penting untuk ditambahkan

class DoctorSupport extends Model
{
    use HasFactory;

    /**
     * Atribut yang boleh diisi secara massal.
     * Ini telah disesuaikan dengan struktur tabel baru Anda.
     *
     * @var array
     */
    protected $fillable = [
        'perawat_id',
        'dokter_id',
        'patient_id',
        'subjek',
        'deskripsi',
        'status',
        'respon_dokter',
    ];

    public function perawat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'perawat_id');
    }

    public function dokter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
