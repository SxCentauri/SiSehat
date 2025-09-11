@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ Tambah Ruangan</h2>
    <form action="{{ route('nurse.rooms.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Ruangan</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="available">Available</option>
                <option value="occupied">Occupied</option>
                <option value="maintenance">Maintenance</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Kapasitas</label>
            <input type="number" name="capacity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Terisi</label>
            <input type="number" name="occupied" class="form-control" required>
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
