<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Models\DoctorSupport;
use Illuminate\Http\Request;

class DoctorSupportController extends Controller
{
    public function index()
    {
        $supports = DoctorSupport::all();
        return view('nurse.supports.index', compact('supports'));
    }

    public function create()
    {
        return view('nurse.supports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_name' => 'required|string|max:100',
            'message'      => 'required|string',
            'status'       => 'required|in:pending,resolved',
        ]);

        DoctorSupport::create($request->all());
        return redirect()->route('nurse.supports.index')->with('ok', 'Support request dibuat.');
    }

    public function edit(DoctorSupport $support)
    {
        return view('nurse.supports.edit', compact('support'));
    }

    public function update(Request $request, DoctorSupport $support)
    {
        $request->validate([
            'patient_name' => 'required|string|max:100',
            'message'      => 'required|string',
            'status'       => 'required|in:pending,resolved',
        ]);

        $support->update($request->all());
        return redirect()->route('nurse.supports.index')->with('ok', 'Support request diperbarui.');
    }

    public function destroy(DoctorSupport $support)
    {
        $support->delete();
        return redirect()->route('nurse.supports.index')->with('ok', 'Support request dihapus.');
    }
}
