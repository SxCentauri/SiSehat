<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = ['medical_record_id', 'description', 'status', 'next_visit_at'];
    protected $casts = ['next_visit_at' => 'date'];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }
}
