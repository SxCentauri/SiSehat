<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrescriptionItem extends Model
{
    protected $fillable = [
        'prescription_id',
        'drug_name',
        'dosage',
        'quantity',
        'price',
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
