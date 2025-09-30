<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - MediCare Hospital</title>
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
      --admin: #2563eb;
      --admin-dark: #1e40af;
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --text: #1f2937;
      --text-light: #6b7280;
      --border: #e5e7eb;
      --radius: 16px;
      --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      --gradient: linear-gradient(135deg, var(--admin), var(--admin-dark));
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

    .grid-2 {
      grid-template-columns: repeat(2, 1fr);
    }

    .grid-kpi {
      grid-template-columns: repeat(4, 1fr);
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
      color: var(--admin);
      background: #dbeafe;
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

    .header-date {
      color: var(--text-light);
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .toolbar {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .toolbar input, .toolbar select {
      padding: 10px 12px;
      border: 1px solid var(--border);
      border-radius: 12px;
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

    .btn-block {
      width: 100%;
      justify-content: center;
      margin-top: auto;
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
      color: var(--admin);
      margin: 8px 0;
      line-height: 1;
    }

    .stat-label {
      color: var(--text-light);
      font-size: 14px;
      margin-bottom: 16px;
    }

    .kpi {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    text-align: center;
    padding: 24px;
    height: 100%;
    }

    .kpi-content {
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    flex-grow: 1;
    width: 100%;
    margin-top: auto;
    }

    .kpi .icon {
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

    .kpi .num {
    font-size: 32px;
    font-weight: 800;
    color: var(--admin);
    margin: 8px 0;
    line-height: 1;
    }

    .kpi .label {
    color: var(--text-light);
    font-size: 14px;
    margin-bottom: 16px;
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

    .badge.danger {
      background-color: #fef2f2;
      color: var(--danger);
    }

    .list {
      display: flex;
      flex-direction: column;
    }

    .list .item {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      padding: 12px 0;
      border-bottom: 1px solid var(--border);
      font-size: 14px;
    }

    .list .item:last-child {
      border-bottom: none;
    }

    .mini {
      font-size: 12px;
      color: var(--text-light);
      margin-bottom: 8px;
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

    .progress-container {
    margin: 10px 0;
    width: 100%;
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
      color: var(--admin);
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

    .filterable {
      transition: all 0.3s ease;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
      .grid-4, .grid-kpi {
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
        text-align: center;
        gap: 16px;
      }

      .header-content {
        flex-direction: column;
        text-align: center;
        gap: 12px;
      }

      .header h2 {
        font-size: 22px;
      }

      .header-date {
        justify-content: center;
      }

      .grid-4, .grid-3, .grid-2, .grid-kpi {
        grid-template-columns: 1fr;
      }

      .stat-number, .kpi .num {
        font-size: 28px;
      }

      .toolbar {
        flex-direction: column;
        align-items: stretch;
      }

      .toolbar input, .toolbar select {
        width: 100%;
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

      .stat-number, .kpi .num {
        font-size: 24px;
      }
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus, button:focus {
      outline: 2px solid var(--admin);
      outline-offset: 2px;
    }

    /* Animation delays for cards */
    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    .card:nth-child(4) { animation-delay: 0.4s; }

    /* Pulse animation for emergency card */
    @keyframes pulse {
      0% { transform: translateY(0); }
      50% { transform: translateY(-2px) scale(1.01); }
      100% { transform: translateY(0); }
    }
  </style>
</head>
<body>
@include('layouts.medicare')

<main class="container">
  @if(session('success') || session('ok'))
    <div class="alert alert-success">
      <i class="fa-solid fa-circle-check"></i>
      <span>{{ session('success') ?? session('ok') }}</span>
    </div>
  @endif

  {{-- ===== Header ===== --}}
  <div class="card" style="margin-bottom:30px">
    <div class="header">
      <div class="header-content">
        <i class="fa-solid fa-user-shield"></i>
        <h2>Dashboard Admin</h2>
      </div>
      <div class="header-date">
        <i class="fa-solid fa-calendar-day"></i>
        <span>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
      </div>
    </div>
    <div class="toolbar">
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> User Baru</a>
      <a href="{{ route('admin.appointments.create') }}" class="btn btn-outline"><i class="fa-regular fa-calendar-plus"></i> Buat Janji</a>
      <a href="{{ route('admin.room-bookings.create') }}" class="btn btn-outline"><i class="fa-solid fa-bed"></i> Booking Ruangan</a>
      <a href="{{ route('admin.nurse-schedules.create') }}" class="btn btn-outline"><i class="fa-solid fa-user-nurse"></i> Jadwal Perawat</a>
      <a href="{{ route('admin.emergencies.create') }}" class="btn btn-outline"><i class="fa-solid fa-triangle-exclamation"></i> Catat Emergency</a>
    </div>
  </div>

  @php
    $patients = $stats['patients'] ?? 0;
    $doctors  = $stats['doctors'] ?? 0;
    $nurses   = $stats['nurses'] ?? 0;
    $rooms    = $stats['rooms'] ?? 0;

    $emToday  = $stats['emergencies_today'] ?? 0;
    $aptToday = $stats['appointments_today'] ?? 0;
    $bkToday  = $stats['bookings_today'] ?? 0;

    $roomsOccupied = $stats['rooms_occupied'] ?? null;
    $utilPct = ($rooms && $roomsOccupied !== null) ? round(($roomsOccupied/$rooms)*100) : null;

    $usersTot = $patients + $doctors + $nurses;

    $recentAppointments = $recent['appointments'] ?? collect();
    $recentBookings     = $recent['bookings'] ?? collect();
    $recentEmergencies  = $recent['emergencies'] ?? collect();
    $recentSchedules    = $recent['schedules'] ?? collect();
    $schedCnt           = $recentSchedules instanceof \Illuminate\Support\Collection ? $recentSchedules->count() : (is_array($recentSchedules) ? count($recentSchedules) : 0);

    $timeline = collect()
      ->merge($recentAppointments->map(fn($a)=>[
        'time'=>\Carbon\Carbon::parse($a->created_at),
        'icon'=>'fa-calendar-check',
        'label'=>"Janji: ".(optional($a->patient)->name).' → '.(optional($a->doctor)->name),
        'right'=>$a->status
      ]))
      ->merge($recentBookings->map(fn($b)=>[
        'time'=>\Carbon\Carbon::parse($b->created_at),
        'icon'=>'fa-bed',
        'label'=>"Booking: ".(optional($b->room)->name).' — '.(optional($b->patient)->name),
        'right'=>$b->status
      ]))
      ->merge($recentEmergencies->map(fn($e)=>[
        'time'=>\Carbon\Carbon::parse($e->created_at),
        'icon'=>'fa-triangle-exclamation',
        'label'=>"Emergency #{$e->id}: ".\Illuminate\Support\Str::limit($e->description,50),
        'right'=>$e->status,'danger'=>true
      ]))
      ->sortByDesc('time')
      ->take(10);
  @endphp

  {{-- ===== KPI (sesuai daftar permintaan) ===== --}}
  @php
    $emToday  = $stats['emergencies_today'] ?? 0;
    $rooms    = $stats['rooms'] ?? 0;
    $occ      = $stats['rooms_occupied'] ?? null;
    $utilPct  = ($rooms && $occ !== null) ? round(($occ/$rooms)*100) : null;

    $aptToday = $stats['appointments_today'] ?? 0;
    $patients = $stats['patients'] ?? 0;
    $doctors  = $stats['doctors']  ?? 0;
    $nurses   = $stats['nurses']   ?? 0;
    $usersTot = $patients + $doctors + $nurses;
    $bkToday  = $stats['bookings_today'] ?? 0;
    $schedCnt = $recentSchedules instanceof \Illuminate\Support\Collection ? $recentSchedules->count() : (is_array($recentSchedules) ? count($recentSchedules) : 0);
  @endphp

  <section class="grid grid-kpi">
    <div class="card kpi" style="border-color:#fecaca">
      <div class="icon" style="background:linear-gradient(135deg,#ef4444,#dc2626)"><i class="fa-solid fa-triangle-exclamation"></i></div>
      <div class="num" style="color:#ef4444">{{ $emToday }}</div>
      <div class="label">Emergency Hari Ini</div>
      <div class="kpi-content">
        <a href="{{ route('admin.emergencies.index') }}" class="btn btn-danger btn-block">
          <i class="fa-solid fa-bolt"></i> Kelola Emergency
        </a>
      </div>
    </div>

    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-hospital"></i></div>
      <div class="num">{{ $rooms }}</div>
      <div class="label">Total Ruangan</div>
      <div class="kpi-content">
        @if(!is_null($utilPct))
          <div class="progress-container" style="width:100%">
            <div class="progress-label">
              <span>Utilisasi</span>
              <span class="progress-value">{{ $utilPct }}%</span>
            </div>
            <div class="progress-bar">
              <div class="progress-fill" style="width: {{ $utilPct }}%"></div>
            </div>
          </div>
          <div class="mini">Terpakai: {{ $occ }}/{{ $rooms }}</div>
        @else
          <div class="mini">Utilisasi: N/A</div>
        @endif
        <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline btn-block" style="margin-top:8px">
          <i class="fa-solid fa-cog"></i> Kelola Ruangan
        </a>
      </div>
    </div>

    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-calendar-check"></i></div>
      <div class="num">{{ $aptToday }}</div>
      <div class="label">Janji Temu Hari Ini</div>
      <div class="kpi-content">
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline btn-block">
          <i class="fa-solid fa-list"></i> Kelola Janji Temu
        </a>
      </div>
    </div>

    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-chart-line"></i></div>
      <div class="num">{{ number_format($usersTot + $rooms + $aptToday + $bkToday) }}</div>
      <div class="label">Ringkasan Statistik</div>
      <div class="kpi-content">
        <a class="btn btn-primary btn-block" href="{{ route('admin.stats.index') }}">
          <i class="fa-solid fa-chart-line"></i> Lihat Statistik
        </a>
      </div>
    </div>

    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-users"></i></div>
      <div class="num">{{ $usersTot }}</div>
      <div class="label">Total Pengguna</div>
      <div class="kpi-content">
        <div class="mini">Pasien: {{ $patients }} • Dokter: {{ $doctors }} • Perawat: {{ $nurses }}</div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline btn-block" style="margin-top:8px">
          <i class="fa-solid fa-user-gear"></i> Kelola Pengguna
        </a>
      </div>
    </div>

    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-bed-pulse"></i></div>
      <div class="num">{{ $bkToday }}</div>
      <div class="label">Booking Ruangan Hari Ini</div>
      <div class="kpi-content">
        <a href="{{ route('admin.room-bookings.index') }}" class="btn btn-outline btn-block">
          <i class="fa-solid fa-gear"></i> Kelola Booking
        </a>
      </div>
    </div>

    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-user-nurse"></i></div>
      <div class="num">{{ $schedCnt }}</div>
      <div class="label">Jadwal Perawat (terbaru)</div>
      <div class="kpi-content">
        <a href="{{ route('admin.nurse-schedules.index') }}" class="btn btn-outline btn-block">
          <i class="fa-solid fa-calendar-days"></i> Kelola Jadwal
        </a>
      </div>
    </div>
  </section>

  <section class="grid grid-2" style="margin-top:10px">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-wand-magic-sparkles"></i>
          <h2>Quick Actions</h2>
        </div>
        <div class="toolbar">
          <input id="quickSearch" type="search" placeholder="Cari di timeline/daftar…">
        </div>
      </div>
      <div class="toolbar" style="gap:8px">
        <a class="btn btn-outline" href="{{ route('admin.appointments.create') }}"><i class="fa-regular fa-calendar-plus"></i> Buat Janji</a>
        <a class="btn btn-outline" href="{{ route('admin.room-bookings.create') }}"><i class="fa-solid fa-bed"></i> Booking Ruangan</a>
        <a class="btn btn-outline" href="{{ route('admin.emergencies.create') }}"><i class="fa-solid fa-triangle-exclamation"></i> Catat Emergency</a>
        <a class="btn btn-outline" href="{{ route('admin.nurse-schedules.create') }}"><i class="fa-solid fa-user-nurse"></i> Jadwal Perawat</a>
        <a class="btn btn-primary" href="{{ route('admin.users.create') }}"><i class="fa-solid fa-user-plus"></i> User Baru</a>
      </div>
    </div>

    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-circle-info"></i>
          <h2>Ringkasan</h2>
        </div>
      </div>
      <div class="list">
        <div class="item"><span>Total Pengguna</span><strong>{{ $usersTot }}</strong></div>
        <div class="item"><span>Emergency Hari Ini</span><span class="badge danger">{{ $emToday }}</span></div>
        <div class="item"><span>Janji Hari Ini</span><span class="badge">{{ $aptToday }}</span></div>
        <div class="item"><span>Booking Hari Ini</span><span class="badge">{{ $bkToday }}</span></div>
      </div>
      <div class="mini" style="margin-top:8px">* Realtime per tanggal hari ini.</div>
    </div>
  </section>

  <section class="grid grid-2" style="margin-top:10px">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-clock-rotate-left"></i>
          <h2>Activity Timeline</h2>
        </div>
      </div>
      <div id="timelineList" class="list">
        @forelse($timeline as $t)
          <div class="item filterable">
            <div>
              <i class="fa-solid {{ $t['icon'] }}" style="color:{{ isset($t['danger'])?'#ef4444':'#2563eb' }}"></i>
              <strong style="margin-left:6px">{{ $t['time']->format('d M H:i') }}</strong>
              <span class="mini">—</span>
              <span>{{ $t['label'] }}</span>
            </div>
            <span class="badge {{ isset($t['danger'])?'danger':'' }}">{{ $t['right'] }}</span>
          </div>
        @empty
          <div class="mini">Tidak ada aktivitas terbaru.</div>
        @endforelse
      </div>
    </div>

    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-clipboard-list"></i>
          <h2>Daftar Terbaru</h2>
        </div>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i> Lihat Semua</a>
      </div>
      <div id="recentLists" class="list">
        <div class="item filterable"><div><strong>Janji Terbaru</strong></div></div>
        @forelse($recentAppointments as $a)
          <div class="item filterable">
            <div>{{ $a->date }} {{ $a->time }} — {{ optional($a->patient)->name }} → {{ optional($a->doctor)->name }}</div>
            <span class="badge">{{ $a->status }}</span>
          </div>
        @empty <div class="mini">Tidak ada data janji.</div> @endforelse

        <div class="item filterable" style="border-top:1px dashed var(--border)"><div><strong>Booking Terbaru</strong></div></div>
        @forelse($recentBookings as $b)
          <div class="item filterable">
            <div>{{ optional($b->room)->name }} — {{ optional($b->patient)->name }}
              <span class="mini">({{ \Carbon\Carbon::parse($b->created_at)->format('d M Y H:i') }})</span>
            </div>
            <span class="badge">{{ $b->status }}</span>
          </div>
        @empty <div class="mini">Tidak ada data booking.</div> @endforelse

        <div class="item filterable" style="border-top:1px dashed var(--border)"><div><strong>Emergency Terbaru</strong></div></div>
        @forelse($recentEmergencies as $e)
          <div class="item filterable"><div>#{{ $e->id }} — {{ \Illuminate\Support\Str::limit($e->description, 60) }}</div><span class="badge danger">{{ $e->status }}</span></div>
        @empty <div class="mini">Tidak ada data emergency.</div> @endforelse

        <div class="item filterable" style="border-top:1px dashed var(--border)"><div><strong>Jadwal Perawat Terbaru</strong></div></div>
        @forelse($recentSchedules as $s)
          <div class="item filterable">
            <div>{{ optional($s->nurse)->name }} — {{ $s->day_of_week }}
              <span class="mini">({{ $s->start_time }}–{{ $s->end_time }})</span>
            </div>
          </div>
        @empty <div class="mini">Tidak ada data jadwal.</div> @endforelse
      </div>
    </div>
  </section>
</main>

<script>
  (function(){
    const input = document.getElementById('quickSearch');
    if (!input) return;
    input.addEventListener('input', e=>{
      const q = e.target.value.toLowerCase();
      document.querySelectorAll('.filterable').forEach(el=>{
        el.style.display = el.textContent.toLowerCase().includes(q) ? '' : 'none';
      });
    });
  })();

  // Pulse kartu emergency jika > 0
  (function(){
    const emergencyCount = {{ $emToday ?? 0 }};
    if (emergencyCount > 0){
      const kpis = document.querySelectorAll('.kpi');
      const emCard = kpis[0]; // kartu emergency posisi pertama
      if (emCard){
        emCard.style.animation = 'pulse 2s infinite';
      }
    }
  })();
</script>
</body>
</html>
