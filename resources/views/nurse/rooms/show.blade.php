<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Ruangan - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --secondary: #1e40af;
      --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
      --bg: #f8fafc;
      --radius: 16px;
      --shadow: 0 15px 40px rgba(37,99,235,0.1);
      --warning: #f59e0b;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: #1f2937;
      line-height: 1.6;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 100px auto 40px;
      padding: 0 20px;
    }

    .card {
      background: #fff;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px;
      border: 1px solid rgba(96,165,250,0.1);
      margin-bottom: 24px;
    }

    .section-title {
      display: flex;
      align-items: center;
      gap: 14px;
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .section-title i {
      color: var(--primary);
      background: #e0f2fe;
      padding: 12px;
      border-radius: 12px;
      min-width: 46px;
      text-align: center;
    }

    .detail-item {
      display: flex;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #e5e7eb;
    }

    .detail-item:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .detail-label {
      min-width: 120px;
      font-weight: 600;
      color: #374151;
    }

    .detail-value {
      flex: 1;
    }

    .status-badge {
      padding: 6px 12px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 13px;
      display: inline-block;
    }

    .status-available {
      background: #bbf7d0;
      color: #166534;
    }

    .status-occupied {
      background: #fecaca;
      color: #991b1b;
    }

    .status-maintenance {
      background: #fde68a;
      color: #92400e;
    }

    .btn {
      padding: 12px 24px;
      border-radius: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: .3s;
      font-size: 14px;
    }

    .btn-secondary {
      background: #e5e7eb;
      color: #1f2937;
    }

    .btn-secondary:hover {
      background: #d1d5db;
      transform: translateY(-2px);
    }

    .capacity-bar {
      height: 10px;
      background: #e5e7eb;
      border-radius: 5px;
      margin-top: 8px;
      overflow: hidden;
    }

    .capacity-fill {
      height: 100%;
      background: var(--gradient);
      border-radius: 5px;
      transition: width 0.5s ease;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        margin: 90px auto 30px;
        padding: 0 15px;
      }

      .card {
        padding: 24px;
      }

      .section-title {
        font-size: 20px;
      }

      .detail-item {
        flex-direction: column;
        gap: 8px;
      }

      .detail-label {
        min-width: auto;
      }
    }

    @media (max-width: 480px) {
      .container {
        margin: 80px auto 20px;
        padding: 0 12px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .section-title {
        font-size: 18px;
        flex-direction: column;
        text-align: center;
        gap: 10px;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')
  <div class="container">
    <div class="section-title">
      <i class="fa-solid fa-bed"></i>
      <h3>Detail Ruangan</h3>
    </div>

    <div class="card">
      <div class="detail-item">
        <div class="detail-label">Nama Ruangan</div>
        <div class="detail-value">{{ $room->name }}</div>
      </div>

      <div class="detail-item">
        <div class="detail-label">Status</div>
        <div class="detail-value">
          @if($room->status == 'available')
            <span class="status-badge status-available">Kosong</span>
          @elseif($room->status == 'occupied')
            <span class="status-badge status-occupied">Terisi</span>
          @elseif($room->status == 'maintenance')
            <span class="status-badge status-maintenance">Maintenance</span>
          @else
            <span class="status-badge">{{ ucfirst($room->status) }}</span>
          @endif
        </div>
      </div>

      <div class="detail-item">
        <div class="detail-label">Kapasitas</div>
        <div class="detail-value">
          {{ $room->capacity }} tempat tidur
          <div class="capacity-bar">
            <div class="capacity-fill" style="width: {{ ($room->occupied / $room->capacity) * 100 }}%"></div>
          </div>
          <small>{{ $room->occupied }} dari {{ $room->capacity }} terisi ({{ round(($room->occupied / $room->capacity) * 100, 1) }}%)</small>
        </div>
      </div>

      <div class="detail-item">
        <div class="detail-label">Terisi</div>
        <div class="detail-value">{{ $room->occupied }} tempat tidur</div>
      </div>
    </div>

    <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">
      <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Ruangan
    </a>
  </div>
</body>
</html>
