<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Ruangan - MediCare</title>
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
      padding: 100px 20px 40px;
      line-height: 1.6;
    }

    .container {
      max-width: 1200px;
      margin: auto;
    }

    .card {
      background: #fff;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 28px;
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
    }

    .btn {
      padding:10px 16px;
      border-radius:12px;
      font-weight:600;
      display:inline-flex;
      align-items:center;
      gap:6px;
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

    .btn-sm {
      padding: 6px 10px;
      font-size: 13px;
    }

    .button-group {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      flex-wrap: wrap;
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
      vertical-align: middle;
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

    .bg-danger {
      background:#fecaca;
      color:#991b1b;
    }

    .bg-warning {
      background:#fde68a;
      color:#92400e;
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

    .action-group {
      display: flex;
      gap: 6px;
      flex-wrap: wrap;
    }

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
      body {
        padding: 90px 15px 30px;
      }
    }

    @media (max-width: 768px) {
      body {
        padding: 80px 12px 20px;
      }

      .card {
        padding: 24px;
        border-radius: 14px;
      }

      .section-title {
        font-size: 20px;
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
      body {
        padding: 70px 10px 15px;
      }

      .section-title {
        font-size: 18px;
        flex-direction: column;
        text-align: center;
        gap: 10px;
      }

      .section-title i {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .alert-success {
        padding: 10px 14px;
        font-size: 14px;
      }

      /* Sembunyikan kolom ID pada layar kecil */
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
        padding: 8px 12px;
        font-size: 13px;
      }

      /* Sembunyikan kolom Kapasitas dan Terisi pada layar sangat kecil */
      .table-container table th:nth-child(4),
      .table-container table td:nth-child(4),
      .table-container table th:nth-child(5),
      .table-container table td:nth-child(5) {
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
        justify-content: center;
        padding-left: 15px;
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
        flex-direction: row;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-bed"></i>
        <h3>Daftar Ruangan</h3>
      </div>

      <div class="button-group">
        <a href="{{ route('nurse.rooms.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Tambah Ruangan
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

      @if($rooms->isEmpty())
        <div class="empty">
          <i class="fa-regular fa-hospital fa-2x"></i>
          <p>Belum ada data ruangan</p>
        </div>
      @else
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Nama Ruangan</th>
                <th>Status</th>
                <th>Kapasitas</th>
                <th>Terisi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rooms as $room)
                <tr>
                  <td data-label="Nama Ruangan">
                    <span class="mobile-label">Nama:</span>{{ $room->name }}
                  </td>
                  <td data-label="Status">
                    <span class="mobile-label">Status:</span>
                    @if($room->status == 'available')
                      <span class="badge bg-success">Tersedia</span>
                    @elseif($room->status == 'occupied')
                      <span class="badge bg-danger">Penuh</span>
                    @else
                      <span class="badge bg-warning">Maintenance</span>
                    @endif
                  </td>
                  <td data-label="Kapasitas">
                    <span class="mobile-label">Kapasitas:</span>{{ $room->capacity }}
                  </td>
                  <td data-label="Terisi">
                    <span class="mobile-label">Terisi:</span>{{ $room->occupied }}
                  </td>
                  <td data-label="Aksi">
                    <span class="mobile-label">Aksi:</span>
                    <div class="action-group">
                      <a href="{{ route('nurse.rooms.show', $room->id) }}" class="btn btn-info btn-sm" title="Detail">
                        <i class="fa-solid fa-eye"></i>
                        <span class="mobile-label">Detail</span>
                      </a>
                      <a href="{{ route('nurse.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm" title="Edit">
                        <i class="fa-solid fa-pen"></i>
                        <span class="mobile-label">Edit</span>
                      </a>
                      <form action="{{ route('nurse.rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
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
          {{ $rooms->links() }}
        </div>
      @endif
    </div>
  </div>

  <script>
    // Konfirmasi sebelum menghapus
    document.querySelectorAll('form').forEach(form => {
      form.addEventListener('submit', function(e) {
        if (!confirm('Yakin hapus data ini?')) {
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
