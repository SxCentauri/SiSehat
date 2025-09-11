@extends('layouts.medicare')
@section('title', 'Edit Jadwal')

@section('content')
<h2>Edit Jadwal</h2>

<form action="{{ route('nurse.schedules.update', $schedule->id) }}" method="POST">
  @csrf @method('PUT')
  
  <label>Shift:</label>
  <input type="text" name="shift" value="{{ $schedule->shift }}" required><br><br>

  <label>Tugas:</label>
  <textarea name="task" required>{{ $schedule->task }}</textarea><br><br>

  <label>Tanggal:</label>
  <input type="date" name="date" value="{{ $schedule->date }}" required><br><br>

  <button type="submit" class="btn">Update</button>
  <a href="{{ route('nurse.schedules.index') }}" class="btn">Batal</a>
</form>
@endsection
