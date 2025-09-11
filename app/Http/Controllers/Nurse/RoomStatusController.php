<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomStatus;

class RoomStatusController extends Controller
{
    /**
     * Tampilkan daftar ruangan
     */
    public function index()
    {
        $rooms = RoomStatus::paginate(10);
        return view('nurse.rooms.index', compact('rooms'));
    }

    /**
     * Form tambah ruangan
     */
    public function create()
    {
        return view('nurse.rooms.create');
    }

    /**
     * Simpan data ruangan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'status'   => 'required|in:available,occupied,maintenance',
            'capacity' => 'required|integer|min:1',
            'occupied' => 'required|integer|min:0',
        ]);

        RoomStatus::create($request->all());

        return redirect()->route('nurse.rooms.index')->with('success', 'Data ruangan berhasil ditambahkan');
    }

    /**
     * Detail ruangan
     */
    public function show($id)
    {
        $room = RoomStatus::findOrFail($id);
        return view('nurse.rooms.show', compact('room'));
    }

    /**
     * Form edit ruangan
     */
    public function edit($id)
    {
        $room = RoomStatus::findOrFail($id);
        return view('nurse.rooms.edit', compact('room'));
    }

    /**
     * Update data ruangan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'status'   => 'required|in:available,occupied,maintenance',
            'capacity' => 'required|integer|min:1',
            'occupied' => 'required|integer|min:0',
        ]);

        $room = RoomStatus::findOrFail($id);
        $room->update($request->all());

        return redirect()->route('nurse.rooms.index')->with('success', 'Data ruangan berhasil diperbarui');
    }

    /**
     * Hapus data ruangan
     */
    public function destroy($id)
    {
        $room = RoomStatus::findOrFail($id);
        $room->delete();

        return redirect()->route('nurse.rooms.index')->with('success', 'Data ruangan berhasil dihapus');
    }
}
