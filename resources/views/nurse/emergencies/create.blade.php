@extends('layouts.medicare')
@section('title','Tambah Laporan Emergency')

@section('content')
<div class="container">
  <h2>🚨 Tambah Laporan Emergency</h2>

  <form action="{{ route('nurse.emergencies.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>Nama Pasien</label>
      <input type="text" name="patient_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Jenis Emergency</label>
      <input type="text" name="emergency_type" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control" required>
        <option value="pending">Pending</option>
        <option value="handled">Handled</option>
        <option value="resolved">Resolved</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('nurse.emergencies.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
