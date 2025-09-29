@extends('layouts.admin-modern')
@section('title','Kelola Ruangan - MediCare')

@section('content')
<div class="card">
  <div class="section-title">
    <i class="fa-solid fa-door-open"></i><h3>Kelola Ruangan</h3>
  </div>

  <div class="toolbar">
    <form method="get" class="search">
      <input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari nama/kode ruangan...">
      <button class="btn btn-outline"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
    </form>
    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
  </div>

  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th>Kapasitas</th>
          <th>Terisi</th>
          <th>Status</th>
          <th style="width:200px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($rooms as $r)
          <tr>
            <td>{{ $r->code ?? '-' }}</td>
            <td>{{ $r->name }}</td>
            <td>{{ $r->capacity ?? 0 }}</td>
            <td>{{ $r->occupied ?? 0 }}/{{ $r->capacity ?? 0 }}</td>
            <td><span class="badge">{{ $r->status }}</span></td>
            <td>
              <div class="actions">
                <a class="btn btn-outline" href="{{ route('admin.rooms.edit',$r) }}"><i class="fa-solid fa-pen"></i> Edit</a>
                <form method="post" action="{{ route('admin.rooms.destroy',$r) }}" onsubmit="return confirm('Hapus ruangan?')">
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

  <div class="pagination">{{ $rooms->links() }}</div>
</div>
@endsection
