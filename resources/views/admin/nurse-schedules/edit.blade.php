@extends('layouts.admin-modern')
@section('title','Edit Jadwal Perawat - MediCare')

@section('content')
<div class="card">
  <div class="section-title"><i class="fa-solid fa-pen-to-square"></i><h3>Edit Jadwal</h3></div>

  <form method="post" action="{{ route('admin.nurse-schedules.update', $nurse_schedule) }}">
    @csrf @method('PUT')

    <div class="form-group">
      <label class="form-label">Perawat</label>
      <select class="form-select" name="nurse_id" required>
        @foreach($nurses as $n)
          <option value="{{ $n->id }}" @selected(old('nurse_id',$nurse_schedule->nurse_id)==$n->id)>{{ $n->name }}</option>
        @endforeach
      </select>
      @error('nurse_id') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label class="form-label">Hari</label>
      <select class="form-select" name="day_of_week" required>
        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $d)
          <option value="{{ $d }}" @selected(old('day_of_week',$nurse_schedule->day_of_week)==$d)>{{ $d }}</option>
        @endforeach
      </select>
      @error('day_of_week') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="grid grid-2">
      <div class="form-group">
        <label class="form-label">Mulai</label>
        <input class="form-control" type="time" name="start_time" value="{{ old('start_time',$nurse_schedule->start_time) }}" required>
        @error('start_time') <span class="error-message">{{ $message }}</span> @enderror
      </div>
      <div class="form-group">
        <label class="form-label">Selesai</label>
        <input class="form-control" type="time" name="end_time" value="{{ old('end_time',$nurse_schedule->end_time) }}" required>
        @error('end_time') <span class="error-message">{{ $message }}</span> @enderror
      </div>
    </div>

    <div class="form-group">
      <label class="form-label">Catatan (opsional)</label>
      <textarea class="form-control" name="notes">{{ old('notes',$nurse_schedule->notes) }}</textarea>
      @error('notes') <span class="error-message">{{ $message }}</span> @enderror
    </div>

    <div class="actions">
      <button class="btn btn-primary" type="submit">
        <i class="fa-solid fa-save"></i> Update
      </button>
      <a class="btn btn-outline" href="{{ route('admin.nurse-schedules.index') }}">
        <i class="fa-solid fa-arrow-left"></i> Kembali
      </a>
    </div>
  </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const form = document.querySelector('form[action="{{ route('admin.nurse-schedules.update', $nurse_schedule) }}"]');
  if (!form) return;
  form.addEventListener('submit', function (e) {
    if (!form.checkValidity()) { e.preventDefault(); e.stopPropagation(); return; }
    const btn = form.querySelector('button[type="submit"]');
    if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...'; }
  });
});
</script>
@endsection
