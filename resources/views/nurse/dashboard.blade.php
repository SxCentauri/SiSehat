<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Perawat - MediCare Hospital</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --muted: #6b7280;
      --bg-light: #f9fafb;
      --white: #ffffff;
      --shadow: 0 8px 20px rgba(37,99,235,0.1);
    }
    * {margin:0;padding:0;box-sizing:border-box;}
    body {
      font-family:'Inter',sans-serif;
      background:var(--bg-light);
      color:#1f2937;
      padding-top:80px;
    }
    .container {
      max-width:1200px;
      margin:0 auto;
      padding:0 1.5rem;
    }
    h2 {
      font-size:1.5rem;
      font-weight:700;
      margin-bottom:.5rem;
      display:flex;
      align-items:center;
      gap:.6rem;
    }
    h2 i {color:var(--primary);}
    p.text-muted {color:var(--muted); margin-bottom:2rem;}
    .grid {
      display:grid;
      gap:1.5rem;
      grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));
    }
    .card {
      background:var(--white);
      border-radius:16px;
      box-shadow:var(--shadow);
      padding:1.5rem;
      transition:.3s;
      display:flex;
      flex-direction:column;
      gap:.8rem;
    }
    .card:hover {transform:translateY(-3px);}
    .card h3 {
      font-size:1.1rem;
      font-weight:600;
      display:flex;
      align-items:center;
      gap:.6rem;
    }
    .card h3 i {
      color:var(--primary);
      background:#eff6ff;
      padding:.6rem;
      border-radius:10px;
    }
    .stat {
      font-size:2rem;
      font-weight:700;
    }
    .desc {
      font-size:.9rem;
      color:var(--muted);
    }
    .btn {
      padding:.6rem 1rem;
      border:2px solid var(--primary);
      border-radius:10px;
      font-weight:600;
      color:var(--primary);
      text-align:center;
      display:inline-flex;
      align-items:center;
      gap:.4rem;
      transition:.3s;
      width:max-content;
    }
    .btn:hover {
      background:var(--primary);
      color:#fff;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <h2><i class="fa-solid fa-user-nurse"></i> Dashboard Perawat</h2>
    <p class="text-muted">Selamat datang di panel perawat. Kelola jadwal, pasien, dan kondisi darurat dari sini.</p>

    <div class="grid">
      <div class="card">
        <h3><i class="fa-solid fa-bed-pulse"></i> Pasien Rawat Inap</h3>
        <div class="stat">{{ $inpatients ?? 0 }}</div>
        <p class="desc">Total pasien yang sedang dirawat</p>
        <a href="{{ route('nurse.monitorings.index') }}" class="btn"><i class="fa-solid fa-eye"></i>Lihat Pasien</a>
      </div>

      <div class="card">
        <h3><i class="fa-solid fa-hospital"></i> Status Ruangan</h3>
        <div class="stat">{{ $rooms ?? 0 }}</div>
        <p class="desc">Jumlah ruangan tersedia / terisi</p>
        <a href="{{ route('nurse.rooms.index') }}" class="btn"><i class="fa-solid fa-gear"></i>Kelola Ruangan</a>
      </div>

      <div class="card">
        <h3><i class="fa-solid fa-pills"></i> Reminder Obat</h3>
        <div class="stat">{{ $reminders ?? 0 }}</div>
        <p class="desc">Jadwal obat untuk pasien</p>
        <a href="{{ route('nurse.reminders.index') }}" class="btn"><i class="fa-solid fa-eye"></i>Lihat Obat</a>
      </div>

      <div class="card">
        <h3><i class="fa-solid fa-calendar-check"></i> Jadwal & Tugas</h3>
        <div class="stat">{{ $schedules ?? 0 }}</div>
        <p class="desc">Tugas & shift yang harus dijalankan</p>
        <a href="{{ route('nurse.schedules.index') }}" class="btn"><i class="fa-solid fa-list"></i>Kelola Tugas</a>
      </div>

      <div class="card">
        <h3><i class="fa-solid fa-user-doctor"></i> Support Dokter</h3>
        <div class="stat">{{ $supports ?? 0 }}</div>
        <p class="desc">Permintaan bantuan dari dokter</p>
        <a href="{{ route('nurse.supports.index') }}" class="btn"><i class="fa-solid fa-eye"></i>Lihat Support</a>
      </div>

      <div class="card">
        <h3><i class="fa-solid fa-triangle-exclamation"></i> Emergency</h3>
        <div class="stat" style="color:#dc2626;">{{ $emergencies ?? 0 }}</div>
        <p class="desc">Kasus darurat yang harus ditangani</p>
        <a href="{{ route('nurse.emergencies.index') }}" class="btn"><i class="fa-solid fa-bolt"></i>Respon Darurat</a>
      </div>
    </div>
  </main>
</body>
</html>
