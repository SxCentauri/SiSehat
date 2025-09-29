<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cek Ruangan - MediCare</title>
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

    .header-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
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

    .btn-sm {
      padding: 10px 16px;
      font-size: 13px;
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
      min-width: 700px; /* Menambahkan lebar minimum untuk tabel */
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
      transform: translateX(5px);
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

    .room-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .room-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 16px;
      flex-shrink: 0;
    }

    .capacity-bar {
      width: 100px;
      height: 8px;
      background: #f1f5f9;
      border-radius: 10px;
      overflow: hidden;
      margin: 4px 0;
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
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: var(--text-light);
    }

    .empty-state i {
      font-size: 64px;
      margin-bottom: 16px;
      color: #d1d5db;
    }

    .empty-state h3 {
      font-size: 18px;
      margin-bottom: 8px;
      color: var(--text);
    }

    .empty-state p {
      font-size: 14px;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      margin-bottom: 24px;
    }

    .stat-item {
      background: #f8fafc;
      padding: 16px;
      border-radius: 10px;
      border: 1px solid var(--border);
      text-align: center;
    }

    .stat-number {
      font-size: 24px;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 4px;
    }

    .stat-label {
      font-size: 12px;
      color: var(--text-light);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    /* Responsive Styles - PERBAIKAN UTAMA */
    @media (max-width: 1200px) {
      .container {
        max-width: 100%;
        padding: 0 20px 30px;
      }
    }

    @media (max-width: 1024px) {
      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      
      .header {
        flex-direction: row;
        justify-content: space-between;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 0 15px 25px;
      }

      .card {
        padding: 24px;
      }

      .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }

      .header-content {
        flex-direction: row;
        text-align: left;
        gap: 12px;
      }

      .header h2 {
        font-size: 22px;
      }

      .header-actions {
        width: 100%;
        justify-content: flex-start;
      }

      th, td {
        padding: 14px 16px;
      }

      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
      }
      
      .stat-item {
        padding: 14px;
      }
      
      .stat-number {
        font-size: 20px;
      }
      
      .empty-state {
        padding: 40px 15px;
      }
      
      .empty-state i {
        font-size: 48px;
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

      .header-actions {
        flex-direction: column;
        width: 100%;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }

      th, td {
        padding: 12px 14px;
        font-size: 14px;
      }

      .stats-grid {
        grid-template-columns: 1fr;
        gap: 10px;
      }

      .room-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }

      .capacity-bar {
        width: 80px;
      }
      
      .badge {
        padding: 6px 12px;
        font-size: 11px;
      }
      
      .room-icon {
        width: 36px;
        height: 36px;
        font-size: 14px;
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
        padding: 16px;
        border-radius: 12px;
      }
      
      .header h2 {
        font-size: 18px;
      }
      
      .header-content i {
        padding: 10px;
        min-width: 42px;
        font-size: 16px;
      }
      
      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }
      
      .badge {
        padding: 5px 10px;
        font-size: 10px;
      }

      .room-icon {
        width: 32px;
        height: 32px;
        font-size: 13px;
      }
      
      .capacity-bar {
        width: 70px;
      }
      
      .stat-item {
        padding: 12px;
      }
      
      .stat-number {
        font-size: 18px;
      }
      
      .stat-label {
        font-size: 11px;
      }
      
      .empty-state {
        padding: 30px 10px;
      }
      
      .empty-state i {
        font-size: 40px;
      }
      
      .empty-state h3 {
        font-size: 16px;
      }
      
      .empty-state p {
        font-size: 13px;
      }
    }

    @media (max-width: 360px) {
      .container {
        padding: 0 8px 12px;
      }
      
      .card {
        padding: 14px;
      }
      
      .header h2 {
        font-size: 16px;
      }
      
      .header-content i {
        padding: 8px;
        min-width: 38px;
        font-size: 14px;
      }
      
      th, td {
        padding: 8px 10px;
        font-size: 12px;
      }
      
      .room-info {
        gap: 6px;
      }
      
      .room-icon {
        width: 30px;
        height: 30px;
        font-size: 12px;
      }
      
      .capacity-bar {
        width: 60px;
        height: 6px;
      }
      
      .capacity-text {
        font-size: 11px;
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

    tbody tr {
      animation: fadeIn 0.3s ease-out;
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
    
    /* Perbaikan untuk tabel di perangkat kecil */
    .table-responsive {
      position: relative;
    }
    
    .table-scroll-indicator {
      display: none;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0,0,0,0.7);
      color: white;
      padding: 8px;
      border-radius: 50%;
      font-size: 14px;
      z-index: 10;
    }
    
    @media (max-width: 768px) {
      .table-scroll-indicator {
        display: block;
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
          <i class="fa-solid fa-bed-pulse"></i>
          <h2>Ketersediaan Ruangan</h2>
        </div>
        <div class="header-actions">
          <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary btn-sm">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
          </a>
        </div>
      </div>

      <!-- Statistics Overview -->
      @php
        $totalRooms = $rooms->count();
        $availableRooms = $rooms->where('status', 'available')->count();
        $occupiedRooms = $rooms->where('status', 'occupied')->count();
        $maintenanceRooms = $rooms->where('status', 'maintenance')->count();
      @endphp

      <div class="stats-grid">
        <div class="stat-item">
          <div class="stat-number">{{ $totalRooms }}</div>
          <div class="stat-label">Total Ruangan</div>
        </div>
        <div class="stat-item">
          <div class="stat-number" style="color: var(--success);">{{ $availableRooms }}</div>
          <div class="stat-label">Tersedia</div>
        </div>
        <div class="stat-item">
          <div class="stat-number" style="color: var(--danger);">{{ $occupiedRooms }}</div>
          <div class="stat-label">Terisi</div>
        </div>
        <div class="stat-item">
          <div class="stat-number" style="color: var(--warning);">{{ $maintenanceRooms }}</div>
          <div class="stat-label">Maintenance</div>
        </div>
      </div>

      @if($rooms->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-bed"></i>
          <h3>Data ruangan tidak tersedia</h3>
          <p>Silakan hubungi administrator untuk informasi lebih lanjut</p>
        </div>
      @else
        <div class="table-container">
          <div class="table-responsive">
            <div class="table-scroll-indicator">
              <i class="fa-solid fa-arrow-left-right"></i>
            </div>
            <table>
              <thead>
                <tr>
                  <th>Ruangan</th>
                  <th>Status</th>
                  <th>Kapasitas</th>
                  <th>Terisi</th>
                  <th>Ketersediaan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rooms as $r)
                  @php
                    $occupancyRate = $r->capacity > 0 ? ($r->occupied / $r->capacity) * 100 : 0;
                  @endphp
                  <tr>
                    <td>
                      <div class="room-info">
                        <div class="room-icon">
                          <i class="fa-solid fa-bed"></i>
                        </div>
                        <div>
                          <div style="font-weight: 600;">{{ $r->name }}</div>
                          <div style="font-size: 12px; color: var(--text-light);">No. {{ $r->room_number ?? 'N/A' }}</div>
                        </div>
                      </div>
                    </td>
                    <td>
                      @if($r->status == 'available')
                        <span class="badge badge-success">
                          <i class="fa-solid fa-circle-check"></i> Tersedia
                        </span>
                      @elseif($r->status == 'occupied')
                        <span class="badge badge-danger">
                          <i class="fa-solid fa-circle-xmark"></i> Terisi
                        </span>
                      @else
                        <span class="badge badge-warning">
                          <i class="fa-solid fa-triangle-exclamation"></i> Maintenance
                        </span>
                      @endif
                    </td>
                    <td>
                      <div style="font-weight: 600;">{{ $r->capacity }}</div>
                      <div style="font-size: 12px; color: var(--text-light);">Pasien</div>
                    </td>
                    <td>
                      <div style="font-weight: 600; color: {{ $r->occupied > 0 ? 'var(--danger)' : 'var(--success)' }};">
                        {{ $r->occupied }}
                      </div>
                      <div style="font-size: 12px; color: var(--text-light);">Terisi</div>
                    </td>
                    <td>
                      <div class="capacity-bar">
                        <div class="capacity-fill" style="width: {{ $occupancyRate }}%;"></div>
                      </div>
                      <div class="capacity-text">{{ number_format($occupancyRate, 0) }}%</div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endif
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to capacity bars
      const capacityBars = document.querySelectorAll('.capacity-fill');
      capacityBars.forEach(bar => {
        const originalWidth = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
          bar.style.width = originalWidth;
        }, 300);
      });

      // Add hover effects to table rows
      const tableRows = document.querySelectorAll('tbody tr');
      tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(8px)';
        });
        row.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });

      // Add click effect to room items
      const roomItems = document.querySelectorAll('.room-info');
      roomItems.forEach(item => {
        item.addEventListener('click', function() {
          this.style.transform = 'scale(0.98)';
          setTimeout(() => {
            this.style.transform = 'scale(1)';
          }, 150);
        });
      });
      
      // Hide scroll indicator after user starts scrolling
      const tableContainer = document.querySelector('.table-container');
      const scrollIndicator = document.querySelector('.table-scroll-indicator');
      
      if (tableContainer && scrollIndicator) {
        tableContainer.addEventListener('scroll', function() {
          scrollIndicator.style.opacity = '0';
          setTimeout(() => {
            scrollIndicator.style.display = 'none';
          }, 300);
        });
      }
    });
  </script>
</body>
</html>