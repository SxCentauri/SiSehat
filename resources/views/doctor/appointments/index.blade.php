<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Booking - MediCare</title>
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
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 100px 20px 40px;
    }

    .card {
      background: var(--card-bg);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px;
      border: 1px solid var(--border);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 30px;
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
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border);
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
      flex-shrink: 0;
    }

    .header h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--text);
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
      background: var(--gradient);
      color: #fff;
      box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
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

    .badge-completed {
      background-color: #faf5ff;
      color: var(--completed);
      border-color: #e9d5ff;
    }

    .actions {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
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
      margin-bottom: 20px;
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

    .flash {
      padding: 16px 20px;
      background: #f0fdf4;
      color: var(--success);
      border-radius: var(--radius);
      margin-bottom: 24px;
      font-weight: 500;
      border: 1px solid #bbf7d0;
      display: flex;
      align-items: center;
      gap: 10px;
      animation: fadeIn 0.5s ease-out;
    }

    .flash i {
      font-size: 18px;
    }

    .data-count-info {
      text-align: center;
      margin-top: 20px;
      color: var(--text-light);
      font-size: 14px;
      font-weight: 500;
      padding: 12px;
      background: #f8fafc;
      border-radius: var(--radius);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 90px 15px 30px;
      }

      .card {
        padding: 24px;
      }

      .header {
        flex-direction: column;
        align-items: stretch;
        gap: 16px;
      }

      .header-content {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
      }

      .header h2 {
        font-size: 22px;
      }

      th, td {
        padding: 12px 16px;
      }

      .table-container {
        font-size: 14px;
      }
    }

    @media (max-width: 640px) {
      .container {
        padding: 80px 12px 20px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .header {
        gap: 12px;
      }

      .header-content {
        flex-direction: column;
        gap: 10px;
      }

      .header h2 {
        font-size: 20px;
      }

      .header i {
        padding: 10px;
        min-width: 42px;
        font-size: 16px;
      }

      .empty-state {
        padding: 40px 15px;
      }

      .empty-state i {
        font-size: 48px;
      }

      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      /* Sembunyikan kolom tertentu di mobile */
      th:nth-child(5),
      td:nth-child(5) {
        display: none;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
    }

    @media (max-width: 480px) {
      .header-content {
        gap: 8px;
      }

      .header h2 {
        font-size: 20px;
      }

      .header i {
        padding: 8px;
        min-width: 38px;
        font-size: 14px;
      }

      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      /* Sembunyikan lebih banyak kolom di mobile kecil */
      th:nth-child(3),
      td:nth-child(3) {
        display: none;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
    }

    @media (max-width: 360px) {
      .header-content {
        flex-direction: column;
        text-align: center;
      }

      .header h2 {
        font-size: 17px;
        text-align: center;
      }

      .header i {
        align-self: center;
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

  <div class="container">
    @if(session('ok'))
      <div class="flash">
        <i class="fa-solid fa-circle-check"></i> {{ session('ok') }}
      </div>
    @endif

    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-list-check"></i>
          <h2>Daftar Booking</h2>
        </div>
        <div class="header-actions">
          <a href="{{ route('doctor.dashboard') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
          </a>
        </div>
      </div>

      @if($appointments->isEmpty())
        <div class="empty-state">
          <i class="fa-regular fa-calendar-xmark"></i>
          <h3>Belum ada booking</h3>
          <p>Belum ada janji temu yang perlu ditangani saat ini.</p>
        </div>
      @else
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Pasien</th>
                <th>Status</th>
                <th>Alasan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($appointments as $a)
                <tr>
                  <td>{{ \Carbon\Carbon::parse($a->date)->format('d M Y') }}</td>
                  <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
                  <td>{{ $a->patient->name ?? 'Pasien #'.$a->patient_id }}</td>
                  <td>
                    @if($a->status == 'approved')
                      <span class="badge badge-success">
                        <i class="fa-solid fa-circle-check"></i> Disetujui
                      </span>
                    @elseif($a->status == 'pending')
                      <span class="badge badge-warning">
                        <i class="fa-solid fa-clock"></i> Menunggu
                      </span>
                    @elseif($a->status == 'rejected' || $a->status == 'canceled')
                      <span class="badge badge-danger">
                        <i class="fa-solid fa-circle-xmark"></i> {{ ucfirst($a->status) }}
                      </span>
                    @elseif($a->status == 'completed')
                      <span class="badge badge-completed">
                        <i class="fa-solid fa-flag-checkered"></i> Selesai
                      </span>
                    @endif
                  </td>
                  <td>{{ Str::limit($a->reason, 30) }}</td>
                  <td>
                    <div class="actions">
                      @if($a->status === 'pending')
                        <form method="POST" action="{{ route('doctor.appointments.approve', $a) }}" style="display: contents;">
                          @csrf
                          <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fa-solid fa-check"></i> Approve
                          </button>
                        </form>
                        <form method="POST" action="{{ route('doctor.appointments.reject', $a) }}" style="display: contents;">
                          @csrf
                          <button class="btn btn-secondary btn-sm" type="submit">
                            <i class="fa-solid fa-xmark"></i> Tolak
                          </button>
                        </form>
                      @endif

                      @if($a->status === 'approved')
                        <form method="POST" action="{{ route('doctor.appointments.complete', $a) }}" style="display: contents;">
                          @csrf
                          <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fa-solid fa-flag-checkered"></i> Selesai
                          </button>
                        </form>
                        <a class="btn btn-secondary btn-sm" href="{{ route('doctor.records.create', $a) }}">
                          <i class="fa-solid fa-notes-medical"></i> Rekam Medis
                        </a>
                      @endif

                      @if(in_array($a->status, ['completed', 'rejected', 'canceled']))
                        <span style="font-size: 13px; color: var(--text-light);">Tidak ada aksi</span>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="pagination">
          {{ $appointments->links() }}
        </div>

        <!-- Info jumlah data -->
        <div class="data-count-info">
          Menampilkan {{ $appointments->count() }} dari {{ $appointments->total() }} booking
        </div>
      @endif
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to table rows
      const tableRows = document.querySelectorAll('tbody tr');
      tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
          this.style.transform = 'translateX(5px)';
        });
        row.addEventListener('mouseleave', function() {
          this.style.transform = 'translateX(0)';
        });
      });

      // Add click effect to buttons
      const buttons = document.querySelectorAll('.btn');
      buttons.forEach(button => {
        button.addEventListener('click', function() {
          this.style.transform = 'scale(0.98)';
          setTimeout(() => {
            this.style.transform = '';
          }, 150);
        });
      });
    });
  </script>
</body>
</html>
