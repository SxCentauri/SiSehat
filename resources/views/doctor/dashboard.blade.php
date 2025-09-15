<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Dokter - MediCare Hospital</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/doctor/dashboard.css">
</head>
<body>
  <!-- NAVBAR -->
  @include('layouts.medicare')

  <main class="container">
    @if(session('ok'))
      <div class="flash">
        <i class="fa-solid fa-circle-check"></i> {{ session('ok') }}
      </div>
    @endif

    {{-- Kartu statistik --}}
    <div class="grid grid-4">
      <div class="card stat-card">
        <div class="stat-card-content">
          <div class="section-title">
            <i class="fa-solid fa-envelope-open-text"></i>
            <h3>Pending</h3>
          </div>
          <div class="stat-number">{{ $pendingCount }}</div>
          <p class="stat-description text-center">Booking menunggu persetujuan</p>
        </div>
        <div class="actions">
          <a class="btn btn-outline btn-sm" href="{{ route('doctor.appointments.index') }}">
            <i class="fa-solid fa-gear"></i> Kelola
          </a>
        </div>
      </div>

      <div class="card stat-card">
        <div class="stat-card-content">
          <div class="section-title">
            <i class="fa-solid fa-calendar-day"></i>
            <h3>Janji Hari Ini</h3>
          </div>
          <div class="stat-number">{{ $todayApproved }}</div>
          <p class="stat-description text-center">Status approved, tanggal hari ini</p>
        </div>
        <div class="actions">
          <a class="btn btn-outline btn-sm" href="{{ route('doctor.appointments.index') }}">
            <i class="fa-solid fa-eye"></i> Lihat
          </a>
        </div>
      </div>

      <div class="card stat-card">
        <div class="stat-card-content">
          <div class="section-title">
            <i class="fa-solid fa-file-medical"></i>
            <h3>Rekam Medis</h3>
          </div>
          <div class="stat-number">{{ $recordsCount }}</div>
          <p class="stat-description text-center">Total rekam medis yang kamu buat</p>
        </div>
        <div class="actions">
          <a class="btn btn-outline btn-sm" href="{{ route('doctor.records.index') }}">
            <i class="fa-solid fa-list"></i> Lihat Rekam Medis
          </a>
        </div>
      </div>

      <div class="card stat-card">
        <div class="stat-card-content">
          <div class="section-title">
            <i class="fa-solid fa-comments"></i>
            <h3>Pesan</h3>
          </div>
          <div class="stat-number">{{ $unreadMessages }}</div>
          <p class="stat-description text-center">Dari pasien (chat)</p>
        </div>
        <div class="actions">
          <a class="btn btn-outline btn-sm" href="{{ route('doctor.chat.index') }}">
            <i class="fa-solid fa-comment-dots"></i> Buka Chat
          </a>
        </div>
      </div>
    </div>

    {{-- Panel Profil & Aksi cepat --}}
    <div class="grid grid-3">
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-user-doctor"></i>
          <h3>Profil Dokter</h3>
        </div>
        <div class="card-text-content">
          <p class="text-muted">Skor kelengkapan profil:</p>
          <div class="progress-container">
            <div class="progress-label">
              <span>Kelengkapan</span>
              <span class="progress-value">{{ $profileScore }}%</span>
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width:{{ $profileScore }}%"></div>
            </div>
          </div>
        </div>
        <div class="actions">
          <a class="btn btn-primary btn-sm w-100" href="{{ route('doctor.profile.edit') }}">
            <i class="fa-solid fa-pen"></i> Edit Profil
          </a>
        </div>
      </div>

      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-calendar-check"></i>
          <h3>Jadwal Praktek</h3>
        </div>
        <div class="card-text-content">
          <p class="text-muted">Atur ketersediaan mingguan dan jam praktek.</p>
        </div>
        <div class="actions">
          <a class="btn btn-primary btn-sm w-100" href="{{ route('doctor.schedules.index') }}">
            <i class="fa-solid fa-clock"></i> Kelola Jadwal
          </a>
        </div>
      </div>

      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-stethoscope"></i>
          <h3>Booking & Rekam Medis</h3>
        </div>
        <div class="card-text-content">
          <p class="text-muted">Setujui/Tolak booking, buat diagnosis & perawatan.</p>
        </div>
        <div class="actions">
          <a class="btn btn-primary btn-sm w-100" href="{{ route('doctor.appointments.index') }}">
            <i class="fa-solid fa-clipboard-list"></i> Lihat Booking
          </a>
        </div>
      </div>
    </div>

    {{-- Upcoming appointments --}}
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
                <th>Pasien</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($upcoming as $a)
                <tr>
                  <td>{{ $a->date }}</td>
                  <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
                  <td>{{ $a->patient->name ?? 'Pasien #'.$a->patient_id }}</td>
                  <td>
                    <span class="badge {{ $a->status }}">{{ ucfirst($a->status) }}</span>
                  </td>
                  <td>
                    <div class="table-actions">
                      @if($a->status === 'pending')
                        <form method="POST" action="{{ route('doctor.appointments.approve', $a) }}">
                          @csrf
                          <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fa-solid fa-check"></i> Approve
                          </button>
                        </form>
                        <form method="POST" action="{{ route('doctor.appointments.reject', $a) }}">
                          @csrf
                          <button class="btn btn-outline btn-sm" type="submit">
                            <i class="fa-solid fa-xmark"></i> Tolak
                          </button>
                        </form>
                      @else
                        <a class="btn btn-outline btn-sm" href="{{ route('doctor.records.create', $a) }}">
                          <i class="fa-solid fa-notes-medical"></i> Rekam Medis
                        </a>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </main>

  <script>
    // Toggle mobile menu
    const navbar = document.getElementById('navbar');
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    const navbarLinks = document.querySelectorAll('.navbar-link');

    if (navbarToggle) {
      navbarToggle.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
        navbarToggle.classList.toggle('active');
      });
    }

    navbarLinks.forEach(link => {
      link.addEventListener('click', () => {
        navbarMenu.classList.remove('active');
        navbarToggle.classList.remove('active');
      });
    });

    // Scroll effect
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) navbar.classList.add('scrolled');
      else navbar.classList.remove('scrolled');
    });

    // User dropdown
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userDropdown = document.getElementById('userDropdown');

    if (userMenuBtn && userDropdown) {
      userMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdown.classList.toggle('show');
        userMenuBtn.setAttribute('aria-expanded', userDropdown.classList.contains('show'));
      });
      document.addEventListener('click', (e) => {
        if (!userDropdown.contains(e.target) && !userMenuBtn.contains(e.target)) {
          userDropdown.classList.remove('show');
          userMenuBtn.setAttribute('aria-expanded', 'false');
        }
      });
    }
  </script>
</body>
</html>
