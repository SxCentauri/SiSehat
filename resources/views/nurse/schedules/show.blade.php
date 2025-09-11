@extends('layouts.medicare')
@section('title', 'Detail Jadwal')

@section('content')
<h2>Detail Jadwal</h2>

<p><strong>Shift:</strong> {{ $schedule->shift }}</p>
<p><strong>Tugas:</strong> {{ $schedule->task }}</p>
<p><strong>Tanggal:</strong> {{ $schedule->date }}</p>

<a href="{{ route('nurse.schedules.index') }}" class="btn">Kembali</a>
@endsection
