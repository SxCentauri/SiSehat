<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomStatus;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
{
    public function index(Request $request)
    {
        $q = RoomStatus::query();

        if ($s = $request->string('q')->toString()) {
            $q->where(function ($qq) use ($s) {
                $qq->where('name', 'like', "%{$s}%")
                    ->orWhere('status', 'like', "%{$s}%")
                    ->orWhere('code', 'like', "%{$s}%");
            });
        }

        $rooms = $q->orderBy('name')->paginate(20)->withQueryString();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code'     => 'nullable|string|max:50|unique:room_statuses,code',
            'name'     => 'required|string|max:100|unique:room_statuses,name',
            'status'   => 'required|string|in:available,occupied,maintenance',
            'capacity' => 'nullable|integer|min:0',
            'occupied' => 'nullable|integer|min:0',
            'notes'    => 'nullable|string',
        ]);

        // default & clamp
        $cap = (int)($data['capacity'] ?? 0);
        $occ = (int)($data['occupied'] ?? 0);
        if ($occ > $cap) $occ = $cap;

        $data['capacity'] = $cap;
        $data['occupied'] = $occ;

        RoomStatus::create($data);
        return to_route('admin.rooms.index')->with('success', 'Room created');
    }

    public function edit(RoomStatus $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, RoomStatus $room)
    {
        $data = $request->validate([
            'code'     => 'nullable|string|max:50|unique:room_statuses,code,' . $room->id,
            'name'     => 'required|string|max:100|unique:room_statuses,name,' . $room->id,
            'status'   => 'required|string|in:available,occupied,maintenance',
            'capacity' => 'sometimes|nullable|integer|min:0', // only if sent
            'occupied' => 'sometimes|nullable|integer|min:0',
            'notes'    => 'nullable|string',
        ]);

        // ambil nilai final (kalau tidak dikirim, pertahankan yang lama)
        $cap = array_key_exists('capacity', $data) ? (int)($data['capacity'] ?? 0) : (int)$room->capacity;
        $occ = array_key_exists('occupied', $data) ? (int)($data['occupied'] ?? 0) : (int)$room->occupied;
        if ($occ > $cap) $occ = $cap;

        $data['capacity'] = $cap;
        $data['occupied'] = $occ;

        $room->update($data);
        return to_route('admin.rooms.index')->with('success', 'Room updated');
    }

    public function destroy(RoomStatus $room)
    {
        $room->delete();
        return back()->with('success', 'Room deleted');
    }
}
