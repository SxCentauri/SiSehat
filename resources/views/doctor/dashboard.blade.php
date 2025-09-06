@extends('layouts.medicare')
@section('title','Dashboard Dokter')

@section('content')
  @if(session('ok')) <div class="flash">{{ session('ok') }}</div> @endif

  {{-- Kartu statistik --}}
  <div class="grid grid-4" style="display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px">
    <div class="card" style="display:grid;gap:6px">
      <div class="section-title" style="margin:0"><i class="fa-solid fa-envelope-open-text"></i><h3>Pending</h3></div>
      <div style="font-size:32px;font-weight:800;color:#1e40af">{{ $pendingCount }}</div>
      <small class="text-muted" style="color:#64748b">Booking menunggu persetujuan</small>
      <div class="actions" style="margin-top:6px"><a class="btn btn-outline" href="{{ route('doctor.appointments.index') }}">Kelola</a></div>
    </div>

    <div class="card" style="display:grid;gap:6px">
      <div class="section-title" style="margin:0"><i class="fa-solid fa-calendar-day"></i><h3>Janji Hari Ini</h3></div>
      <div style="font-size:32px;font-weight:800;color:#1e40af">{{ $todayApproved }}</div>
      <small class="text-muted" style="color:#64748b">Status approved, tanggal hari ini</small>
      <div class="actions" style="margin-top:6px"><a class="btn btn-outline" href="{{ route('doctor.appointments.index') }}">Lihat</a></div>
    </div>

    <div class="card" style="display:grid;gap:6px">
      <div class="section-title" style="margin:0"><i class="fa-solid fa-file-medical"></i><h3>Rekam Medis</h3></div>
      <div style="font-size:32px;font-weight:800;color:#1e40af">{{ $recordsCount }}</div>
      <small class="text-muted" style="color:#64748b">Total rekam medis yang kamu buat</small>
      <div class="actions" style="margin-top:6px"><a class="btn btn-outline" href="{{ route('doctor.appointments.index') }}">Buat dari Booking</a></div>
    </div>

    <div class="card" style="display:grid;gap:6px">
      <div class="section-title" style="margin:0"><i class="fa-solid fa-comments"></i><h3>Pesan Belum Dibaca</h3></div>
      <div style="font-size:32px;font-weight:800;color:#1e40af">{{ $unreadMessages }}</div>
      <small class="text-muted" style="color:#64748b">Dari pasien (chat)</small>
      <div class="actions" style="margin-top:6px"><a class="btn btn-outline" href="{{ route('doctor.appointments.index') }}">Buka Chat</a></div>
    </div>
  </div>

  {{-- Panel Profil & Aksi cepat --}}
  <div class="grid grid-3" style="margin-top:18px">
    <div class="card">
      <div class="section-title"><i class="fa-solid fa-user-doctor"></i><h3>Profil Dokter</h3></div>
      <p class="text-muted" style="color:#64748b">Skor kelengkapan profil:</p>
      <div style="margin-top:8px;background:#eef2ff;border-radius:12px;overflow:hidden;height:12px">
        <div style="width:{{ $profileScore }}%;height:12px;background:var(--gradient)"></div>
      </div>
      <small style="display:block;margin-top:6px;color:#334155;font-weight:700">{{ $profileScore }}%</small>
      <div class="actions" style="margin-top:10px">
        <a class="btn" href="{{ route('doctor.profile.edit') }}"><i class="fa-solid fa-pen"></i> Edit Profil</a>
      </div>
    </div>

    <div class="card">
      <div class="section-title"><i class="fa-solid fa-calendar-check"></i><h3>Jadwal Praktek</h3></div>
      <p class="text-muted" style="color:#64748b">Atur ketersediaan mingguan dan jam praktek.</p>
      <div class="actions" style="margin-top:10px">
        <a class="btn" href="{{ route('doctor.schedules.index') }}"><i class="fa-solid fa-clock"></i> Kelola Jadwal</a>
      </div>
    </div>

    <div class="card">
      <div class="section-title"><i class="fa-solid fa-stethoscope"></i><h3>Booking & Rekam Medis</h3></div>
      <p class="text-muted" style="color:#64748b">Setujui/Tolak booking, buat diagnosis & perawatan.</p>
      <div class="actions" style="margin-top:10px">
        <a class="btn" href="{{ route('doctor.appointments.index') }}"><i class="fa-solid fa-clipboard-list"></i> Lihat Booking</a>
      </div>
    </div>
  </div>

  {{-- Upcoming appointments --}}
  <div class="card" style="margin-top:18px">
    <div class="section-title"><i class="fa-solid fa-hourglass-half"></i><h3>Janji Terdekat</h3></div>

    @if($upcoming->isEmpty())
      <p class="text-muted" style="color:#64748b">Belum ada janji mendatang.</p>
    @else
      <table class="table">
        <thead>
          <tr><th>Tanggal</th><th>Jam</th><th>Pasien</th><th>Status</th><th>Action</th></tr>
        </thead>
        <tbody>
          @foreach($upcoming as $a)
            <tr>
              <td>{{ $a->date }}</td>
              <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
              <td>{{ $a->patient->name ?? 'Pasien #'.$a->patient_id }}</td>
              <td><span class="badge">{{ ucfirst($a->status) }}</span></td>
              <td class="actions">
                @if($a->status === 'pending')
                  <form method="POST" action="{{ route('doctor.appointments.approve', $a) }}" style="display:inline-block">
                    @csrf <button class="btn" type="submit"><i class="fa-solid fa-check"></i> Approve</button>
                  </form>
                  <form method="POST" action="{{ route('doctor.appointments.reject', $a) }}" style="display:inline-block">
                    @csrf <button class="btn btn-outline" type="submit"><i class="fa-solid fa-xmark"></i> Tolak</button>
                  </form>
                @else
                  <a class="btn btn-outline" href="{{ route('doctor.records.create', $a) }}"><i class="fa-solid fa-notes-medical"></i> Rekam Medis</a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
