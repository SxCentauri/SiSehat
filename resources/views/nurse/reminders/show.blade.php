@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📖 Detail Reminder Obat</h2>

    <p><strong>Nama Pasien:</strong> {{ $reminder->patient_name }}</p>
    <p><strong>Obat:</strong> {{ $reminder->medication }}</p>
    <p><strong>Dosis:</strong> {{ $reminder->dosage }}</p>
    <p><strong>Waktu:</strong> {{ $reminder->time }}</p>
    <p><strong>Catatan:</strong> {{ $reminder->notes }}</p>

    <a href="{{ route('nurse.reminders.index') }}" class="btn btn-primary">⬅ Kembali</a>
</div>
@endsection
