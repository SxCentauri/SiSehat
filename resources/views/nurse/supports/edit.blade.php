@extends('layouts.medicare')
@section('title','Edit Dukungan untuk Dokter')

@section('content')
<div class="container">
  <h2>✏️ Edit Dukungan untuk Dokter</h2>

  <form action="{{ route('nurse.supports.update', $support->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
      <label>Nama Dokter</label>
      <input type="text" name="doctor_name" class="form-control" value="{{ $support->doctor_name }}" required>
    </div>
    <div class="mb-3">
      <label>Permintaan</label>
      <textarea name="request" class="form-control" rows="4" required>{{ $support->request }}</textarea>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control" required>
        <option value="pending" {{ $support->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="in-progress" {{ $support->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
        <option value="completed" {{ $support->status == 'completed' ? 'selected' : '' }}>Completed</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('nurse.supports.index') }}" class="btn btn-secondary">Batal</a>
  </form>
</div>
@endsection
