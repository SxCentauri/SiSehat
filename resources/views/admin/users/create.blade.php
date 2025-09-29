@extends('layouts.admin-modern')
@section('title','Tambah Pengguna - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-circle-plus"></i><h3>Tambah Pengguna</h3></div>

  <form method="post" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="form-group">
      <label class="form-label">Nama</label>
      <input class="form-control" name="name" value="{{ old('name') }}" required>
      @error('name') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Email</label>
      <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
      @error('email') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Password</label>
      <input class="form-control" type="password" name="password" required>
      @error('password') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    {{-- gunakan 3 role UI dari controller --}}
    <div class="form-group">
      <label class="form-label">Role</label>
      <select class="form-select" name="role" required>
        @foreach($roles as $r) {{-- $roles = ['patient','doctor','nurse'] --}}
          <option value="{{ $r }}" @selected(old('role')==$r)>{{ ucfirst($r) }}</option>
        @endforeach
      </select>
      @error('role') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="actions">
      <button class="btn btn-primary" type="submit"><i class="fa-solid fa-save"></i> Simpan</button>
      <a class="btn btn-outline" href="{{ route('admin.users.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </form>
</div>
@endsection
