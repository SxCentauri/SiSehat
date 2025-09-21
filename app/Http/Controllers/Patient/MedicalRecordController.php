<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $records = MedicalRecord::where('patient_id', Auth::id())
            ->orderByDesc('created_at')->paginate(10);
        return view('patient.records.index', compact('records'));
    }

    public function show(MedicalRecord $record)
    {
        abort_unless($record->patient_id === Auth::id(), 403);
        return view('patient.records.show', compact('record'));
    }
}
