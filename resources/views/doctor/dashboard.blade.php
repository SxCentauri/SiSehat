<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Dokter - MediCare Hospital</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --secondary: #64748b;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --completed: #8b5cf6;
      --doctor: #059669;
      --doctor-dark: #047857;
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --text: #1f2937;
      --text-light: #6b7280;
      --border: #e5e7eb;
      --radius: 16px;
      --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      --gradient: linear-gradient(135deg, var(--doctor), var(--doctor-dark));
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--bg);
      color: var(--text);
      line-height: 1.6;
      padding-top: 80px;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px 40px;
    }

    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px;
      border: 1px solid var(--border);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      animation: fadeInUp 0.6s ease-out;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .grid {
      display: grid;
      gap: 24px;
      margin-bottom: 30px;
    }

    .grid-4 {
      grid-template-columns: repeat(4, 1fr);
    }

    .grid-3 {
      grid-template-columns: repeat(3, 1fr);
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 20px;
    }

    .header-content {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .header i {
      color: var(--doctor);
      background: #d1fae5;
      padding: 12px;
      border-radius: 12px;
      min-width: 46px;
      text-align: center;
      font-size: 18px;
    }

    .header h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--text);
      margin: 0;
    }

    .stat-card {
      text-align: center;
      padding: 24px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .stat-icon {
      width: 60px;
      height: 60px;
      border-radius: 12px;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 24px;
      margin: 0 auto 16px;
    }

    .stat-number {
      font-size: 32px;
      font-weight: 800;
      color: var(--doctor);
      margin: 8px 0;
      line-height: 1;
    }

    .stat-label {
      color: var(--text-light);
      font-size: 14px;
      margin-bottom: 16px;
    }

    .btn {
      padding: 12px 20px;
      border-radius: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 14px;
    }

    .btn-primary {
      background: var(--gradient);
      color: #fff;
      box-shadow: 0 4px 6px rgba(5, 150, 105, 0.2);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(5, 150, 105, 0.3);
    }

    .btn-outline {
      background: #f1f5f9;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .btn-outline:hover {
      background: #e2e8f0;
      transform: translateY(-2px);
    }

    .btn-success {
      background: var(--success);
      color: #fff;
      box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
    }

    .btn-success:hover {
      background: #0da271;
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(16, 185, 129, 0.3);
    }

    .btn-sm {
      padding: 10px 16px;
      font-size: 13px;
    }

    .btn-full {
      width: 100%;
      justify-content: center;
    }

    .alert {
      padding: 16px;
      border-radius: 10px;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .alert-success {
      background-color: #f0fdf4;
      border: 1px solid #bbf7d0;
      color: #166534;
    }

    .alert-success i {
      color: var(--success);
    }

    .quick-action-card {
      text-align: center;
      padding: 24px;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .action-icon {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 32px;
      margin: 0 auto 20px;
    }

    .action-title {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 12px;
      color: var(--text);
    }

    .action-description {
      color: var(--text-light);
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 20px;
      flex-grow: 1;
    }

    .table-container {
      overflow-x: auto;
      border-radius: 10px;
      border: 1px solid var(--border);
      margin: 20px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background-color: #f8fafc;
    }

    th {
      padding: 16px 20px;
      text-align: left;
      font-weight: 600;
      color: var(--text-light);
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      border-bottom: 1px solid var(--border);
    }

    td {
      padding: 16px 20px;
      border-bottom: 1px solid var(--border);
    }

    tbody tr {
      transition: all 0.3s ease;
    }

    tbody tr:hover {
      background-color: #f8fafc;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      gap: 4px;
    }

    .badge.pending {
      background-color: #fffbeb;
      color: var(--warning);
    }

    .badge.approved {
      background-color: #f0fdf4;
      color: var(--success);
    }

    .badge.rejected {
      background-color: #fef2f2;
      color: var(--danger);
    }

    .badge.completed {
      background-color: #faf5ff;
      color: var(--completed);
    }

    .table-actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .profile-card {
      text-align: center;
    }

    .progress-container {
      margin: 20px 0;
    }

    .progress-label {
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;
      font-size: 14px;
      color: var(--text-light);
    }

    .progress-value {
      font-weight: 600;
      color: var(--doctor);
    }

    .progress-bar {
      height: 8px;
      background: #f1f5f9;
      border-radius: 10px;
      overflow: hidden;
    }

    .progress-fill {
      height: 100%;
      background: var(--gradient);
      border-radius: 10px;
      transition: width 0.5s ease;
    }

    .empty-state {
      text-align: center;
      padding: 40px 20px;
      color: var(--text-light);
    }

    .empty-state i {
      font-size: 48px;
      margin-bottom: 16px;
      color: #d1d5db;
    }

    .empty-state h4 {
      font-size: 16px;
      margin-bottom: 8px;
      color: var(--text);
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
      .grid-4 {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 0 15px 30px;
      }

      .card {
        padding: 24px;
      }

      .header {
        flex-direction: column;
        align-items: flex-start;
      }

      .header-content {
        flex-direction: column;
        text-align: center;
        gap: 12px;
      }

      .header h2 {
        font-size: 22px;
      }

      .grid-4, .grid-3 {
        grid-template-columns: 1fr;
      }

      .stat-number {
        font-size: 28px;
      }

      .table-actions {
        flex-direction: column;
        align-items: stretch;
      }

      .action-icon {
        width: 60px;
        height: 60px;
        font-size: 24px;
      }
    }

    @media (max-width: 640px) {
      body {
        padding-top: 70px;
      }

      .container {
        padding: 0 12px 20px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .header h2 {
        font-size: 20px;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }

      th, td {
        padding: 12px 16px;
      }
    }

    @media (max-width: 480px) {
      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      .stat-number {
        font-size: 24px;
      }
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus, button:focus {
      outline: 2px solid var(--doctor);
      outline-offset: 2px;
    }

    /* Animation delays for cards */
    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    .card:nth-child(4) { animation-delay: 0.4s; }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    @if(session('ok'))
      <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('ok') }}</span>
      </div>
    @endif

    <!-- Welcome Header -->
    <div class="card" style="margin-bottom: 30px;">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-user-doctor"></i>
          <h2>Dashboard Dokter</h2>
        </div>
        <div style="color: var(--text-light); font-size: 14px;">
          <i class="fa-solid fa-calendar-day"></i>
          <span>{{ \Carbon\Carbon::now()->format('l, d F Y') }}</span>
        </div>
      </div>
    </div>

    <!-- Statistics Grid -->
    <div class="grid grid-4">
      <!-- Pending Appointments -->
      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-envelope-open-text"></i>
        </div>
        <div class="stat-number">{{ $pendingCount ?? 0 }}</div>
        <div class="stat-label">Pending Approval</div>
        <a href="{{ route('doctor.appointments.index') }}" class="btn btn-outline btn-sm btn-full">
          <i class="fa-solid fa-gear"></i> Kelola
        </a>
      </div>

      <!-- Today's Appointments -->
      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-calendar-day"></i>
        </div>
        <div class="stat-number">{{ $todayApproved ?? 0 }}</div>
        <div class="stat-label">Janji Hari Ini</div>
        <a href="{{ route('doctor.appointments.index') }}" class="btn btn-outline btn-sm btn-full">
          <i class="fa-solid fa-eye"></i> Lihat
        </a>
      </div>

      <!-- Medical Records -->
      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-file-medical"></i>
        </div>
        <div class="stat-number">{{ $recordsCount ?? 0 }}</div>
        <div class="stat-label">Rekam Medis</div>
        <a href="{{ route('doctor.records.index') }}" class="btn btn-outline btn-sm btn-full">
          <i class="fa-solid fa-list"></i> Lihat Rekam
        </a>
      </div>

      <!-- Unread Messages -->
      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-comments"></i>
        </div>
        <div class="stat-number">{{ $unreadMessages ?? 0 }}</div>
        <div class="stat-label">Pesan Baru</div>
        <a href="{{ route('doctor.chat.index') }}" class="btn btn-outline btn-sm btn-full">
          <i class="fa-solid fa-comment-dots"></i> Buka Chat
        </a>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-3">
      <!-- Profile Card -->
      <div class="card quick-action-card">
        <div class="action-icon">
          <i class="fa-solid fa-user-doctor"></i>
        </div>
        <div class="action-title">Profil Dokter</div>
        <div class="action-description">Kelola informasi profil dan spesialisasi Anda</div>

        <div class="progress-container">
          <div class="progress-label">
            <span>Kelengkapan Profil</span>
            <span class="progress-value">{{ $profileScore ?? 0 }}%</span>
          </div>
          <div class="progress-bar">
            <div class="progress-fill" style="width: {{ $profileScore ?? 0 }}%"></div>
          </div>
        </div>

        <a class="btn btn-primary btn-full" href="{{ route('doctor.profile.edit') }}">
          <i class="fa-solid fa-pen-to-square"></i> Edit Profil
        </a>
      </div>

      <!-- Schedule Card -->
      <div class="card quick-action-card">
        <div class="action-icon">
          <i class="fa-solid fa-calendar-check"></i>
        </div>
        <div class="action-title">Jadwal Praktek</div>
        <div class="action-description">Atur ketersediaan mingguan dan jam praktek untuk pasien</div>
        <a class="btn btn-primary btn-full" href="{{ route('doctor.schedules.index') }}">
          <i class="fa-solid fa-clock"></i> Kelola Jadwal
        </a>
      </div>

      <!-- Medical Records Card -->
      <div class="card quick-action-card">
        <div class="action-icon">
          <i class="fa-solid fa-stethoscope"></i>
        </div>
        <div class="action-title">Booking & Rekam Medis</div>
        <div class="action-description">Kelola janji temu dan buat rekam medis untuk pasien</div>
        <a class="btn btn-primary btn-full" href="{{ route('doctor.appointments.index') }}">
          <i class="fa-solid fa-clipboard-list"></i> Lihat Booking
        </a>
      </div>
    </div>

    <!-- Upcoming Appointments -->
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-hourglass-half"></i>
          <h2>Janji Terdekat</h2>
        </div>
        <a href="{{ route('doctor.appointments.index') }}" class="btn btn-outline btn-sm">
          <i class="fa-solid fa-list"></i> Lihat Semua
        </a>
      </div>

      @if($upcoming->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-calendar-xmark"></i>
          <h4>Belum ada janji mendatang</h4>
          <p>Semua janji temu telah selesai atau belum dijadwalkan</p>
        </div>
      @else
        <div class="table-container">
          <table>
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
                  <td>{{ \Carbon\Carbon::parse($a->date)->format('d M Y') }}</td>
                  <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
                  <td>{{ $a->patient->name ?? 'Pasien #'.$a->patient_id }}</td>
                  <td>
                    <span class="badge {{ $a->status }}">
                      @if($a->status == 'pending')
                        <i class="fa-solid fa-clock"></i>
                      @elseif($a->status == 'approved')
                        <i class="fa-solid fa-check-circle"></i>
                      @elseif($a->status == 'completed')
                        <i class="fa-solid fa-check-double"></i>
                      @else
                        <i class="fa-solid fa-times-circle"></i>
                      @endif
                      {{ ucfirst($a->status) }}
                    </span>
                  </td>
                  <td>
                    <div class="table-actions">
                      @if($a->status === 'pending')
                        <form method="POST" action="{{ route('doctor.appointments.approve', $a) }}" style="display: inline;">
                          @csrf
                          <button class="btn btn-success btn-sm" type="submit">
                            <i class="fa-solid fa-check"></i> Approve
                          </button>
                        </form>
                        <form method="POST" action="{{ route('doctor.appointments.reject', $a) }}" style="display: inline;">
                          @csrf
                          <button class="btn btn-outline btn-sm" type="submit" onclick="return confirm('Yakin menolak janji ini?')">
                            <i class="fa-solid fa-xmark"></i> Tolak
                          </button>
                        </form>
                      @else
                        <a class="btn btn-primary btn-sm" href="{{ route('doctor.records.create', $a) }}">
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
    document.addEventListener('DOMContentLoaded', function() {
      // Auto-hide alert after 5 seconds
      const alert = document.querySelector('.alert');
      if (alert) {
        setTimeout(() => {
          alert.style.opacity = '0';
          alert.style.transition = 'opacity 0.5s ease';
          setTimeout(() => {
            alert.style.display = 'none';
          }, 500);
        }, 5000);
      }

      // Add confirmation for reject actions
      const rejectButtons = document.querySelectorAll('button[type="submit"]');
      rejectButtons.forEach(button => {
        if (button.innerHTML.includes('Tolak')) {
          button.addEventListener('click', function(e) {
            if (!confirm('Apakah Anda yakin ingin menolak janji temu ini?')) {
              e.preventDefault();
            }
          });
        }
      });

      // Add hover effects to table rows
      const tableRows = document.querySelectorAll('tbody tr');
      tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(5px)';
        });
        row.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });
    });

    // Navbar functionality (if needed)
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar?.classList.add('scrolled');
      } else {
        navbar?.classList.remove('scrolled');
      }
    });
  </script>
</body>
</html>
