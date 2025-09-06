@extends('layouts.medicare')
@section('title','Detail Rekam Medis')

@section('content')
  @if(session('ok')) <div class="flash">{{ session('ok') }}</div> @endif

  <div class="grid grid-2">
    <div class="card">
      <div class="section-title"><i class="fa-solid fa-file-medical"></i><h3>Ringkasan Rekam Medis #{{ $record->id }}</h3></div>
      <ul style="display:grid;gap:6px;list-style:none;margin-top:4px">
        <li><strong>Pasien:</strong> {{ $record->patient->name ?? 'Pasien #'.$record->patient_id }}</li>
        <li><strong>Dokter:</strong> {{ $record->doctor->name ?? 'Dokter #'.$record->doctor_id }}</li>
        <li><strong>Keluhan:</strong> {{ $record->complaints ?: '-' }}</li>
        <li><strong>Diagnosis:</strong> {{ $record->diagnosis ?: '-' }}</li>
        <li><strong>Catatan:</strong> {{ $record->notes ?: '-' }}</li>
      </ul>
    </div>

    <div class="card">
      <div class="section-title"><i class="fa-solid fa-syringe"></i><h3>Tambah Perawatan</h3></div>
      <form method="POST" action="{{ route('doctor.treatments.store', $record) }}">
        @csrf
        <div class="field">
          <label>Deskripsi</label>
          <textarea name="description" rows="2" required></textarea>
          @error('description') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>
        <div class="field">
          <label>Status</label>
          <select name="status" required>
            <option value="ongoing">On-going</option>
            <option value="done">Selesai</option>
          </select>
          @error('status') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>
        <div class="field">
          <label>Kunjungan Berikutnya</label>
          <input type="date" name="next_visit_at">
          @error('next_visit_at') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>
        <div class="actions">
          <button class="btn" type="submit"><i class="fa-solid fa-plus"></i> Tambah</button>
          <a class="btn btn-outline" href="{{ route('doctor.appointments.index') }}">Kembali</a>
        </div>
      </form>
    </div>
  </div>

  <div class="card" style="margin-top:18px">
    <div class="section-title"><i class="fa-solid fa-clipboard-list"></i><h3>Riwayat Perawatan</h3></div>
    @if($record->treatments->isEmpty())
      <p class="text-muted">Belum ada perawatan.</p>
    @else
      <table class="table">
        <thead><tr><th>Deskripsi</th><th>Status</th><th>Kunjungan Berikutnya</th></tr></thead>
        <tbody>
          @foreach($record->treatments as $t)
            <tr>
              <td>{{ $t->description }}</td>
              <td><span class="badge">{{ ucfirst($t->status) }}</span></td>
              <td>{{ $t->next_visit_at ? $t->next_visit_at->format('Y-m-d') : '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
