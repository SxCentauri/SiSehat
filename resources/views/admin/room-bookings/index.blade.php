@extends('layouts.admin-modern')
@section('title','Booking Ruangan - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-bed"></i><h3>Booking Ruangan</h3></div>

  <div class="toolbar">
    <form method="get" class="search">
      <input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari pasien/kode ruangan...">
      <button class="btn btn-outline"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
    </form>
    <a href="{{ route('admin.room-bookings.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
  </div>

  <div class="table-wrap">
    <table>
      <thead><tr><th>Ruangan</th><th>Pasien</th><th>Mulai</th><th>Selesai</th><th>Status</th><th style="width:200px">Aksi</th></tr></thead>
      <tbody>
        @forelse($items as $b)
          <tr>
            <td>{{ $b->room?->code ?? '-' }}</td>
            <td>{{ $b->patient?->name ?? '-' }}</td>
            <td>{{ $b->start_at }}</td>
            <td>{{ $b->end_at }}</td>
            <td><span class="badge">{{ $b->status }}</span></td>
            <td>
              <div class="actions">
                <a class="btn btn-outline" href="{{ route('admin.room-bookings.edit',$b) }}"><i class="fa-solid fa-pen"></i> Edit</a>
                <form method="post" action="{{ route('admin.room-bookings.destroy',$b) }}" onsubmit="return confirm('Hapus booking?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" style="padding:22px;color:var(--text-light)">Belum ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">{{ $items->links() }}</div>
</div>
@endsection
