@extends('layouts.medicare')
@section('title','Jadwal Praktek')

@section('content')
  @if(session('ok')) <div class="flash">{{ session('ok') }}</div> @endif

  @php $days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']; @endphp

  <div class="grid grid-2">
    <div class="card">
      <div class="section-title"><i class="fa-solid fa-plus-circle"></i><h3>Tambah Jadwal</h3></div>
      <form method="POST" action="{{ route('doctor.schedules.store') }}">
        @csrf
        <div class="field">
          <label>Hari</label>
          <select name="day_of_week" required>
            @foreach($days as $i=>$d) <option value="{{ $i }}">{{ $d }}</option> @endforeach
          </select>
          @error('day_of_week') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="field">
          <label>Mulai</label>
          <input type="time" name="start_time" required>
          @error('start_time') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="field">
          <label>Selesai</label>
          <input type="time" name="end_time" required>
          @error('end_time') <small style="color:#b91c1c">{{ $message }}</small> @enderror
        </div>

        <div class="field">
          <label><input type="checkbox" name="is_available" value="1" checked> Tersedia</label>
        </div>

        <div class="actions">
          <button class="btn" type="submit"><i class="fa-solid fa-calendar-plus"></i> Tambah</button>
          <a class="btn btn-outline" href="{{ route('doctor.dashboard') }}">Kembali</a>
        </div>
      </form>
    </div>

    <div class="card">
      <div class="section-title"><i class="fa-solid fa-table-list"></i><h3>Daftar Jadwal</h3></div>
      @if($schedules->isEmpty())
        <p class="text-muted">Belum ada jadwal.</p>
      @else
        <table class="table">
          <thead>
            <tr><th>Hari</th><th>Jam</th><th>Status</th><th style="width:120px">Aksi</th></tr>
          </thead>
          <tbody>
            @foreach($schedules as $s)
              <tr>
                <td>{{ $days[$s->day_of_week] ?? $s->day_of_week }}</td>
                <td>{{ \Illuminate\Support\Str::of($s->start_time)->limit(5,'') }}–{{ \Illuminate\Support\Str::of($s->end_time)->limit(5,'') }}</td>
                <td><span class="badge">{{ $s->is_available ? 'Available' : 'Off' }}</span></td>
                <td>
                  <form method="POST" action="{{ route('doctor.schedules.destroy', $s) }}" onsubmit="return confirm('Hapus jadwal ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline" type="submit"><i class="fa-solid fa-trash"></i> Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
  </div>
@endsection
