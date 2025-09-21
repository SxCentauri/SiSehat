<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\RoomStatus;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = RoomStatus::orderBy('name')->get();
        return view('patient.rooms.index', compact('rooms'));
    }
}
