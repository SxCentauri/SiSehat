<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\MedicalRecord;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function store(MedicalRecord $record, Request $request)
    {
        abort_unless($record->doctor_id === $request->user()->id, 403);

        $data = $request->validate([
            'description'  => 'required|string',
            'status'       => 'required|in:ongoing,done',
            'next_visit_at' => 'nullable|date',
        ]);

        $record->treatments()->create($data);

        return back()->with('ok', 'Perawatan ditambahkan');
    }
}
