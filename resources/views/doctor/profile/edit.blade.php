@extends('layouts.medicare')
@section('title','Edit Profil Dokter')

@section('content')
  @if(session('ok')) <div class="flash">{{ session('ok') }}</div> @endif

  <div class="grid grid-2">
    <div class="card">
      <div class="section-title"><i class="fa-solid fa-id-card-clip"></i><h3>Informasi Profil</h3></div>
      <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="field">
          <label>Spesialis</label>
          <input type="text" name="specialization" value="{{ old('specialization', $profile->specialization) }}">
          @error('specialization') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="field">
          <label>Bio</label>
          <textarea name="bio" rows="4">{{ old('bio', $profile->bio) }}</textarea>
          @error('bio') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="field">
          <label>Alamat Klinik</label>
          <input type="text" name="clinic_address" value="{{ old('clinic_address', $profile->clinic_address) }}">
          @error('clinic_address') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="field">
          <label>No. Telepon</label>
          <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}">
          @error('phone') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="actions" style="margin-top:6px">
          <button class="btn" type="submit"><i class="fa-solid fa-save"></i> Simpan</button>
          <a class="btn btn-outline" href="{{ route('doctor.dashboard') }}">Kembali</a>
        </div>
      </form>
    </div>

    <div class="card">
      <div class="section-title"><i class="fa-solid fa-image"></i><h3>Avatar</h3></div>
      <form method="POST" action="{{ route('doctor.profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="field">
          <label>Upload Avatar</label>
          <input type="file" name="avatar" accept="image/*">
          @error('avatar') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        @if($profile->avatar_path)
          <div style="margin-top:10px">
            <img src="{{ asset('storage/'.$profile->avatar_path) }}" alt="avatar" style="width:140px;border-radius:16px;box-shadow:0 10px 30px rgba(2,6,23,.12)">
          </div>
        @else
          <p class="text-muted" style="margin-top:6px">Belum ada avatar.</p>
        @endif

        <div class="actions" style="margin-top:10px">
          <button class="btn" type="submit"><i class="fa-solid fa-cloud-arrow-up"></i> Unggah</button>
        </div>
      </form>
    </div>
  </div>
@endsection
