<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmergencyResponse;
use App\Models\RoomStatus;
use App\Models\User;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index(Request $request)
    {
        $q = EmergencyResponse::query()->with(['patient','room','doctor']);

        if ($s = $request->string('q')->toString()) {
            $q->where(function ($qq) use ($s) {
                $qq->where('description', 'like', "%{$s}%")
                   ->orWhere('status', 'like', "%{$s}%");
            });
        }

        $emergencies = $q->latest()->paginate(20)->withQueryString();

        return view('admin.emergencies.index', compact('emergencies'));
    }

    public function show(EmergencyResponse $emergency)
    {
        $emergency->load(['patient','room','doctor','nurse']);

        return view('admin.emergencies.show', [
            'emergency' => $emergency,
        ]);
    }

    public function create()
    {
        return view('admin.emergencies.create', [
            'patients'        => User::whereIn('role', ['user','patient'])->orderBy('name')->get(),
            'doctors'         => User::where('role','doctor')->orderBy('name')->get(),
            'nurses'          => User::whereIn('role', ['perawat','nurse'])->orderBy('name')->get(),
            // hanya ruangan yang masih tersedia
            'availableRooms'  => RoomStatus::whereColumn('occupied', '<', 'capacity')
                                           ->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'patient_id'          => 'required|exists:users,id',
            'description'         => 'required|string',
            'status'              => 'required|string|max:50',
            'assigned_room_id'    => 'nullable|exists:room_statuses,id',
            'assigned_doctor_id'  => 'nullable|exists:users,id',
            'handled_by_nurse_id' => 'nullable|exists:users,id',
            'level'               => 'nullable|string|max:20',
        ]);

        EmergencyResponse::create($data);

        return to_route('admin.emergencies.index')->with('success', 'Emergency created');
    }

    public function edit(EmergencyResponse $emergency)
    {
        // pastikan relasi patient ter-load untuk ditampilkan di form
        $emergency->load('patient');

        // daftar ruangan yang masih available + ruangan yang mungkin sudah terpilih di data ini
        $availableRooms = RoomStatus::whereColumn('occupied', '<', 'capacity')
            ->orWhere('id', $emergency->assigned_room_id)
            ->orderBy('name')
            ->get();

        return view('admin.emergencies.edit', [
            'emergency'       => $emergency,
            'patients'        => User::whereIn('role', ['user','patient'])->orderBy('name')->get(),
            'doctors'         => User::where('role','doctor')->orderBy('name')->get(),
            'nurses'          => User::whereIn('role', ['perawat','nurse'])->orderBy('name')->get(),
            'availableRooms'  => $availableRooms,
        ]);
    }

    public function update(Request $request, EmergencyResponse $emergency)
    {
        $data = $request->validate([
            'patient_id'          => 'required|exists:users,id',
            'description'         => 'required|string',
            'status'              => 'required|string|max:50',
            'assigned_room_id'    => 'nullable|exists:room_statuses,id',
            'assigned_doctor_id'  => 'nullable|exists:users,id',
            'handled_by_nurse_id' => 'nullable|exists:users,id',
            'level'               => 'nullable|string|max:20',
        ]);

        $emergency->update($data);

        return to_route('admin.emergencies.index')->with('success', 'Emergency updated');
    }

    public function destroy(EmergencyResponse $emergency)
    {
        $emergency->delete();

        return back()->with('success', 'Emergency deleted');
    }
}
