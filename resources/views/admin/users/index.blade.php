@extends('layouts.admin-modern')
@section('title','Pengguna - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-users"></i><h3>Data Pengguna</h3></div>

  <div class="toolbar">
    <form method="get" class="search">
      <input class="form-control" name="q" value="{{ request('q') }}" placeholder="Cari nama/email...">
      <select class="form-select" name="role">
        <option value="">Semua Role</option>
        @foreach(['admin','doctor','nurse','patient','user'] as $r)
          <option value="{{ $r }}" @selected(request('role')===$r)>{{ ucfirst($r) }}</option>
        @endforeach
      </select>
      <button class="btn btn-outline"><i class="fa-solid fa-sliders"></i> Filter</button>
    </form>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah</a>
  </div>

  <div class="table-wrap">
    <table>
      <thead><tr><th>Nama</th><th>Email</th><th>Role</th><th style="width:180px">Aksi</th></tr></thead>
      <tbody>
        @forelse($users as $u)
          <tr>
            <td>{{ $u->name }}</td>
            <td>{{ $u->email }}</td>
            <td><span class="badge">{{ $u->role }}</span></td>
            <td>
              <div class="actions">
                <a class="btn btn-outline" href="{{ route('admin.users.edit',$u) }}"><i class="fa-solid fa-pen"></i> Edit</a>
                <form method="post" action="{{ route('admin.users.destroy',$u) }}" onsubmit="return confirm('Hapus user?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" style="padding:22px;color:var(--text-light)">Belum ada data.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">{{ $users->links() }}</div>
</div>
@endsection
