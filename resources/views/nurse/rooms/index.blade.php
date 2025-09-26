<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Ruangan - MediCare</title>
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

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
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

    .btn-info {
      background: #dbeafe;
      color: var(--primary);
      border: 1px solid #dbeafe;
    }

    .btn-info:hover {
      background: #bfdbfe;
      transform: translateY(-2px);
    }

    .btn-warning {
      background: #fef3c7;
      color: var(--warning);
      border: 1px solid #fef3c7;
    }

    .btn-warning:hover {
      background: #fde68a;
      transform: translateY(-2px);
    }

    .btn-danger {
      background: #fee2e2;
      color: var(--danger);
      border: 1px solid #fee2e2;
    }

    .btn-danger:hover {
      background: #fecaca;
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

    .alert-success {
      background-color: #f0fdf4;
      color: #166534;
      padding: 16px 20px;
      border-radius: 10px;
      margin-bottom: 24px;
      border: 1px solid #bbf7d0;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .alert-success i {
      color: #16a34a;
    }

    .action-group {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 24px;
      gap: 8px;
      flex-wrap: wrap;
    }

    .pagination a, .pagination span {
      padding: 8px 16px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s;
      font-size: 14px;
    }

    .pagination a {
      color: var(--primary);
      border: 1px solid var(--border);
    }

    .pagination a:hover {
      background-color: #eff6ff;
      border-color: var(--primary);
    }

    .pagination .current {
      background: var(--gradient);
      color: white;
      border: 1px solid var(--primary);
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

      .header-actions {
        width: 100%;
        justify-content: flex-start;
      }

      th, td {
        padding: 12px 16px;
      }

      .action-group {
        flex-direction: column;
        align-items: stretch;
      }

      .btn {
        width: 100%;
        justify-content: center;
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

      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      .room-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }

      .capacity-bar {
        width: 80px;
      }
    }

    @media (max-width: 480px) {
      th, td {
        padding: 8px 10px;
      }

      .badge {
        padding: 6px 12px;
        font-size: 11px;
      }

      .room-icon {
        width: 32px;
        height: 32px;
        font-size: 14px;
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
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-bed"></i>
          <h2>Daftar Ruangan</h2>
        </div>
        <div class="header-actions">
          <a href="{{ route('nurse.rooms.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Tambah Ruangan
          </a>
          <a href="{{ route('nurse.dashboard') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
          </a>
        </div>
      </div>

      @if(session('success'))
        <div class="alert-success">
          <i class="fa-solid fa-circle-check"></i>
          {{ session('success') }}
        </div>
      @endif

      @if($rooms->isEmpty())
        <div class="empty-state">
          <i class="fa-solid fa-bed"></i>
          <h3>Belum ada data ruangan</h3>
          <p>Silakan tambah ruangan baru untuk memulai manajemen</p>
        </div>
      @else
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Ruangan</th>
                <th>Status</th>
                <th>Kapasitas</th>
                <th>Terisi</th>
                <th>Ketersediaan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rooms as $room)
                @php
                  $occupancyRate = $room->capacity > 0 ? ($room->occupied / $room->capacity) * 100 : 0;
                @endphp
                <tr>
                  <td>
                    <div class="room-info">
                      <div class="room-icon">
                        <i class="fa-solid fa-door-closed"></i>
                      </div>
                      <div>
                        <div style="font-weight: 600;">{{ $room->name }}</div>
                        <div style="font-size: 12px; color: var(--text-light);">No. {{ $room->room_number ?? 'N/A' }}</div>
                      </div>
                    </div>
                  </td>
                  <td>
                    @if($room->status == 'available')
                      <span class="badge badge-success">
                        <i class="fa-solid fa-circle-check"></i> Tersedia
                      </span>
                    @elseif($room->status == 'occupied')
                      <span class="badge badge-danger">
                        <i class="fa-solid fa-circle-xmark"></i> Penuh
                      </span>
                    @else
                      <span class="badge badge-warning">
                        <i class="fa-solid fa-triangle-exclamation"></i> Maintenance
                      </span>
                    @endif
                  </td>
                  <td>
                    <div style="font-weight: 600;">{{ $room->capacity }}</div>
                    <div style="font-size: 12px; color: var(--text-light);">Pasien</div>
                  </td>
                  <td>
                    <div style="font-weight: 600; color: {{ $room->occupied > 0 ? 'var(--danger)' : 'var(--success)' }};">
                      {{ $room->occupied }}
                    </div>
                    <div style="font-size: 12px; color: var(--text-light);">Terisi</div>
                  </td>
                  <td>
                    <div class="capacity-bar">
                      <div class="capacity-fill" style="width: {{ $occupancyRate }}%;"></div>
                    </div>
                    <div class="capacity-text">{{ number_format($occupancyRate, 0) }}%</div>
                  </td>
                  <td>
                    <div class="action-group">
                      <a href="{{ route('nurse.rooms.show', $room->id) }}" class="btn btn-info btn-sm">
                        <i class="fa-solid fa-eye"></i> Detail
                      </a>
                      <a href="{{ route('nurse.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen"></i> Edit
                      </a>
                      <form action="{{ route('nurse.rooms.destroy', $room->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">
                          <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        @if(method_exists($rooms,'links'))
          <div class="pagination">
            {{ $rooms->links() }}
          </div>
        @endif
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
          this.style.transform = 'translateX(5px)';
        });
      });

      // Enhanced delete confirmation
      const deleteForms = document.querySelectorAll('form[method="POST"]');
      deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
          if (!confirm('Apakah Anda yakin ingin menghapus ruangan ini? Tindakan ini tidak dapat dibatalkan.')) {
            e.preventDefault();
          }
        });
      });
    });
  </script>
</body>
</html>
