<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Dokter - MediCare Hospital</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --accent-color: #60a5fa;
        --light-blue: #dbeafe;
        --extra-light-blue: #eff6ff;
        --text-color: #1f2937;
        --text-light: #6b7280;
        --white: #ffffff;
        --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
        --shadow: 0 20px 50px rgba(37, 99, 235, 0.1);
        --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
    }

    body {
        line-height: 1.6;
        color: var(--text-color);
        overflow-x: hidden;
        background: var(--white);
        padding-top: 80px;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Kartu & Grid */
    .card {
        background: #fff;
        border-radius: 25px;
        box-shadow: var(--shadow);
        padding: 2.5rem;
        margin-bottom: 2rem;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(96, 165, 250, 0.1);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
        border-color: rgba(96, 165, 250, 0.2);
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 4px;
        background: var(--gradient);
        transition: left 0.4s ease;
    }

    .card:hover::before {
        left: 0;
    }

    .grid {
        display: grid;
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .grid-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }

    .grid-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    @media (max-width: 1200px) {
        .grid-4 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .grid-4, .grid-3 {
            grid-template-columns: 1fr;
        }
        
        .card {
            padding: 2rem 1.5rem;
            border-radius: 20px;
        }
    }

    /* Section Title */
    .section-title {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-color);
    }

    .section-title i {
        color: var(--primary-color);
        font-size: 1.3rem;
        width: 45px;
        height: 45px;
        background: var(--gradient-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    /* Statistik Cards */
    .stat-card {
        text-align: center;
        padding: 2rem 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 100%;
    }

    .stat-card-content {
        width: 100%;
    }

    .stat-number {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--secondary-color);
        margin: 1rem 0;
        background: linear-gradient(135deg, var(--text-color) 0%, var(--primary-color) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
    }

    .stat-description {
        color: var(--text-light);
        font-size: 0.95rem;
        margin-bottom: 1.5rem;
        line-height: 1.5;
        min-height: 2.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Progress Bar */
    .progress-container {
        margin: 1.5rem 0;
        width: 100%;
    }

    .progress-label {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: var(--text-light);
        width: 100%;
    }

    .progress-bar {
        height: 8px;
        background: #eef2ff;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
    }

    .progress-fill {
        height: 100%;
        background: var(--gradient);
        border-radius: 10px;
        transition: width 0.5s ease;
    }

    .progress-value {
        font-weight: 700;
        color: var(--secondary-color);
    }

    /* Buttons */
    .btn {
        padding: 0.9rem 1.8rem;
        font-size: 0.95rem;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        position: relative;
        overflow: hidden;
        text-align: center;
        min-width: 140px;
    }

    .btn-primary {
        background: var(--gradient);
        color: white;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
    }

    .btn-outline {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
    }

    .btn-outline:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(37, 99, 235, 0.2);
    }

    .btn-sm {
        padding: 0.7rem 1.4rem;
        font-size: 0.85rem;
        min-width: 120px;
    }

    /* Table */
    .table-container {
        overflow-x: auto;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(37, 99, 235, 0.08);
        margin: 2rem 0;
        width: 100%;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
        border-radius: 20px;
        overflow: hidden;
    }

    .table th {
        background: var(--gradient-light);
        color: var(--primary-color);
        padding: 1.2rem 1.5rem;
        font-weight: 600;
        text-align: left;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table td {
        padding: 1.2rem 1.5rem;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.95rem;
        vertical-align: middle;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    .table tr:hover {
        background: #f8fafc;
    }

    /* Badge & Status */
    .badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: center;
    }

    .badge.pending {
        background: #fef3c7;
        color: #92400e;
    }

    .badge.approved {
        background: #dcfce7;
        color: #166534;
    }

    .badge.rejected {
        background: #fee2e2;
        color: #991b1b;
    }

    /* Actions */
    .actions {
        display: flex;
        gap: 0.8rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        margin-top: auto;
        padding-top: 1.5rem;
        width: 100%;
    }

    .table-actions {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    /* Flash Message */
    .flash {
        padding: 1.2rem 1.5rem;
        background: #dcfce7;
        color: #166534;
        border-radius: 15px;
        margin-bottom: 2rem;
        font-weight: 600;
        border: 1px solid #bbf7d0;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.15);
    }

    .flash i {
        font-size: 1.2rem;
    }

    /* Text Utilities */
    .text-muted {
        color: var(--text-light);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .card-text-content {
        margin-bottom: 1.5rem;
        flex-grow: 1;
    }

    /* Form Elements */
    form {
        display: inline;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeInUp 0.6s ease-out;
    }

    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    .card:nth-child(4) { animation-delay: 0.4s; }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .container {
            padding: 0 1.5rem;
        }
        
        .stat-number {
            font-size: 2.4rem;
        }
        
        .btn, .btn-sm {
            min-width: unset;
            width: 100%;
        }
        
        .actions {
            flex-direction: column;
        }
        
        .table-actions {
            flex-direction: column;
            align-items: stretch;
        }
    }

    @media (max-width: 480px) {
        body {
            padding-top: 70px;
        }
        
        .section-title {
            font-size: 1.3rem;
            flex-direction: column;
            text-align: center;
            gap: 0.5rem;
        }
        
        .section-title i {
            width: 40px;
            height: 40px;
            font-size: 1.1rem;
        }
        
        .stat-number {
            font-size: 2rem;
        }
        
        .stat-description {
            min-height: unset;
        }
        
        .table th, .table td {
            padding: 0.8rem;
        }
    }

    /* Additional alignment improvements */
    .text-center {
        text-align: center;
    }
    
    .flex-center {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .w-100 {
        width: 100%;
    }
  </style>
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
          <a class="btn btn-outline btn-sm" href="{{ route('doctor.appointments.index') }}">
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