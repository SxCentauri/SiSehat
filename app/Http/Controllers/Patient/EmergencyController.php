<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\EmergencyResponse;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['nullable', 'string', 'max:1000'],
            'level'       => ['nullable', 'in:low,medium,high,critical'],
        ]);

        EmergencyResponse::create([
            'patient_name' => auth()->user()->name,
            'description'  => $request->description,
            'level'        => $request->level ?? 'high',
            'status'       => 'pending',
        ]);

        return back()->with('success', 'Emergency alert terkirim. Perawat/dokter akan menindaklanjuti.');
    }
}
