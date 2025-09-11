@extends('layouts.medicare')
@section('title','Tambah Dukungan untuk Dokter')

@section('content')
<div class="container">
  <h2>➕ Tambah Dukungan untuk Dokter</h2>

  <form action="{{ route('nurse.supports.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Nama Dokter</label>
      <input type="text" name="doctor_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Permintaan</label>
      <textarea name="request" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control" required>
        <option value="pending">Pending</option>
        <option value="in-progress">In Progress</option>
        <option value="completed">Completed</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('nurse.supports.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
