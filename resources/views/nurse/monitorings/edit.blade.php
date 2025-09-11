@extends('layouts.medicare')

@section('content')
<div class="container">
    <h2>✏️ Edit Monitoring Pasien</h2>
    <form action="{{ route('nurse.monitorings.update', $monitoring->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Pasien</label>
            <input type="text" name="patient_name" class="form-control" value="{{ $monitoring->patient_name }}" required>
        </div>
        <div class="mb-3">
            <label>Kondisi</label>
            <input type="text" name="condition" class="form-control" value="{{ $monitoring->condition }}" required>
        </div>
        <div class="mb-3">
            <label>Catatan</label>
            <textarea name="notes" class="form-control">{{ $monitoring->notes }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal Dicatat</label>
            <input type="datetime-local" name="recorded_at" class="form-control" value="{{ \Carbon\Carbon::parse($monitoring->recorded_at)->format('Y-m-d\TH:i') }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('nurse.monitorings.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
