@extends('layouts.admin-modern')
@section('title','Edit Pengguna - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-pen-to-square"></i><h3>Edit Pengguna</h3></div>

  <form method="post" action="{{ route('admin.users.update',$user) }}">
    @csrf @method('PUT')
    <div class="form-group">
      <label class="form-label">Nama</label>
      <input class="form-control" name="name" value="{{ old('name',$user->name) }}" required>
      @error('name') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Email</label>
      <input class="form-control" type="email" name="email" value="{{ old('email',$user->email) }}" required>
      @error('email') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Password (biarkan kosong jika tidak ganti)</label>
      <input class="form-control" type="password" name="password">
      @error('password') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="form-label">Role</label>

      @if($user->role === 'admin')
        <input class="form-control" value="Admin" disabled>
        <input type="hidden" name="role" value="admin">
        <small style="color:var(--text-light)">Role admin dikunci dari form.</small>
      @else
        {{-- $roles = ['patient','doctor','nurse']; $roleSelected = (DB->UI) --}}
        <select class="form-select" name="role" required>
          @foreach($roles as $r)
            <option value="{{ $r }}" @selected(old('role',$roleSelected)==$r)>{{ ucfirst($r) }}</option>
          @endforeach
        </select>
      @endif

      @error('role') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="actions">
      <button class="btn btn-primary" type="submit"><i class="fa-solid fa-save"></i> Update</button>
      <a class="btn btn-outline" href="{{ route('admin.users.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </form>
</div>
@endsection
