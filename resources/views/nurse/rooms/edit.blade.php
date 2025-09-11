@extends('layouts.app')

@section('content')
<div class="container">
    <h2>✏️ Edit Ruangan</h2>
    <form action="{{ route('nurse.rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Ruangan</label>
            <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Available</option>
                <option value="occupied" {{ $room->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                <option value="maintenance" {{ $room->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Kapasitas</label>
            <input type="number" name="capacity" class="form-control" value="{{ $room->capacity }}" required>
        </div>
        <div class="mb-3">
            <label>Terisi</label>
            <input type="number" name="occupied" class="form-control" value="{{ $room->occupied }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
