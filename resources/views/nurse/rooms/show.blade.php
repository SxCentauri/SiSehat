@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🏥 Detail Ruangan</h2>

    <div class="card p-3">
        <p><strong>Nama Ruangan:</strong> {{ $room->name }}</p>
        <p><strong>Status:</strong> {{ ucfirst($room->status) }}</p>
        <p><strong>Kapasitas:</strong> {{ $room->capacity }}</p>
        <p><strong>Terisi:</strong> {{ $room->occupied }}</p>
    </div>

    <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary mt-3">⬅ Kembali</a>
</div>
@endsection
