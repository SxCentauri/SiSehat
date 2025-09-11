@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ Tambah Reminder Obat</h2>

    <form action="{{ route('nurse.reminders.store') }}" method="POST">
        @csrf

        <label>Nama Pasien:</label><br>
        <input type="text" name="patient_name" required><br><br>

        <label>Nama Obat:</label><br>
        <input type="text" name="medication" required><br><br>

        <label>Dosis:</label><br>
        <input type="text" name="dosage" required><br><br>

        <label>Waktu (HH:MM):</label><br>
        <input type="time" name="time" required><br><br>

        <label>Catatan:</label><br>
        <textarea name="notes"></textarea><br><br>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('nurse.reminders.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
