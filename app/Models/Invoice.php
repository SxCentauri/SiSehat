<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'billable_type',
        'billable_id',
        'patient_id',
        'amount',
        'currency',
        'status',     // unpaid|paid|void
        'issued_at',
        'paid_at',
    ];

    protected $casts = [
        'amount'   => 'decimal:2',
        'issued_at'=> 'datetime',
        'paid_at'  => 'datetime',
    ];

    // Polymorphic: appointment/encounter/dll
    public function billable()
    {
        return $this->morphTo();
    }

    // Jika patient_id refer ke tabel 'patients'
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public const STATUS_UNPAID = 'unpaid';
    public const STATUS_PAID   = 'paid';
    public const STATUS_VOID   = 'void';
}
