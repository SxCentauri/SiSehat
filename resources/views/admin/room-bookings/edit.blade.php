@extends('layouts.admin-modern')
@section('title','Edit Booking Ruangan - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-pen-to-square"></i><h3>Edit Booking</h3></div>

  <form method="post" action="{{ route('admin.room-bookings.update',$room_booking) }}">
    @csrf @method('PUT')

    <div class="form-group">
      <label class="form-label">Ruangan</label>
      <select class="form-select" name="room_id" required>
        @foreach($rooms as $r)
          <option value="{{ $r->id }}" @selected(old('room_id',$room_booking->room_id)==$r->id)>{{ $r->code ?? $r->name }}</option>
        @endforeach
      </select>
      @error('room_id') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="form-label">Pasien</label>
      <select class="form-select" name="patient_id" required>
        @foreach($patients as $p)
          <option value="{{ $p->id }}" @selected(old('patient_id',$room_booking->patient_id)==$p->id)>{{ $p->name }}</option>
        @endforeach
      </select>
      @error('patient_id') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="form-label">Perawat (opsional)</label>
      <select class="form-select" name="nurse_id">
        <option value="">- Tidak ada -</option>
        @foreach($nurses as $n)
          <option value="{{ $n->id }}" @selected(old('nurse_id',$room_booking->nurse_id)==$n->id)>{{ $n->name }}</option>
        @endforeach
      </select>
      @error('nurse_id') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="form-label">Kondisi Pasien</label>
      <input class="form-control" name="condition" value="{{ old('condition',$room_booking->condition) }}" required>
      @error('condition') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="grid grid-2">
      <div class="form-group">
        <label class="form-label">Mulai</label>
        <input class="form-control" type="datetime-local" name="start_at"
               value="{{ old('start_at', optional($room_booking->start_at)->format('Y-m-d\TH:i')) }}" required>
        @error('start_at') <span class="error-message">{{ $message }}</span> @enderror
      </div>
      <div class="form-group">
        <label class="form-label">Selesai</label>
        <input class="form-control" type="datetime-local" name="end_at"
               value="{{ old('end_at', optional($room_booking->end_at)->format('Y-m-d\TH:i')) }}" required>
        @error('end_at') <span class="error-message">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Status</label>
      <select class="form-select" name="status" required>
        @foreach(['pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected','completed'=>'Completed'] as $k=>$v)
          <option value="{{ $k }}" @selected(old('status',$room_booking->status)==$k)>{{ $v }}</option>
        @endforeach
      </select>
      @error('status') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="form-label">Catatan</label>
      <textarea class="form-control" name="notes">{{ old('notes',$room_booking->notes) }}</textarea>
    </div>

    <div class="actions">
      <button class="btn btn-primary"><i class="fa-solid fa-save"></i> Update</button>
      <a class="btn btn-outline" href="{{ route('admin.room-bookings.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </form>
</div>
@endsection
