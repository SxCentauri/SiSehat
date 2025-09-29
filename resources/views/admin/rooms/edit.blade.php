@extends('layouts.admin-modern')
@section('title','Edit Ruangan - MediCare')

@section('content')
<div class="grid">
  <div class="card">
    <div class="section-title">
      <i class="fa-solid fa-pen-to-square"></i><h3>Edit Ruangan</h3>
    </div>

    <form method="post" action="{{ route('admin.rooms.update',$room) }}">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Kode</label>
        <input class="form-control" name="code" value="{{ old('code',$room->code) }}" placeholder="mis. A-101">
        @error('code') <span class="error-message">{{ $message }}</span> @enderror
      </div>
      <div class="form-group">
        <label class="form-label">Nama</label>
        <input class="form-control" name="name" value="{{ old('name',$room->name) }}" required>
        @error('name') <span class="error-message">{{ $message }}</span> @enderror
      </div>
      <div class="form-group">
        <label class="form-label">Kapasitas</label>
        <input class="form-control" type="number" min="0" name="capacity" value="{{ old('capacity',$room->capacity) }}">
        @error('capacity') <span class="error-message">{{ $message }}</span> @enderror
      </div>
      <div class="form-group">
        <label class="form-label">Terisi</label>
        <input class="form-control" type="number" min="0" name="occupied" value="{{ old('occupied',$room->occupied) }}">
        @error('occupied') <span class="error-message">{{ $message }}</span> @enderror
      </div>
      <div class="form-group">
        <label class="form-label">Status</label>
        <select class="form-select" name="status" required>
          @foreach(['available'=>'Available','occupied'=>'Occupied','maintenance'=>'Maintenance'] as $k=>$v)
            <option value="{{ $k }}" @selected(old('status',$room->status)===$k)>{{ $v }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Catatan</label>
        <textarea class="form-control" name="notes">{{ old('notes',$room->notes) }}</textarea>
      </div>

      <div class="actions" style="margin-top:22px">
        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-save"></i> Update</button>
        <a class="btn btn-outline" href="{{ route('admin.rooms.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
      </div>
    </form>
  </div>
</div>
@endsection
