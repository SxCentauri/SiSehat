<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomBooking;
use App\Models\RoomStatus;
use App\Models\User;
use Illuminate\Http\Request;

class RoomBookingController extends Controller
{
    public function index(Request $request)
    {
        $q = RoomBooking::query()->with(['room', 'patient', 'nurse']);

        if ($s = $request->string('q')->toString()) {
            $q->where(function ($qq) use ($s) {
                $qq->where('status', 'like', "%{$s}%")
                    ->orWhereHas(
                        'room',
                        fn($r) =>
                        $r->where('code', 'like', "%{$s}%")->orWhere('name', 'like', "%{$s}%")
                    )
                    ->orWhereHas(
                        'patient',
                        fn($p) =>
                        $p->where('name', 'like', "%{$s}%")
                    );
            });
        }

        $items = $q->latest()->paginate(20)->withQueryString();
        return view('admin.room-bookings.index', compact('items'));
    }

    public function create()
    {
        return view('admin.room-bookings.create', [
            'rooms'    => RoomStatus::orderBy('name')->get(),
            'patients' => User::whereIn('role', ['user', 'patient'])->orderBy('name')->get(),
            'nurses'   => User::whereIn('role', ['perawat', 'nurse'])->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_id'    => 'required|exists:room_statuses,id',
            'patient_id' => 'required|exists:users,id',
            'nurse_id'   => 'nullable|exists:users,id',
            'condition'  => 'required|string|max:255',
            'status'     => 'required|string|in:pending,approved,rejected,completed',
            'notes'      => 'nullable|string',
        ]);

        RoomBooking::create($data);

        return to_route('admin.room-bookings.index')->with('success', 'Booking created');
    }

    public function edit(RoomBooking $room_booking)
    {
        return view('admin.room-bookings.edit', [
            'room_booking' => $room_booking,
            'rooms'        => RoomStatus::orderBy('name')->get(),
            'patients'     => User::whereIn('role', ['user', 'patient'])->orderBy('name')->get(),
            'nurses'       => User::whereIn('role', ['perawat', 'nurse'])->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, RoomBooking $room_booking)
    {
        $data = $request->validate([
            'room_id'    => 'required|exists:room_statuses,id',
            'patient_id' => 'required|exists:users,id',
            'nurse_id'   => 'nullable|exists:users,id',
            'condition'  => 'required|string|max:255',        
            'status'     => 'required|string|in:pending,approved,rejected,completed',
            'notes'      => 'nullable|string',
        ]);

        $room_booking->update($data);

        return to_route('admin.room-bookings.index')->with('success', 'Booking updated');
    }

    public function destroy(RoomBooking $room_booking)
    {
        $room_booking->delete();
        return back()->with('success', 'Booking deleted');
    }
}
