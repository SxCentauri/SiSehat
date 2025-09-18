<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Perawat - MediCare</title>
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
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 100px 20px 40px;
    }

    .card {
      background: #fff;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 24px;
      border: 1px solid rgba(96,165,250,0.1);
    }

    .section-title {
      display:flex;
      align-items:center;
      gap:14px;
      font-size:22px;
      font-weight:700;
      margin-bottom:25px;
    }

    .section-title i {
      color: var(--primary);
      background:#e0f2fe;
      padding:12px;
      border-radius:12px;
      min-width: 46px;
      text-align: center;
    }

    .btn {
      padding:10px 18px;
      border-radius:12px;
      font-weight:600;
      display:inline-flex;
      align-items:center;
      gap:8px;
      text-decoration:none;
      border:none;
      cursor:pointer;
      transition:.3s;
      font-size: 14px;
    }

    .btn-primary {
      background: var(--gradient);
      color:#fff;
      box-shadow:0 8px 20px rgba(37,99,235,.2);
    }

    .btn-primary:hover {
      transform:translateY(-2px);
    }

    .btn-warning {
      background:#fde68a;
      color:#92400e;
    }

    .btn-danger {
      background:#fca5a5;
      color:#991b1b;
    }

    .btn-info {
      background:#bae6fd;
      color:#075985;
    }

    .btn-secondary {
      background:#e5e7eb;
      color:#1f2937;
    }

    .btn-secondary:hover {
      background:#d1d5db;
    }

    .table-container {
      overflow-x:auto;
      border-radius:var(--radius);
      box-shadow:0 10px 30px rgba(0,0,0,0.05);
      margin: 20px 0;
      -webkit-overflow-scrolling: touch;
    }

    table {
      width:100%;
      border-collapse:collapse;
      min-width: 600px;
    }

    th {
      background:#eff6ff;
      color:var(--primary);
      padding:14px 12px;
      text-align:left;
      font-size:14px;
      text-transform:uppercase;
      white-space: nowrap;
    }

    td {
      padding:14px 12px;
      border-bottom:1px solid #f1f5f9;
      font-size:15px;
    }

    .badge {
      padding:6px 10px;
      border-radius:8px;
      font-weight:600;
      font-size:13px;
      display: inline-block;
      text-align: center;
    }

    .bg-success {
      background:#bbf7d0;
      color:#166534;
    }

    .bg-warning {
      background:#fde68a;
      color:#92400e;
    }

    .bg-primary {
      background:#e0f2fe;
      color:#075985;
    }

    .empty {
      text-align:center;
      color:#9ca3af;
      padding:50px 20px;
    }

    .alert-success {
      background: #dcfce7;
      color: #166534;
      border-radius: 12px;
      padding: 12px 16px;
      margin-bottom: 20px;
      border: 1px solid #bbf7d0;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .btn-sm {
      padding: 8px 12px;
      font-size: 13px;
    }

    .action-group {
      display: flex;
      gap: 6px;
      flex-wrap: wrap;
    }

    .button-group {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    /* Pagination Styles */
    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 25px;
      flex-wrap: wrap;
      gap: 8px;
    }

    .pagination .page-item {
      display: inline-flex;
    }

    .pagination .page-link {
      padding: 8px 14px;
      border-radius: 8px;
      background: white;
      color: #4b5563;
      text-decoration: none;
      font-weight: 600;
      border: 1px solid #e5e7eb;
      transition: all 0.2s;
    }

    .pagination .page-item.active .page-link {
      background: var(--gradient);
      color: white;
      border-color: var(--primary);
    }

    .pagination .page-link:hover {
      background: #eff6ff;
      color: var(--primary);
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
      .container {
        padding: 90px 15px 30px;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 80px 12px 20px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .section-title {
        font-size: 20px;
        flex-direction: column;
        text-align: center;
        gap: 10px;
        margin-bottom: 20px;
      }

      .section-title i {
        width: 42px;
        height: 42px;
        padding: 10px;
      }

      .button-group {
        flex-direction: column;
        align-items: stretch;
      }

      .button-group .btn {
        justify-content: center;
        text-align: center;
      }

      th, td {
        padding: 12px 10px;
        font-size: 14px;
      }

      .action-group {
        flex-direction: column;
        align-items: stretch;
      }

      .action-group .btn {
        justify-content: center;
      }
    }

    @media (max-width: 640px) {
      .container {
        padding: 70px 10px 15px;
      }

      .section-title {
        font-size: 18px;
      }

      .alert-success {
        padding: 10px 14px;
        font-size: 14px;
      }

      /* Sembunyikan kolom tertentu pada layar kecil */
      .table-container table th:nth-child(1),
      .table-container table td:nth-child(1) {
        display: none;
      }
    }

    @media (max-width: 480px) {
      .section-title {
        font-size: 16px;
      }

      .btn {
        padding: 8px 14px;
        font-size: 13px;
      }

      /* Sembunyikan kolom ID pada layar sangat kecil */
      .table-container table th:nth-child(1),
      .table-container table td:nth-child(1) {
        display: none;
      }

      .pagination .page-link {
        padding: 6px 10px;
        font-size: 14px;
      }
    }

    /* Tambahan untuk tabel responsif */
    .mobile-label {
      display: none;
      font-weight: 700;
      margin-right: 8px;
      color: #4b5563;
    }

    @media (max-width: 640px) {
      /* Ubah tabel menjadi kartu pada tampilan mobile */
      .table-container {
        overflow-x: visible;
        box-shadow: none;
      }

      table, thead, tbody, th, td, tr {
        display: block;
      }

      thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }

      tr {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        margin-bottom: 15px;
        padding: 15px;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
      }

      td {
        border: none;
        border-bottom: 1px solid #f1f5f9;
        position: relative;
        padding-left: 45%;
        padding-right: 15px;
        display: flex;
        align-items: center;
        min-height: 40px;
      }

      td:last-child {
        border-bottom: 0;
      }

      td:before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 40%;
        padding-right: 15px;
        white-space: nowrap;
        font-weight: 600;
        color: #4b5563;
      }

      .mobile-label {
        display: inline;
      }

      .action-group {
        justify-content: center;
        margin-top: 10px;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')
  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-calendar-days"></i>
        <h3>Jadwal Perawat</h3>
      </div>

      <div class="button-group">
        <a href="{{ route('nurse.schedules.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Tambah Jadwal
        </a>
        <a href="{{ route('nurse.dashboard') }}" class="btn btn-secondary">
          <i class="fa-solid fa-arrow-left"></i> Kembali Dashboard
        </a>
      </div>

      @if(session('success'))
        <div class="alert-success">
          <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
      @endif

      @if($schedules->isEmpty())
        <div class="empty">
          <i class="fa-regular fa-calendar-xmark fa-2x" style="margin-bottom: 15px;"></i>
          <p>Belum ada jadwal</p>
        </div>
      @else
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tugas</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($schedules as $schedule)
                <tr>
                  <td data-label="ID">{{ $schedule->id }}</td>
                  <td data-label="Shift">
                    <span class="mobile-label">Nama :</span>
                    <span class="badge">
                      {{ $schedule->nurse_name }}
                    </span>
                  </td>
                  <td data-label="Tugas">
                    <span class="mobile-label">Tugas:</span>{{ $schedule->task }}
                  </td>
                  <td data-label="Tanggal">
                    <span class="mobile-label">Tanggal:</span>{{ \Carbon\Carbon::parse($schedule->schedule_date)->format('d M Y') }}
                  </td>
                  <td data-label="Aksi">
                    <span class="mobile-label">Aksi:</span>
                    <div class="action-group">
                      <a href="{{ route('nurse.schedules.show', $schedule->id) }}" class="btn btn-info btn-sm" title="Detail">
                        <i class="fa-solid fa-eye"></i>
                        <span class="mobile-label">Detail</span>
                      </a>
                      <a href="{{ route('nurse.schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm" title="Edit">
                        <i class="fa-solid fa-pen"></i>
                        <span class="mobile-label">Edit</span>
                      </a>
                      <form action="{{ route('nurse.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Yakin hapus jadwal ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                          <i class="fa-solid fa-trash"></i>
                          <span class="mobile-label">Hapus</span>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="pagination">
          {{ $schedules->links() }}
        </div>
      @endif
    </div>
  </div>

  <script>
    // Konfirmasi sebelum menghapus
    document.querySelectorAll('form').forEach(form => {
      form.addEventListener('submit', function(e) {
        if (!confirm('Yakin hapus jadwal ini?')) {
          e.preventDefault();
        }
      });
    });

    // Tambahkan label data untuk tampilan mobile
    document.addEventListener('DOMContentLoaded', function() {
      if (window.innerWidth <= 640) {
        const headers = [];
        document.querySelectorAll('thead th').forEach(header => {
          headers.push(header.textContent);
        });

        document.querySelectorAll('tbody tr').forEach(row => {
          const cells = row.querySelectorAll('td');
          cells.forEach((cell, index) => {
            cell.setAttribute('data-label', headers[index]);
          });
        });
      }
    });
  </script>
</body>
</html>
