@extends('layouts.admin-modern')
@section('title','Edit Janji Temu - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-pen-to-square"></i><h3>Edit Janji Temu</h3></div>
  <form method="post" action="{{ route('admin.appointments.update',$appointment) }}">
    @csrf @method('PUT')
    <div class="form-group">
      <label class="form-label">Pasien</label>
      <select class="form-select" name="patient_id" required>
        @foreach($patients as $p)
          <option value="{{ $p->id }}" @selected(old('patient_id',$appointment->patient_id)==$p->id)>{{ $p->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label class="form-label">Dokter</label>
      <select class="form-select" name="doctor_id" required>
        @foreach($doctors as $d)
          <option value="{{ $d->id }}" @selected(old('doctor_id',$appointment->doctor_id)==$d->id)>{{ $d->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label class="form-label">Tanggal</label>
      <input class="form-control" type="date" name="date" value="{{ old('date',$appointment->date) }}" required>
    </div>
    <div class="form-group">
      <label class="form-label">Waktu</label>
      <input class="form-control" type="time" name="time" value="{{ old('time',$appointment->time) }}" required>
    </div>
    <div class="form-group">
      <label class="form-label">Status</label>
      <select class="form-select" name="status">
        @foreach(['pending'=>'Pending','approved'=>'Approved','cancelled'=>'Cancelled','completed'=>'Completed'] as $k=>$v)
          <option value="{{ $k }}" @selected(old('status',$appointment->status)==$k)>{{ $v }}</option>
        @endforeach
      </select>
    </div>
    <div class="actions">
      <button class="btn btn-primary" type="submit"><i class="fa-solid fa-save"></i> Update</button>
      <a class="btn btn-outline" href="{{ route('admin.appointments.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </form>
</div>
@endsection
