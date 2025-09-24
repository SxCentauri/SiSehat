<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Pasien - MediCare Hospital</title>

  <!-- Icons & font -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Reuse CSS dashboard dokter agar gaya konsisten -->
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <!-- (opsional) gaya kecil tambahan khusus pasien -->
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  {{-- Navbar/topbar yang sama dengan halaman dokter --}}
  @include('layouts.medicare')

  <main class="container">
    @if(session('success'))
      <div class="flash">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
      </div>
    @endif

    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-user"></i>
      <h2 style="margin:0;">Dashboard Pasien</h2>
    </div>

    @php
      $upcomingCount = $upcoming->count();
      $queueCount    = $queues->count();
      $rxPendingCount = $rxPendingCount ?? 0;   // kalau belum disediakan controller, default 0
      $unpaidCount   = $unpaidCount ?? 0;       // sama seperti di atas
    @endphp

    {{-- ===== Stats ringkas ===== --}}
    <div class="grid grid-4">
      <div class="card stat-card">
        <div class="stat-card-content">
          <div class="section-title">
            <i class="fa-solid fa-calendar-check"></i>
            <h3>Janji Mendatang</h3>
          </div>
          <div class="stat-number">{{ $upcomingCount }}</div>
          <p class="stat-description text-center">Menunggu kunjungan</p>
        </div>
        <div class="actions">
          <a class="btn btn-outline btn-sm" href="{{ route('patient.appointments.index') }}">
            <i class="fa-solid fa-eye"></i> Lihat
          </a>
        </div>
      </div>

      <div class="card stat-card">
        <div class="stat-card-content">
          <div class="section-title">
            <i class="fa-solid fa-users-line"></i>
            <h3>Antrian Aktif</h3>
          </div>
          <div class="stat-number">{{ $queueCount }}</div>
          <p class="stat-description text-center">Antrean terakhir</p>
        </div>
        <div class="actions">
          <a class="btn btn-outline btn-sm" href="{{ route('patient.queues.index') }}">
            <i class="fa-solid fa-list-ol"></i> Rincian
          </a>
        </div>
      </div>

      <div class="card stat-card">
        <div class="stat-card-content">
          <div class="section-title">
            <i class="fa-solid fa-prescription-bottle-medical"></i>
            <h3>Resep Menunggu</h3>
          </div>
          <div class="stat-number">{{ $rxPendingCount }}</div>
          <p class="stat-description text-center">Perlu ditebus</p>
        </div>
        <div class="actions">
          <a class="btn btn-outline btn-sm" href="{{ route('patient.prescriptions.index') }}">
            <i class="fa-solid fa-pills"></i> Lihat Resep
          </a>
        </div>
      </div>

      <div class="card stat-card">
    <div class="stat-card-content">
        <div class="section-title">
            {{-- Mengganti ikon menjadi ikon tempat tidur --}}
            <i class="fa-solid fa-bed"></i>
            <h3>Booking Ruangan</h3>
        </div>
        {{-- Menampilkan jumlah booking yang pending --}}
        <div class="stat-number">{{ $pendingBookingCount }}</div>
        <p class="stat-description text-center">Permintaan Pending</p>
    </div>
    <div class="actions">
        {{-- Mengarahkan ke halaman riwayat booking ruangan --}}
        <a class="btn btn-outline btn-sm" href="{{ route('patient.bookingroom.index') }}">
            <i class="fa-solid fa-eye"></i> Lihat Riwayat
        </a>
    </div>
    </div>
    </div>

    {{-- ===== Aksi cepat ===== --}}
    <div class="grid grid-3">
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-calendar-plus"></i>
          <h3>Buat Janji Temu</h3>
        </div>
        <p class="text-muted">Pilih dokter, tanggal, dan jam yang tersedia.</p>
        <div class="actions">
          <a class="btn btn-primary btn-sm w-100" href="{{ route('patient.appointments.create') }}">
            <i class="fa-solid fa-plus"></i> Buat Janji
          </a>
        </div>
      </div>

      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-bed-pulse"></i>
          <h3>Cek Ketersediaan Ruang</h3>
        </div>
        <p class="text-muted">Pantau status, kapasitas, dan keterisian ruangan.</p>
        <div class="actions">
          <a class="btn btn-primary btn-sm w-100" href="{{ route('patient.rooms.index') }}">
            <i class="fa-solid fa-hospital"></i> Lihat Ruangan
          </a>
        </div>
      </div>

      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-comments"></i>
          <h3>Chat Dokter</h3>
        </div>
        <p class="text-muted">Konsultasi singkat dan tindak lanjut.</p>
        <div class="actions">
          <a class="btn btn-primary btn-sm w-100" href="{{ route('patient.chats.index') }}">
            <i class="fa-solid fa-message"></i> Buka Chat
          </a>
        </div>
      </div>
    </div>

    {{-- ===== Janji Terdekat ===== --}}
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-hourglass-half"></i>
        <h3>Janji Terdekat</h3>
      </div>

      @if($upcoming->isEmpty())
        <p class="text-muted text-center">Belum ada janji mendatang.</p>
      @else
        <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Dokter</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($upcoming as $a)
                <tr>
                  <td>{{ $a->date }}</td>
                  <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
                  <td>{{ $a->doctor->name ?? ('#'.$a->doctor_id) }}</td>
                  <td><span class="badge {{ $a->status }}">{{ ucfirst($a->status) }}</span></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>

    {{-- ===== Riwayat Medis Terakhir ===== --}}
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-file-medical"></i>
        <h3>Riwayat Medis Terakhir</h3>
      </div>
      @if($recentRecords->isEmpty())
        <p class="text-muted text-center">Belum ada catatan medis.</p>
      @else
        <ul style="list-style:none; padding:0; margin:0;">
          @foreach($recentRecords as $r)
            <li class="card" style="margin: 8px 0;">
              <div style="display:flex; justify-content:space-between; gap:10px; align-items:center;">
                <div>
                  <div><strong>Diagnosa:</strong> {{ $r->diagnosis ?? '-' }}</div>
                  <div class="text-muted">{{ $r->created_at->format('d M Y H:i') }}</div>
                </div>
                <a class="btn btn-outline btn-sm" href="{{ route('patient.records.show', $r) }}">
                  <i class="fa-solid fa-eye"></i> Detail
                </a>
              </div>
            </li>
          @endforeach
        </ul>
      @endif
    </div>

    {{-- Emergency --}}
    <form action="{{ route('patient.emergency.store') }}" method="POST" style="margin-top:16px;">
      @csrf
      <input type="hidden" name="level" value="high">
      <button class="btn btn-danger w-100" type="submit">🚨 Emergency Button</button>
    </form>
  </main>

  <script>
    // re-apply kecil agar sama seperti halaman dokter
    const navbar = document.getElementById('navbar');
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    if (navbarToggle) {
      navbarToggle.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
        navbarToggle.classList.toggle('active');
      });
    }
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) navbar?.classList.add('scrolled'); else navbar?.classList.remove('scrolled');
    });
  </script>
</body>
</html>
