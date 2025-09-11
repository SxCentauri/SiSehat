@extends('layouts.medicare')
@section('title','Detail Laporan Emergency')

@section('content')
<div class="container">
  <h2>🔎 Detail Laporan Emergency</h2>

  <div class="card p-3">
    <p><strong>Nama Pasien:</strong> {{ $emergency->patient_name }}</p>
    <p><strong>Jenis Emergency:</strong> {{ $emergency->emergency_type }}</p>
    <p><strong>Deskripsi:</strong> {{ $emergency->description }}</p>
    <p><strong>Status:</strong> 
      <span class="badge 
        @if($emergency->status == 'pending') bg-warning 
        @elseif($emergency->status == 'handled') bg-info 
        @else bg-success @endif">
        {{ ucfirst($emergency->status) }}
      </span>
    </p>
    <p><strong>Dibuat pada:</strong> {{ $emergency->created_at->format('d M Y H:i') }}</p>
  </div>

  <div class="mt-3">
    <a href="{{ route('nurse.emergencies.index') }}" class="btn btn-secondary">⬅ Kembali</a>
    <a href="{{ route('nurse.emergencies.edit', $emergency->id) }}" class="btn btn-warning">✏️ Edit</a>
  </div>
</div>
@endsection
