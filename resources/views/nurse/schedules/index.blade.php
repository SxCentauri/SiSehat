@extends('layouts.medicare')
@section('title', 'Jadwal Perawat')

@section('content')
<style>
  .btn { padding:6px 12px; border-radius:6px; border:1px solid #1e40af; color:#1e40af; text-decoration:none; font-weight:600; }
  .btn:hover { background:#1e40af; color:#fff; }
  .table { width:100%; border-collapse: collapse; margin-top:16px; }
  .table th, .table td { border:1px solid #e5e7eb; padding:8px; text-align:left; }
  .table th { background:#f9fafb; }
</style>

<h2>📅 Jadwal Perawat</h2>
<a href="{{ route('nurse.schedules.create') }}" class="btn">+ Tambah Jadwal</a>

<table class="table">
  <thead>
    <tr>
      <th>Shift</th>
      <th>Tugas</th>
      <th>Tanggal</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($schedules as $schedule)
      <tr>
        <td>{{ $schedule->shift }}</td>
        <td>{{ $schedule->task }}</td>
        <td>{{ $schedule->date }}</td>
        <td>
          <a href="{{ route('nurse.schedules.show', $schedule->id) }}" class="btn">Detail</a>
          <a href="{{ route('nurse.schedules.edit', $schedule->id) }}" class="btn">Edit</a>
          <form action="{{ route('nurse.schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" class="btn" onclick="return confirm('Yakin hapus?')">Hapus</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="4">Belum ada jadwal.</td></tr>
    @endforelse
  </tbody>
</table>
@endsection
