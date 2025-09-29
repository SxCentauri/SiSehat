<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Pasien - MediCare Hospital</title>
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
      --critical: #dc2626;
      --completed: #8b5cf6;
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --text: #1f2937;
      --text-light: #6b7280;
      --border: #e5e7eb;
      --radius: 16px;
      --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      --gradient: linear-gradient(135deg, var(--primary), var(--primary-dark));
      --emergency-gradient: linear-gradient(135deg, #ef4444, #dc2626);
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
      color: var(--primary);
      background: #e0f2fe;
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

    .grid-2 {
      grid-template-columns: repeat(2, 1fr);
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

    .emergency-stat-card {
      text-align: center;
      padding: 24px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border: 2px solid #fecaca;
      background: linear-gradient(135deg, #fef2f2, #fecaca);
    }

    .emergency-stat-icon {
      width: 60px;
      height: 60px;
      border-radius: 12px;
      background: var(--emergency-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 24px;
      margin: 0 auto 16px;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }

    .stat-number {
      font-size: 32px;
      font-weight: 800;
      color: var(--primary);
      margin: 8px 0;
      line-height: 1;
    }

    .emergency-stat-number {
      font-size: 32px;
      font-weight: 800;
      color: var(--critical);
      margin: 8px 0;
      line-height: 1;
    }

    .stat-label {
      color: var(--text-light);
      font-size: 14px;
      margin-bottom: 16px;
    }

    .emergency-stat-label {
      color: var(--critical);
      font-size: 14px;
      margin-bottom: 16px;
      font-weight: 600;
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
      box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
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

    .btn-emergency {
      background: var(--emergency-gradient);
      color: #fff;
      box-shadow: 0 4px 6px rgba(239, 68, 68, 0.3);
    }

    .btn-emergency:hover {
      background: linear-gradient(135deg, #dc2626, #b91c1c);
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(239, 68, 68, 0.4);
    }

    .btn-danger {
      background: var(--danger);
      color: #fff;
      box-shadow: 0 4px 6px rgba(239, 68, 68, 0.2);
    }

    .btn-danger:hover {
      background: #dc2626;
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(239, 68, 68, 0.3);
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

    .badge.confirmed {
      background-color: #f0fdf4;
      color: var(--success);
    }

    .badge.approved {
      background-color: #f0fdf4;
      color: var(--success);
    }

    .badge.completed {
      background-color: #faf5ff;
      color: var(--completed);
    }

    .badge.cancelled {
      background-color: #fef2f2;
      color: var(--danger);
    }

    .quick-action-card {
      text-align: center;
      padding: 24px;
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .emergency-action-card {
      text-align: center;
      padding: 24px;
      height: 100%;
      display: flex;
      flex-direction: column;
      border: 2px solid #fecaca;
      background: linear-gradient(135deg, #fef2f2, #fed7d7);
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

    .emergency-action-icon {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      background: var(--emergency-gradient);
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

    .emergency-action-title {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 12px;
      color: var(--critical);
    }

    .action-description {
      color: var(--text-light);
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 20px;
      flex-grow: 1;
    }

    .emergency-action-description {
      color: var(--critical);
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 20px;
      flex-grow: 1;
      font-weight: 500;
    }

    .medical-record-item {
      background: #f8fafc;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 12px;
      border: 1px solid var(--border);
      transition: all 0.3s ease;
    }

    .medical-record-item:hover {
      background: #f1f5f9;
      transform: translateX(5px);
    }

    .record-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 8px;
    }

    .record-diagnosis {
      font-weight: 600;
      color: var(--text);
      margin-bottom: 4px;
    }

    .record-date {
      color: var(--text-light);
      font-size: 12px;
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

    .emergency-section {
      margin-top: 30px;
      text-align: center;
    }

    .emergency-btn {
      padding: 16px 32px;
      font-size: 16px;
      font-weight: 700;
      border-radius: 12px;
      background: var(--emergency-gradient);
      color: white;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3);
      width: 100%;
      max-width: 400px;
    }

    .emergency-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(239, 68, 68, 0.4);
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
        align-items: center;
        justify-content: center;
        text-align: center;
        gap: 12px;
      }

      .header-content {
        flex-direction: column;
        text-align: center;
        align-items: center;
      }

      .date-info {
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
      }

      .header h2 {
        font-size: 22px;
      }

      .grid-4, .grid-3, .grid-2 {
        grid-template-columns: 1fr;
      }

      .stat-number {
        font-size: 28px;
      }

      .emergency-stat-number {
        font-size: 28px;
      }

      .action-icon {
        width: 60px;
        height: 60px;
        font-size: 24px;
      }

      .emergency-action-icon {
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

      th, td {
        padding: 12px 16px;
      }

      .btn {
        width: 100%;
        justify-content: center;
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

      .emergency-stat-number {
        font-size: 24px;
      }
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus, button:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }

    .btn-emergency:focus {
      outline: 2px solid var(--critical);
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    @if(session('success'))
      <div class="alert alert-success">
        <i class="fa-solid fa-circle-check"></i>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    <!-- Welcome Header -->
    <div class="card" style="margin-bottom: 30px;">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-user"></i>
          <h2>Dashboard Pasien</h2>
        </div>
        <div class="date-info" style="color: var(--text-light); font-size: 14px;">
          <i class="fa-solid fa-calendar-day"></i>
          <span>{{ \Carbon\Carbon::now()->format('l, d F Y') }}</span>
        </div>
      </div>
    </div>

    @php
      $upcomingCount = $upcoming->count();
      $rxPendingCount = $rxPendingCount ?? 0;
      $pendingRemindersCount = $pendingRemindersCount ?? 0;
      $pendingBookingCount = $pendingBookingCount ?? 0;
      $emergencyCount = $emergencyCount ?? 0; // Tambahkan variabel untuk emergency count
    @endphp

    <!-- Statistics Cards -->
    <div class="grid grid-4">
      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-calendar-check"></i>
        </div>
        <div class="stat-number">{{ $upcomingCount }}</div>
        <div class="stat-label">Janji Mendatang</div>
        <a class="btn btn-outline btn-sm btn-full" href="{{ route('patient.appointments.index') }}">
          <i class="fa-solid fa-eye"></i> Lihat
        </a>
      </div>

      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-pills"></i>
        </div>
        <div class="stat-number">{{ $pendingRemindersCount }}</div>
        <div class="stat-label">Reminder Obat</div>
        <a class="btn btn-outline btn-sm btn-full" href="{{ route('patient.reminders.index') }}">
          <i class="fa-solid fa-eye"></i> Lihat
        </a>
      </div>

      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-file-medical"></i>
        </div>
        <div class="stat-number">{{ $medicalRecordCount }}</div>
        <div class="stat-label">Riwayat Medis</div>
        <a class="btn btn-outline btn-sm btn-full" href="{{ route('patient.records.index') }}">
          <i class="fa-solid fa-pills"></i> Lihat Riwayat
        </a>
      </div>

      <div class="card stat-card">
        <div class="stat-icon">
          <i class="fa-solid fa-bed"></i>
        </div>
        <div class="stat-number">{{ $pendingBookingCount }}</div>
        <div class="stat-label">Booking Ruangan</div>
        <a class="btn btn-outline btn-sm btn-full" href="{{ route('patient.bookingroom.index') }}">
          <i class="fa-solid fa-eye"></i> Lihat Riwayat
        </a>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-3">
      <div class="card quick-action-card">
        <div class="action-icon">
          <i class="fa-solid fa-comments"></i>
        </div>
        <div class="action-title">Chat Dokter</div>
        <div class="action-description">Konsultasi singkat dan tindak lanjut.</div>
        <a class="btn btn-primary btn-full" href="{{ route('patient.chats.index') }}">
          <i class="fa-solid fa-plus"></i> Buka Chat
        </a>
      </div>

      <div class="card quick-action-card">
        <div class="action-icon">
          <i class="fa-solid fa-bed-pulse"></i>
        </div>
        <div class="action-title">Cek Ketersediaan Ruang</div>
        <div class="action-description">Pantau status, kapasitas, dan keterisian ruangan rawat inap</div>
        <a class="btn btn-primary btn-full" href="{{ route('patient.rooms.index') }}">
          <i class="fa-solid fa-hospital"></i> Lihat Ruangan
        </a>
      </div>

      <!-- Emergency Action Card -->
      <div class="card emergency-action-card">
        <div class="emergency-action-icon">
          <i class="fa-solid fas fa-plus"></i>
        </div>
        <div class="emergency-action-title">Darurat Medis</div>
        <div class="emergency-action-description">Akses cepat untuk keadaan darurat dan bantuan medis segera</div>
        <a class="btn btn-emergency btn-full" href="{{ route('patient.emergencies.create') }}">
          <i class="fa-solid fa-plus"></i> Akses Darurat
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
        <a href="{{ route('patient.appointments.index') }}" class="btn btn-outline btn-sm">
          <i class="fa-solid fa-list"></i> Lihat Semua
        </a>
      </div>

      @if($upcoming->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-calendar-xmark"></i>
          <h4>Belum ada janji mendatang</h4>
          <p>Jadwalkan janji temu pertama Anda</p>
        </div>
      @else
        <div class="table-container">
          <table>
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
                  <td>{{ \Carbon\Carbon::parse($a->date)->format('d M Y') }}</td>
                  <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
                  <td>{{ $a->doctor->name ?? ('#'.$a->doctor_id) }}</td>
                  <td>
                    <span class="badge {{ $a->status }}">
                      @if($a->status == 'pending')
                        <i class="fa-solid fa-clock"></i>
                      @elseif($a->status == 'confirmed' || $a->status == 'approved')
                        <i class="fa-solid fa-check-circle"></i>
                      @elseif($a->status == 'completed')
                        <i class="fa-solid fa-check-double"></i>
                      @else
                        <i class="fa-solid fa-times-circle"></i>
                      @endif
                      {{ ucfirst($a->status) }}
                    </span>
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
      // Add hover effects to medical records
      const medicalRecords = document.querySelectorAll('.medical-record-item');
      medicalRecords.forEach(record => {
        record.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(5px)';
        });
        record.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });

      // Add special effects to emergency cards
      const emergencyCards = document.querySelectorAll('.emergency-stat-card, .emergency-action-card');
      emergencyCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-5px) scale(1.02)';
        });
        card.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(-5px)';
        });
      });
    });
  </script>
</body>
</html>
