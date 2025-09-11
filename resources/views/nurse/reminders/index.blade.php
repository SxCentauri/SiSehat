@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📋 Daftar Reminder Obat</h2>

    <a href="{{ route('nurse.reminders.create') }}" class="btn btn-primary mb-3">+ Tambah Reminder</a>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif

    <table class="table" border="1" cellpadding="8" cellspacing="0" width="100%">
        <thead>
            <tr style="background: #f2f2f2;">
                <th>ID</th>
                <th>Pasien</th>
                <th>Obat</th>
                <th>Dosis</th>
                <th>Waktu</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reminders as $reminder)
                <tr>
                    <td>{{ $reminder->id }}</td>
                    <td>{{ $reminder->patient_name }}</td>
                    <td>{{ $reminder->medication }}</td>
                    <td>{{ $reminder->dosage }}</td>
                    <td>{{ $reminder->time }}</td>
                    <td>{{ $reminder->notes }}</td>
                    <td>
                        <a href="{{ route('nurse.reminders.show', $reminder->id) }}">Lihat</a> |
                        <a href="{{ route('nurse.reminders.edit', $reminder->id) }}">Edit</a> |
                        <form action="{{ route('nurse.reminders.destroy', $reminder->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus reminder ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="text-align:center;">Belum ada reminder</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 10px;">
        {{ $reminders->links() }}
    </div>
</div>
@endsection
