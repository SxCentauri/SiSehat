@extends('layouts.admin-modern')
@section('title','Janji Temu - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-calendar-check"></i><h3>Janji Temu</h3></div>

  <div class="toolbar">
    <form method="get" class="search">
      <input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari pasien/dokter...">
      <button class="btn btn-outline"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
    </form>
    <a href="{{ route('admin.appointments.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
  </div>

  <div class="table-wrap">
    <table>
      <thead><tr><th>Pasien</th><th>Dokter</th><th>Tanggal</th><th>Status</th><th style="width:180px">Aksi</th></tr></thead>
      <tbody>
        @forelse($appointments as $a)
          <tr>
            <td>{{ $a->patient?->name ?? '-' }}</td>
            <td>{{ $a->doctor?->name ?? '-' }}</td>
            <td>{{ $a->date }} {{ $a->time }}</td>
            <td><span class="badge">{{ $a->status }}</span></td>
            <td>
              <div class="actions">
                <a class="btn btn-outline" href="{{ route('admin.appointments.edit',$a) }}"><i class="fa-solid fa-pen"></i> Edit</a>
                <form method="post" action="{{ route('admin.appointments.destroy',$a) }}" onsubmit="return confirm('Hapus janji temu?')">
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

  <div class="pagination">{{ $appointments->links() }}</div>
</div>
@endsection
