@extends('layouts.medicare')
@section('title', 'Tambah Jadwal')

@section('content')
<h2>Tambah Jadwal</h2>

<form action="{{ route('nurse.schedules.store') }}" method="POST">
  @csrf
  <label>Shift:</label>
  <input type="text" name="shift" required><br><br>

  <label>Tugas:</label>
  <textarea name="task" required></textarea><br><br>

  <label>Tanggal:</label>
  <input type="date" name="date" required><br><br>

  <button type="submit" class="btn">Simpan</button>
  <a href="{{ route('nurse.schedules.index') }}" class="btn">Batal</a>
</form>
@endsection
