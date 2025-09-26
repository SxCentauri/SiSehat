<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Ruangan - MediCare</title>
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
      --bg: #f8fafc;
      --card-bg: #ffffff;
      --text: #1f2937;
      --text-light: #6b7280;
      --border: #e5e7eb;
      --radius: 16px;
      --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
      --gradient: linear-gradient(135deg, var(--primary), var(--primary-dark));
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
      max-width: 800px;
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
      margin-bottom: 24px;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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

    .btn-secondary {
      background: #f1f5f9;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .btn-secondary:hover {
      background: #e2e8f0;
      transform: translateY(-2px);
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
    }

    .info-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 24px;
    }

    .info-section {
      background: #f8fafc;
      padding: 20px;
      border-radius: 12px;
      border: 1px solid var(--border);
    }

    .info-section h3 {
      font-size: 16px;
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-section h3 i {
      font-size: 14px;
    }

    .info-item {
      margin-bottom: 16px;
      padding-bottom: 16px;
      border-bottom: 1px solid var(--border);
    }

    .info-item:last-child {
      margin-bottom: 0;
      padding-bottom: 0;
      border-bottom: none;
    }

    .info-label {
      font-size: 14px;
      font-weight: 600;
      color: var(--text-light);
      margin-bottom: 4px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .info-label i {
      font-size: 12px;
      color: var(--primary);
    }

    .info-value {
      font-size: 15px;
      color: var(--text);
      line-height: 1.5;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      gap: 6px;
      border: 1px solid transparent;
    }

    .badge-success {
      background-color: #f0fdf4;
      color: var(--success);
      border-color: #bbf7d0;
    }

    .badge-warning {
      background-color: #fffbeb;
      color: var(--warning);
      border-color: #fef3c7;
    }

    .badge-danger {
      background-color: #fef2f2;
      color: var(--danger);
      border-color: #fecaca;
    }

    .capacity-bar {
      width: 100%;
      height: 8px;
      background: #f1f5f9;
      border-radius: 10px;
      overflow: hidden;
      margin: 8px 0;
    }

    .capacity-fill {
      height: 100%;
      background: var(--gradient);
      border-radius: 10px;
      transition: width 0.5s ease;
    }

    .capacity-text {
      font-size: 12px;
      color: var(--text-light);
      font-weight: 600;
      display: flex;
      justify-content: space-between;
    }

    .room-icon {
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

    .meta-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 24px;
      padding-top: 16px;
      border-top: 1px solid var(--border);
      font-size: 13px;
      color: var(--text-light);
    }

    /* Responsive Styles */
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

      .info-section {
        padding: 16px;
      }

      .meta-info {
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
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
    }

    /* Animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .card {
      animation: fadeIn 0.5s ease-out;
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-bed"></i>
          <h2>Detail Ruangan</h2>
        </div>
        <div>
          <a href="{{ route('nurse.rooms.edit', $room->id) }}" class="btn btn-primary">
            <i class="fa-solid fa-pen"></i> Edit Ruangan
          </a>
        </div>
      </div>

      <div class="info-grid">
        <div class="info-section">
          <h3><i class="fa-solid fa-info-circle"></i> Informasi Ruangan</h3>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-signature"></i>
              Nama Ruangan
            </div>
            <div class="info-value">{{ $room->name }}</div>
          </div>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-circle-check"></i>
              Status Ruangan
            </div>
            <div class="info-value">
              @if($room->status == 'available')
                <span class="badge badge-success">
                  <i class="fa-solid fa-circle-check"></i> Tersedia
                </span>
              @elseif($room->status == 'occupied')
                <span class="badge badge-danger">
                  <i class="fa-solid fa-circle-xmark"></i> Terisi
                </span>
              @else
                <span class="badge badge-warning">
                  <i class="fa-solid fa-triangle-exclamation"></i> Maintenance
                </span>
              @endif
            </div>
          </div>
        </div>

        <div class="info-section">
          <h3><i class="fa-solid fa-chart-bar"></i> Kapasitas & Okupansi</h3>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-users"></i>
              Kapasitas Maksimal
            </div>
            <div class="info-value">{{ $room->capacity }} tempat tidur</div>
          </div>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-user-injured"></i>
              Jumlah Terisi
            </div>
            <div class="info-value" style="color: {{ $room->occupied > 0 ? 'var(--danger)' : 'var(--success)' }}; font-weight: 600;">
              {{ $room->occupied }} tempat tidur
            </div>
          </div>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-chart-pie"></i>
              Tingkat Okupansi
            </div>
            <div class="info-value">
              @php
                $occupancyRate = $room->capacity > 0 ? ($room->occupied / $room->capacity) * 100 : 0;
              @endphp
              <div class="capacity-bar">
                <div class="capacity-fill" style="width: {{ $occupancyRate }}%;"></div>
              </div>
              <div class="capacity-text">
                <span>{{ number_format($occupancyRate, 1) }}%</span>
                <span>{{ $room->occupied }} / {{ $room->capacity }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="meta-info">
        <div>
          <i class="fa-solid fa-calendar"></i>
          Dibuat: {{ $room->created_at->format('d M Y H:i') }}
        </div>
        <div>
          <i class="fa-solid fa-clock"></i>
          Diperbarui: {{ $room->updated_at->format('d M Y H:i') }}
        </div>
      </div>
    </div>

    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
      <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Ruangan
      </a>
      <a href="{{ route('nurse.rooms.edit', $room->id) }}" class="btn btn-primary">
        <i class="fa-solid fa-pen"></i> Edit Ruangan
      </a>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to capacity bar
      const capacityBar = document.querySelector('.capacity-fill');
      const originalWidth = capacityBar.style.width;
      capacityBar.style.width = '0%';
      setTimeout(() => {
        capacityBar.style.width = originalWidth;
      }, 300);

      // Add animation to info sections
      const infoSections = document.querySelectorAll('.info-section');
      infoSections.forEach((section, index) => {
        section.style.animationDelay = `${index * 0.2}s`;
        section.style.animation = 'fadeIn 0.6s ease-out';
      });

      // Add hover effects to info items
      const infoItems = document.querySelectorAll('.info-item');
      infoItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(5px)';
        });
        item.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });
    });
  </script>
</body>
</html>
