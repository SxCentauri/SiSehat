@extends('layouts.app')

@section('content')
<div class="container">
    <h2>🛏️ Daftar Ruangan</h2>
    <a href="{{ route('nurse.rooms.create') }}" class="btn btn-primary mb-3">+ Tambah Ruangan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nama Ruangan</th>
                <th>Status</th>
                <th>Kapasitas</th>
                <th>Terisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>
                        <span class="badge {{ $room->status == 'available' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($room->status) }}
                        </span>
                    </td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->occupied }}</td>
                    <td>
                        <a href="{{ route('nurse.rooms.show', $room->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('nurse.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('nurse.rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">Belum ada data ruangan</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $rooms->links() }}
</div>
@endsection
