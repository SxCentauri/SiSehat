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
                $qq->where('name','like',"%{$s}%")
                   ->orWhere('status','like',"%{$s}%");
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
            'name'   => 'required|string|max:100|unique:room_statuses,name',
            'status' => 'required|string|max:50', // available|occupied|maintenance (sesuaikan)
            'notes'  => 'nullable|string',
        ]);

        RoomStatus::create($data);

        return to_route('admin.rooms.index')->with('success','Room created');
    }

    public function edit(RoomStatus $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, RoomStatus $room)
    {
        $data = $request->validate([
            'name'   => 'required|string|max:100|unique:room_statuses,name,'.$room->id,
            'status' => 'required|string|max:50',
            'notes'  => 'nullable|string',
        ]);

        $room->update($data);

        return to_route('admin.rooms.index')->with('success','Room updated');
    }

    public function destroy(RoomStatus $room)
    {
        $room->delete();
        return back()->with('success','Room deleted');
    }
}
