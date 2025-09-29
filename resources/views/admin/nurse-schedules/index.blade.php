@extends('layouts.admin-modern')
@section('title','Jadwal Perawat - MediCare')

@section('content')
@php
  // supaya aman kalau controller lama masih kirim $schedules
  $items = $items ?? ($schedules ?? collect());
@endphp

<div class="card">
  <div class="section-title"><i class="fa-solid fa-user-nurse"></i><h3>Jadwal Perawat</h3></div>

  <div class="toolbar">
    <form method="get" class="search">
      <input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari nama perawat / hari...">
      <button class="btn btn-outline"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
    </form>
    <a href="{{ route('admin.nurse-schedules.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
  </div>

  <div class="table-wrap">
    <table>
      <thead>
        <tr><th>Perawat</th><th>Hari</th><th>Mulai</th><th>Selesai</th><th style="width:180px">Aksi</th></tr>
      </thead>
      <tbody>
        @forelse($items as $s)
          <tr>
            <td>{{ $s->nurse->name ?? $s->nurse_name ?? '-' }}</td>
            <td>
              {{ $s->day_of_week
                    ?? ($s->schedule_date ? \Carbon\Carbon::parse($s->schedule_date)->translatedFormat('l') : '-') }}
            </td>
            <td>{{ $s->start_time ?? '-' }}</td>
            <td>{{ $s->end_time ?? '-' }}</td>
            <td>
              <div class="actions">
                <a class="btn btn-outline" href="{{ route('admin.nurse-schedules.edit',$s) }}"><i class="fa-solid fa-pen"></i> Edit</a>
                <form method="post" action="{{ route('admin.nurse-schedules.destroy',$s) }}" onsubmit="return confirm('Hapus jadwal?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" style="padding:22px;color:var(--text-light)">Belum ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">{{ $items->links() }}</div>
</div>
@endsection
