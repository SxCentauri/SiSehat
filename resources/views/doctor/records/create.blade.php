@extends('layouts.medicare')
@section('title','Buat Rekam Medis')

@section('content')
  <div class="grid grid-2">
    <div class="card">
      <div class="section-title"><i class="fa-solid fa-user-injured"></i><h3>Informasi Pasien</h3></div>
      <p><strong>Pasien:</strong> {{ $appointment->patient->name ?? 'Pasien #'.$appointment->patient_id }}</p>
      <p><strong>Jadwal:</strong> {{ $appointment->date }} {{ \Illuminate\Support\Str::of($appointment->time)->limit(5,'') }}</p>
      <p><span class="badge">Status: {{ ucfirst($appointment->status) }}</span></p>
    </div>

    <div class="card">
      <div class="section-title"><i class="fa-solid fa-notes-medical"></i><h3>Form Rekam Medis</h3></div>
      <form method="POST" action="{{ route('doctor.records.store', $appointment) }}">
        @csrf
        <div class="field">
          <label>Keluhan</label>
          <textarea name="complaints" rows="3">{{ old('complaints') }}</textarea>
          @error('complaints') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>
        <div class="field">
          <label>Diagnosis</label>
          <textarea name="diagnosis" rows="3">{{ old('diagnosis') }}</textarea>
          @error('diagnosis') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>
        <div class="field">
          <label>Catatan</label>
          <textarea name="notes" rows="3">{{ old('notes') }}</textarea>
          @error('notes') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="actions">
          <button class="btn" type="submit"><i class="fa-solid fa-save"></i> Simpan</button>
          <a class="btn btn-outline" href="{{ route('doctor.appointments.index') }}">Kembali</a>
        </div>
      </form>
    </div>
  </div>
@endsection
