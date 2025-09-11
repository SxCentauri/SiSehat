@extends('layouts.medicare')
@section('title','Detail Dukungan untuk Dokter')

@section('content')
<div class="container">
  <h2>🔎 Detail Dukungan untuk Dokter</h2>

  <div class="card p-3">
    <p><strong>Nama Dokter:</strong> {{ $support->doctor_name }}</p>
    <p><strong>Permintaan:</strong> {{ $support->request }}</p>
    <p><strong>Status:</strong> 
      <span class="badge 
        @if($support->status == 'pending') bg-warning 
        @elseif($support->status == 'in-progress') bg-info 
        @else bg-success @endif">
        {{ ucfirst($support->status) }}
      </span>
    </p>
    <p><strong>Dibuat pada:</strong> {{ $support->created_at->format('d M Y H:i') }}</p>
  </div>

  <div class="mt-3">
    <a href="{{ route('nurse.supports.index') }}" class="btn btn-secondary">⬅ Kembali</a>
    <a href="{{ route('nurse.supports.edit', $support->id) }}" class="btn btn-warning">✏️ Edit</a>
  </div>
</div>
@endsection
