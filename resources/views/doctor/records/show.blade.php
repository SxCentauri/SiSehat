<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Rekam Medis - MediCare</title>
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

    .grid {
      display: grid;
      gap: 24px;
      margin-bottom: 30px;
    }

    .grid-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr));
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

    .record-summary {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .summary-item {
      display: flex;
      flex-direction: column;
      gap: 8px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border);
    }

    .summary-item:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .summary-label {
      font-weight: 600;
      color: var(--text-light);
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .summary-value {
      font-size: 16px;
      line-height: 1.6;
    }

    .empty-value {
      color: var(--text-light);
      font-style: italic;
    }

    .form-group {
      margin-bottom: 24px;
    }

    .form-label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: var(--text);
      font-size: 14px;
    }

    .form-control {
      width: 100%;
      padding: 14px 16px;
      border: 2px solid var(--border);
      border-radius: 12px;
      font-size: 14px;
      font-family: 'Inter', sans-serif;
      transition: all 0.3s ease;
      background-color: var(--card-bg);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    textarea.form-control {
      min-height: 100px;
      resize: vertical;
    }

    select.form-control {
      cursor: pointer;
    }

    .error-message {
      display: block;
      margin-top: 6px;
      color: var(--danger);
      font-size: 13px;
      font-weight: 500;
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

    .actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
      margin-top: 32px;
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

    .badge.ongoing {
      background-color: #fffbeb;
      color: var(--warning);
      border-color: #fef3c7;
    }

    .badge.done {
      background-color: #f0fdf4;
      color: var(--success);
      border-color: #bbf7d0;
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

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 90px 15px 30px;
      }

      .card {
        padding: 24px;
      }

      .grid-2 {
        grid-template-columns: 1fr;
      }

      .header {
        flex-direction: column;
        align-items: stretch;
        gap: 16px;
      }

      .header-content {
        flex-direction: row;
        justify-content: flex-start;
        text-align: left;
        gap: 12px;
      }

      .header h2 {
        font-size: 22px;
      }

      .actions {
        flex-direction: column;
      }

      .btn {
        width: 100%;
        justify-content: center;
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
        flex-direction: row;
        align-items: center;
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

      .record-summary {
        gap: 16px;
      }

      .summary-item {
        padding-bottom: 16px;
      }

      .form-control {
        padding: 12px 14px;
      }

      .empty-state {
        padding: 40px 15px;
      }

      .empty-state i {
        font-size: 48px;
      }

      /* Sembunyikan kolom tertentu di mobile */
      th:nth-child(3),
      td:nth-child(3) {
        display: none;
      }
    }

    @media (max-width: 480px) {
      .header-content {
        flex-direction: row;
        align-items: center;
        gap: 8px;
      }

      .header h2 {
        font-size: 18px;
      }

      .header i {
        padding: 8px;
        min-width: 38px;
        font-size: 14px;
      }

      .summary-label {
        font-size: 13px;
      }

      .summary-value {
        font-size: 15px;
      }

      .form-label {
        font-size: 13px;
      }

      .form-control {
        padding: 10px 12px;
        font-size: 13px;
      }

      th, td {
        padding: 10px 12px;
        font-size: 13px;
      }

      .badge {
        padding: 6px 12px;
        font-size: 11px;
      }
    }

    @media (max-width: 360px) {
      .header-content {
        flex-direction: column;
        text-align: center;
        gap: 8px;
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

    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }

    tbody tr {
      animation: fadeIn 0.3s ease-out;
    }

    /* Focus states for accessibility */
    .btn:focus, a:focus, .form-control:focus {
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

    <div class="grid grid-2">
      <!-- Ringkasan Rekam Medis -->
      <div class="card">
        <div class="header">
          <div class="header-content">
            <i class="fa-solid fa-file-medical"></i>
            <h2>Ringkasan Rekam Medis #{{ $record->id }}</h2>
          </div>
        </div>

        <div class="record-summary">
          <div class="summary-item">
            <span class="summary-label">Pasien</span>
            <span class="summary-value">{{ $record->patient->name ?? 'Pasien #'.$record->patient_id }}</span>
          </div>

          <div class="summary-item">
            <span class="summary-label">Dokter</span>
            <span class="summary-value">{{ $record->doctor->name ?? 'Dokter #'.$record->doctor_id }}</span>
          </div>

          <div class="summary-item">
            <span class="summary-label">Keluhan Utama</span>
            <span class="summary-value">
              {{ $record->complaints ?: '<span class="empty-value">Tidak ada keluhan yang dicatat</span>' }}
            </span>
          </div>

          <div class="summary-item">
            <span class="summary-label">Diagnosis</span>
            <span class="summary-value">
              {{ $record->diagnosis ?: '<span class="empty-value">Tidak ada diagnosis yang dicatat</span>' }}
            </span>
          </div>

          <div class="summary-item">
            <span class="summary-label">Catatan Medis</span>
            <span class="summary-value">
              {{ $record->notes ?: '<span class="empty-value">Tidak ada catatan tambahan</span>' }}
            </span>
          </div>
        </div>
      </div>

      <!-- Form Tambah Perawatan -->
      <div class="card">
        <div class="header">
          <div class="header-content">
            <i class="fa-solid fa-syringe"></i>
            <h2>Tambah Perawatan</h2>
          </div>
        </div>

        <form method="POST" action="{{ route('doctor.treatments.store', $record) }}">
          @csrf

          <div class="form-group">
            <label class="form-label">Deskripsi Perawatan</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi perawatan yang diberikan" required></textarea>
            @error('description')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Status Perawatan</label>
            <select name="status" class="form-control" required>
              <option value="ongoing">On-going (Dalam Perawatan)</option>
              <option value="done">Selesai</option>
            </select>
            @error('status')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Kunjungan Berikutnya (Opsional)</label>
            <input type="date" name="next_visit_at" class="form-control" min="{{ date('Y-m-d') }}">
            @error('next_visit_at')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="actions">
            <button class="btn btn-primary" type="submit">
              <i class="fa-solid fa-plus"></i> Tambah Perawatan
            </button>
            <a class="btn btn-secondary" href="{{ route('doctor.records.index') }}">
              <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
          </div>
        </form>
      </div>
    </div>

    <!-- Riwayat Perawatan -->
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-clipboard-list"></i>
          <h2>Riwayat Perawatan</h2>
        </div>
      </div>

      @if($record->treatments->isEmpty())
        <div class="empty-state">
          <i class="fa-regular fa-clipboard"></i>
          <h3>Belum ada perawatan</h3>
          <p>Tambahkan perawatan pertama untuk pasien ini menggunakan form di atas.</p>
        </div>
      @else
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>Deskripsi Perawatan</th>
                <th>Status</th>
                <th>Kunjungan Berikutnya</th>
              </tr>
            </thead>
            <tbody>
              @foreach($record->treatments as $t)
                <tr>
                  <td>{{ $t->description }}</td>
                  <td>
                    <span class="badge {{ $t->status }}">
                      @if($t->status === 'ongoing')
                        <i class="fa-solid fa-clock"></i>
                      @else
                        <i class="fa-solid fa-check"></i>
                      @endif
                      {{ ucfirst($t->status) }}
                    </span>
                  </td>
                  <td>
                    {{ $t->next_visit_at ? \Carbon\Carbon::parse($t->next_visit_at)->format('d M Y') : '-' }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>

  <script>
    // Menambahkan efek interaktif pada form
    document.addEventListener('DOMContentLoaded', function() {
      const formControls = document.querySelectorAll('.form-control');

      formControls.forEach(control => {
        // Efek focus
        control.addEventListener('focus', function() {
          this.parentElement.classList.add('focused');
        });

        control.addEventListener('blur', function() {
          this.parentElement.classList.remove('focused');
        });

        // Auto-resize textarea
        if (control.tagName === 'TEXTAREA') {
          control.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
          });
        }
      });

      // Set min date for next visit to today
      const nextVisitInput = document.querySelector('input[name="next_visit_at"]');
      if (nextVisitInput) {
        nextVisitInput.min = new Date().toISOString().split('T')[0];
      }
    });
  </script>
</body>
</html>
