@extends('layouts.medicare')
@section('title', 'Dashboard Perawat')

@section('content')

<style>
  .card {
    background: #fff;
    padding: 16px;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }
  .card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
  }
  .btn {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 6px;
    border: 1px solid #1e40af;
    color: #1e40af;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
  }
  .btn:hover {
    background: #1e40af;
    color: #fff;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }
</style>

<h2 style="margin-bottom: 10px;">👩‍⚕️ Dashboard Perawat</h2>
<p style="color:#64748b;">Selamat datang di panel perawat. Kelola jadwal, pasien, dan kondisi darurat dari sini.</p>

<div class="grid">

  {{-- Pasien Rawat Inap --}}
  <div class="card" style="text-align:center;">
    <h3>Pasien Rawat Inap</h3>
    <p style="font-size:28px; font-weight:700; color:#1e40af;">{{ $inpatients ?? 0 }}</p>
    <a href="{{ route('nurse.monitorings.index') }}" class="btn">Lihat Pasien</a>
  </div>

  {{-- Status Ruangan --}}
  <div class="card" style="text-align:center;">
    <h3>Status Ruangan</h3>
    <p style="font-size:28px; font-weight:700; color:#1e40af;">{{ $rooms ?? 0 }}</p>
    <a href="{{ route('nurse.rooms.index') }}" class="btn">Kelola Ruangan</a>
  </div>

  {{-- Reminder Obat --}}
  <div class="card" style="text-align:center;">
    <h3>Reminder Obat</h3>
    <p style="font-size:28px; font-weight:700; color:#1e40af;">{{ $reminders ?? 0 }}</p>
    <a href="{{ route('nurse.reminders.index') }}" class="btn">Lihat Obat</a>
  </div>

  {{-- Jadwal & Tugas --}}
  <div class="card" style="text-align:center;">
    <h3>Jadwal & Tugas</h3>
    <p style="font-size:28px; font-weight:700; color:#1e40af;">{{ $schedules ?? 0 }}</p>
    <a href="{{ route('nurse.schedules.index') }}" class="btn">Kelola Tugas</a>
  </div>

  {{-- Support Dokter --}}
  <div class="card" style="text-align:center;">
    <h3>Support Dokter</h3>
    <p style="font-size:28px; font-weight:700; color:#1e40af;">{{ $supports ?? 0 }}</p>
    <a href="{{ route('nurse.supports.index') }}" class="btn">Lihat Support</a>
  </div>

  {{-- Emergency --}}
  <div class="card" style="text-align:center;">
    <h3>Emergency</h3>
    <p style="font-size:28px; font-weight:700; color:#dc2626;">{{ $emergencies ?? 0 }}</p>
    <a href="{{ route('nurse.emergencies.index') }}" class="btn">Respon Darurat</a>
  </div>

</div>

@endsection
