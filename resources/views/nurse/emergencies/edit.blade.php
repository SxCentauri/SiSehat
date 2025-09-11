@extends('layouts.medicare')
@section('title','Edit Laporan Emergency')

@section('content')
<div class="container">
  <h2>✏️ Edit Laporan Emergency</h2>

  <form action="{{ route('nurse.emergencies.update', $emergency->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label>Nama Pasien</label>
      <input type="text" name="patient_name" class="form-control" value="{{ $emergency->patient_name }}" required>
    </div>
    <div class="mb-3">
      <label>Jenis Emergency</label>
      <input type="text" name="emergency_type" class="form-control" value="{{ $emergency->emergency_type }}" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="description" class="form-control" rows="4" required>{{ $emergency->description }}</textarea>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control" required>
        <option value="pending" {{ $emergency->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="handled" {{ $emergency->status == 'handled' ? 'selected' : '' }}>Handled</option>
        <option value="resolved" {{ $emergency->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('nurse.emergencies.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
