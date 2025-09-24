<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Reminder Obat - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --secondary: #64748b;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --info: #3b82f6;
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
    }

    .header h1 {
      font-size: 28px;
      font-weight: 700;
      color: var(--text);
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

    .btn-sm {
      padding: 8px 16px;
      font-size: 13px;
    }

    .btn-warning {
      background: #fef3c7;
      color: #92400e;
      border: 1px solid #fde68a;
    }

    .btn-warning:hover {
      background: #fde68a;
      transform: translateY(-2px);
    }

    .btn-danger {
      background: #fef2f2;
      color: #991b1b;
      border: 1px solid #fecaca;
    }

    .btn-danger:hover {
      background: #fecaca;
      transform: translateY(-2px);
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

    .table-container {
      overflow-x: auto;
      border-radius: 10px;
      border: 1px solid var(--border);
      margin-top: 20px;
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

    .patient-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .patient-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 16px;
    }

    .patient-details {
      display: flex;
      flex-direction: column;
    }

    .patient-name {
      font-weight: 600;
      color: var(--text);
    }

    .patient-id {
      font-size: 12px;
      color: var(--text-light);
    }

    .medication-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .medication-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: #f0f9ff;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary);
      font-size: 14px;
    }

    .time-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      background: #f0fdf4;
      color: var(--success);
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      border: 1px solid #bbf7d0;
    }

    .status-badge {
      display: inline-flex;
      align-items: center;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      gap: 6px;
    }

    .status-active {
      background-color: #f0fdf4;
      color: var(--success);
      border: 1px solid #bbf7d0;
    }

    .status-inactive {
      background-color: #f1f5f9;
      color: var(--text-light);
      border: 1px solid var(--border);
    }

    .status-completed {
      background-color: #faf5ff;
      color: #8b5cf6;
      border: 1px solid #e9d5ff;
    }

    .status-pending {
      background-color: #fffbeb;
      color: var(--warning);
      border: 1px solid #fed7aa;
    }

    .action-group {
      display: flex;
      gap: 8px;
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
        padding: 90px 15px 30px;
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

      .header h1 {
        font-size: 24px;
      }

      th, td {
        padding: 12px 16px;
      }

      .table-container {
        font-size: 14px;
      }

      .patient-info {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
      }

      .patient-avatar {
        width: 32px;
        height: 32px;
        font-size: 14px;
      }

      .action-group {
        flex-direction: column;
        align-items: stretch;
      }

      .action-group .btn {
        justify-content: center;
        text-align: center;
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

      .header h1 {
        font-size: 22px;
      }

      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      .empty-state {
        padding: 40px 15px;
      }

      .empty-state i {
        font-size: 48px;
      }

      .status-badge {
        padding: 6px 12px;
        font-size: 11px;
      }
    }

    @media (max-width: 480px) {
      th, td {
        padding: 8px 10px;
      }

      .pagination a, .pagination span {
        padding: 6px 12px;
        font-size: 13px;
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

    /* Confirmation Dialog */
    .confirmation-dialog {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1000;
      align-items: center;
      justify-content: center;
    }

    .dialog-content {
      background: white;
      padding: 24px;
      border-radius: 12px;
      max-width: 400px;
      width: 90%;
      text-align: center;
    }

    .dialog-buttons {
      display: flex;
      gap: 12px;
      margin-top: 20px;
      justify-content: center;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-bell"></i>
          <h1>Manajemen Reminder Obat</h1>
        </div>
        <a href="{{ route('nurse.reminders.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Tambah Reminder Baru
        </a>
      </div>

      @if(session('success'))
        <div class="alert alert-success">
          <i class="fa-solid fa-circle-check"></i>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Pasien</th>
              <th>Obat</th>
              <th>Waktu</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($reminders as $reminder)
              <tr>
                <td>
                  <div class="patient-info">
                    <div class="patient-avatar">
                      {{ substr($reminder->patient->name ?? 'P', 0, 1) }}
                    </div>
                    <div class="patient-details">
                      <span class="patient-name">{{ $reminder->patient->name ?? 'Pasien tidak ditemukan' }}</span>
                      <span class="patient-id">ID: {{ $reminder->patient->id ?? '-' }}</span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="medication-info">
                    <div class="medication-icon">
                      <i class="fa-solid fa-pills"></i>
                    </div>
                    <div>
                      <div class="medication-name">{{ $reminder->medication }}</div>
                      <div class="medication-dosage" style="font-size: 12px; color: var(--text-light);">
                        {{ $reminder->dosage ?? 'Dosis tidak ditentukan' }}
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="time-badge">
                    <i class="fa-solid fa-clock"></i>
                    {{ \Carbon\Carbon::parse($reminder->time)->format('H:i') }}
                  </span>
                </td>
                <td>
                  @if($reminder->status == 'done')
                    <span class="status-badge status-active">
                      <i class="fa-solid fa-check-circle"></i> Selesai
                    </span>
                  @else
                    <span class="status-badge status-pending">
                        <i class="fa-solid fa-hourglass-half"></i> Pending
                    </span>
                  @endif
                </td>
                <td>
                  <div class="action-group">
                    <a href="{{ route('nurse.reminders.edit', $reminder->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                    <form action="{{ route('nurse.reminders.destroy', $reminder->id) }}" method="POST" class="action-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete(event)">
                        <i class="fa-solid fa-trash"></i> Hapus
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5">
                  <div class="empty-state">
                    <i class="fa-solid fa-bell-slash"></i>
                    <h3>Belum ada reminder yang dibuat</h3>
                    <p>Mulai dengan membuat reminder obat baru</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      @if($reminders->count() > 0)
        <div class="pagination">
          {{ $reminders->links() }}
        </div>
      @endif
    </div>
  </div>

  <!-- Confirmation Dialog -->
  <div class="confirmation-dialog" id="deleteDialog">
    <div class="dialog-content">
      <i class="fa-solid fa-triangle-exclamation" style="font-size: 48px; color: var(--danger); margin-bottom: 16px;"></i>
      <h3 style="margin-bottom: 8px;">Konfirmasi Penghapusan</h3>
      <p>Apakah Anda yakin ingin menghapus reminder ini?</p>
      <div class="dialog-buttons">
        <button type="button" class="btn btn-secondary" onclick="closeDialog()">
          <i class="fa-solid fa-times"></i> Batal
        </button>
        <button type="button" class="btn btn-danger" onclick="confirmDelete()">
          <i class="fa-solid fa-trash"></i> Ya, Hapus
        </button>
      </div>
    </div>
  </div>

  <script>
    let currentForm = null;

    function confirmDelete(event) {
      event.preventDefault();
      currentForm = event.target.closest('form');
      document.getElementById('deleteDialog').style.display = 'flex';
      return false;
    }

    function confirmDelete() {
      if (currentForm) {
        currentForm.submit();
      }
      closeDialog();
    }

    function closeDialog() {
      document.getElementById('deleteDialog').style.display = 'none';
      currentForm = null;
    }

    document.addEventListener('DOMContentLoaded', function() {
      // Tutup dialog ketika klik di luar konten
      document.getElementById('deleteDialog').addEventListener('click', function(e) {
        if (e.target === this) {
          closeDialog();
        }
      });

      // Tutup dialog dengan ESC key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
          closeDialog();
        }
      });
    });
  </script>
</body>
</html>
