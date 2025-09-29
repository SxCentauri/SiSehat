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
      --primary-light: #3b82f6;
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
      --shadow-hover: 0 15px 35px rgba(0, 0, 0, 0.1);
      --gradient: linear-gradient(135deg, var(--primary), var(--primary-dark));
      --gradient-light: linear-gradient(135deg, var(--primary-light), var(--primary));
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
      max-width: 900px;
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
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: var(--gradient);
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-hover);
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

    .header-icon {
      color: var(--primary);
      background: #e0f2fe;
      padding: 14px;
      border-radius: 14px;
      min-width: 50px;
      text-align: center;
      font-size: 20px;
      box-shadow: 0 4px 10px rgba(37, 99, 235, 0.1);
    }

    .header h1 {
      font-size: 28px;
      font-weight: 800;
      color: var(--text);
      margin: 0;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
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
      flex-shrink: 0;
    }

    .btn-secondary {
      background: #f1f5f9;
      color: var(--text);
      border: 1px solid var(--border);
    }

    .btn-secondary:hover {
      background: #e2e8f0;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
      background: var(--gradient);
      color: white;
    }

    .btn-primary:hover {
      background: var(--gradient-light);
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(37, 99, 235, 0.2);
    }

    .info-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
    }

    .info-section {
      background: #f8fafc;
      padding: 24px;
      border-radius: 12px;
      border: 1px solid var(--border);
      transition: transform 0.3s ease;
    }

    .info-section:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .info-section h3 {
      font-size: 18px;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      padding-bottom: 12px;
      border-bottom: 2px solid #e0f2fe;
    }

    .info-section h3 i {
      font-size: 16px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .info-item {
      margin-bottom: 18px;
      padding-bottom: 18px;
      border-bottom: 1px solid var(--border);
      transition: all 0.3s ease;
    }

    .info-item:hover {
      background: rgba(255, 255, 255, 0.7);
      border-radius: 8px;
      padding: 12px;
      margin: 0 -12px 18px;
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
      margin-bottom: 6px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-label i {
      font-size: 14px;
      color: var(--primary);
      width: 16px;
      text-align: center;
    }

    .info-value {
      font-size: 16px;
      color: var(--text);
      line-height: 1.5;
      font-weight: 500;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 600;
      gap: 6px;
      border: 1px solid transparent;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
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
      height: 10px;
      background: #f1f5f9;
      border-radius: 10px;
      overflow: hidden;
      margin: 12px 0 8px;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .capacity-fill {
      height: 100%;
      background: var(--gradient);
      border-radius: 10px;
      transition: width 0.8s ease;
      position: relative;
    }

    .capacity-fill::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      background: linear-gradient(90deg,
        rgba(255,255,255,0.1) 0%,
        rgba(255,255,255,0.3) 50%,
        rgba(255,255,255,0.1) 100%);
      animation: shimmer 2s infinite;
    }

    .capacity-text {
      font-size: 13px;
      color: var(--text-light);
      font-weight: 600;
      display: flex;
      justify-content: space-between;
    }

    .meta-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 30px;
      padding-top: 20px;
      border-top: 1px solid var(--border);
      font-size: 14px;
      color: var(--text-light);
      background: #f8fafc;
      padding: 16px 20px;
      border-radius: 10px;
    }

    .meta-info div {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .meta-info i {
      color: var(--primary);
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

    @keyframes shimmer {
      0% {
        transform: translateX(-100%);
      }
      100% {
        transform: translateX(100%);
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

    /* Status indicator */
    .status-indicator {
      display: inline-block;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      margin-right: 6px;
    }

    .status-available {
      background-color: var(--success);
    }

    .status-occupied {
      background-color: var(--danger);
    }

    .status-maintenance {
      background-color: var(--warning);
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
        width: 100%;
      }

      .header h1 {
        font-size: 24px;
      }

      .info-grid {
        grid-template-columns: 1fr;
      }

      .info-section {
        padding: 20px;
      }

      .meta-info {
        flex-direction: column;
        gap: 10px;
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

      .header h1 {
        font-size: 22px;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }

      .header-content {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      .header-icon {
        min-width: 44px;
        padding: 12px;
        font-size: 18px;
      }

      .info-section h3 {
        font-size: 16px;
      }

      .info-label, .info-value {
        font-size: 14px;
      }

      .meta-info {
        font-size: 13px;
      }
    }

    @media (max-width: 480px) {
      body {
        padding-top: 60px;
      }

      .container {
        padding: 0 10px 15px;
      }

      .card {
        padding: 18px;
        border-radius: 12px;
      }

      .header h1 {
        font-size: 20px;
      }

      .header-content {
        flex-direction: column;
        gap: 10px;
      }

      .info-section {
        padding: 16px;
      }

      .info-item {
        margin-bottom: 14px;
        padding-bottom: 14px;
      }

      .badge {
        padding: 6px 12px;
        font-size: 12px;
      }

      .btn {
        padding: 10px 16px;
        font-size: 13px;
        margin-bottom: 10px;
      }

      .meta-info {
        flex-direction: column;
        gap: 8px;
        font-size: 12px;
        padding: 14px;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-bed header-icon"></i>
          <h1>Detail Ruangan</h1>
        </div>
        <div>
          <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
          </a>
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
                  <span class="status-indicator status-available"></span>
                  <i class="fa-solid fa-circle-check"></i> Tersedia
                </span>
              @elseif($room->status == 'occupied')
                <span class="badge badge-danger">
                  <span class="status-indicator status-occupied"></span>
                  <i class="fa-solid fa-circle-xmark"></i> Terisi
                </span>
              @else
                <span class="badge badge-warning">
                  <span class="status-indicator status-maintenance"></span>
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
                <span>{{ number_format($occupancyRate, 1) }}% terisi</span>
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
