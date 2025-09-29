@extends('layouts.admin-modern')
@section('title','Tambah Janji Temu - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-circle-plus"></i><h3>Tambah Janji Temu</h3></div>
  <form method="post" action="{{ route('admin.appointments.store') }}">
    @csrf
    <div class="form-group">
      <label class="form-label">Pasien</label>
      <select class="form-select" name="patient_id" required>
        <option value="">-- Pilih --</option>
        @foreach($patients as $p)
          <option value="{{ $p->id }}" @selected(old('patient_id')==$p->id)>{{ $p->name }}</option>
        @endforeach
      </select>
      @error('patient_id') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Dokter</label>
      <select class="form-select" name="doctor_id" required>
        <option value="">-- Pilih --</option>
        @foreach($doctors as $d)
          <option value="{{ $d->id }}" @selected(old('doctor_id')==$d->id)>{{ $d->name }}</option>
        @endforeach
      </select>
      @error('doctor_id') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Tanggal</label>
      <input class="form-control" type="date" name="date" value="{{ old('date') }}" required>
      @error('date') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Waktu</label>
      <input class="form-control" type="time" name="time" value="{{ old('time') }}" required>
      @error('time') <span class="error-message">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label class="form-label">Status</label>
      <select class="form-select" name="status">
        @foreach(['pending'=>'Pending','approved'=>'Approved','cancelled'=>'Cancelled','completed'=>'Completed'] as $k=>$v)
          <option value="{{ $k }}" @selected(old('status')==$k)>{{ $v }}</option>
        @endforeach
      </select>
    </div>

    <div class="actions">
      <button class="btn btn-primary" type="submit"><i class="fa-solid fa-save"></i> Simpan</button>
      <a class="btn btn-outline" href="{{ route('admin.appointments.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </form>
</div>
@endsection
