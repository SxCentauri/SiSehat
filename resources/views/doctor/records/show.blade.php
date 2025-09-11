<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Rekam Medis - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --accent-color: #60a5fa;
        --light-blue: #dbeafe;
        --extra-light-blue: #eff6ff;
        --text-color: #1f2937;
        --text-light: #6b7280;
        --white: #ffffff;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --warning-color: #f59e0b;
        --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
        --shadow: 0 20px 50px rgba(37, 99, 235, 0.1);
        --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
        --border-radius: 16px;
    }

    body {
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
        color: var(--text-color);
        background: #f8fafc;
        padding: 100px 20px 40px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .grid {
        display: grid;
        gap: 24px;
        margin-bottom: 30px;
    }

    .grid-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    /* Flash Message */
    .flash {
        padding: 16px 24px;
        background: #dcfce7;
        color: #166534;
        border-radius: var(--border-radius);
        margin-bottom: 30px;
        font-weight: 600;
        border: 1px solid #bbf7d0;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.15);
    }

    .flash i {
        font-size: 20px;
    }

    /* Card Styles */
    .card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 32px;
        transition: all 0.3s ease;
        border: 1px solid rgba(96, 165, 250, 0.1);
    }

    .card:hover {
        box-shadow: var(--shadow-hover);
    }

    /* Section Title */
    .section-title {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        font-size: 24px;
        font-weight: 700;
        color: var(--text-color);
    }

    .section-title i {
        color: var(--primary-color);
        font-size: 22px;
        width: 50px;
        height: 50px;
        background: var(--gradient-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Medical Record Summary */
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
        border-bottom: 1px solid #f1f5f9;
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

    /* Form Styles */
    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-color);
        font-size: 15px;
    }

    .form-control {
        width: 100%;
        padding: 14px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
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
        color: var(--danger-color);
        font-size: 14px;
        font-weight: 500;
    }

    /* Button Styles */
    .btn {
        padding: 12px 24px;
        font-size: 15px;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
    }

    .btn-primary {
        background: var(--gradient);
        color: white;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
    }

    .btn-outline {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
    }

    .btn-outline:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(37, 99, 235, 0.2);
    }

    /* Actions */
    .actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 32px;
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        border-radius: var(--border-radius);
        box-shadow: 0 10px 40px rgba(37, 99, 235, 0.08);
        margin: 24px 0;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
    }

    .table th {
        background: var(--gradient-light);
        color: var(--primary-color);
        padding: 18px 16px;
        font-weight: 600;
        text-align: left;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .table td {
        padding: 20px 16px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 15px;
        vertical-align: middle;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    .table tr:hover {
        background: #f8fafc;
    }

    /* Badge Styles */
    .badge {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: center;
        min-width: 100px;
    }

    .badge-ongoing {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-done {
        background: #dcfce7;
        color: #166534;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 50px 20px;
    }

    .empty-state i {
        font-size: 60px;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 20px;
        color: var(--text-light);
        margin-bottom: 10px;
    }

    .empty-state p {
        color: var(--text-light);
        max-width: 400px;
        margin: 0 auto;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        body {
            padding: 90px 15px 30px;
        }
        
        .card {
            padding: 24px;
        }
        
        .section-title {
            font-size: 22px;
        }
        
        .section-title i {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }
    }

    @media (max-width: 768px) {
        body {
            padding: 80px 10px 20px;
        }
        
        .grid-2 {
            grid-template-columns: 1fr;
        }
        
        .card {
            padding: 20px;
            border-radius: 14px;
        }
        
        .section-title {
            font-size: 20px;
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .section-title i {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
        
        .actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
        
        .table th, .table td {
            padding: 14px 10px;
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 18px;
        }
        
        .form-control {
            padding: 12px 14px;
        }
        
        .table th:nth-child(3),
        .table td:nth-child(3) {
            display: none;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        animation: fadeIn 0.5s ease-out;
    }

    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
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
        <div class="section-title">
          <i class="fa-solid fa-file-medical"></i>
          <h3>Ringkasan Rekam Medis #{{ $record->id }}</h3>
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
        <div class="section-title">
          <i class="fa-solid fa-syringe"></i>
          <h3>Tambah Perawatan</h3>
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
            <a class="btn btn-outline" href="{{ route('doctor.records.index') }}">
              <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
          </div>
        </form>
      </div>
    </div>

    <!-- Riwayat Perawatan -->
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-clipboard-list"></i>
        <h3>Riwayat Perawatan</h3>
      </div>
      
      @if($record->treatments->isEmpty())
        <div class="empty-state">
          <i class="fa-regular fa-clipboard"></i>
          <h3>Belum ada perawatan</h3>
          <p>Tambahkan perawatan pertama untuk pasien ini menggunakan form di atas.</p>
        </div>
      @else
        <div class="table-container">
          <table class="table">
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
                    <span class="badge badge-{{ $t->status }}">
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