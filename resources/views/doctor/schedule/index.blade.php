<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Praktek - MediCare</title>
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

    select.form-control {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 16px;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: var(--primary-color);
    }

    .checkbox-group label {
        font-weight: 500;
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

    .btn-danger {
        background: transparent;
        border: 2px solid var(--danger-color);
        color: var(--danger-color);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.1);
    }

    .btn-danger:hover {
        background: var(--danger-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(239, 68, 68, 0.2);
    }

    .btn-sm {
        padding: 8px 16px;
        font-size: 14px;
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

    .badge-success {
        background: #dcfce7;
        color: #166534;
    }

    .badge-warning {
        background: #fef3c7;
        color: #92400e;
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

    /* Actions */
    .actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 32px;
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
        
        .table th, .table td {
            padding: 14px 10px;
            font-size: 14px;
        }
        
        .actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
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

    @php $days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']; @endphp

    <div class="grid grid-2">
      <!-- Form Tambah Jadwal -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-plus-circle"></i>
          <h3>Tambah Jadwal Praktek</h3>
        </div>
        
        <form method="POST" action="{{ route('doctor.schedules.store') }}">
          @csrf
          
          <div class="form-group">
            <label class="form-label">Hari Praktek</label>
            <select name="day_of_week" class="form-control" required>
              @foreach($days as $i=>$d) 
                <option value="{{ $i }}">{{ $d }}</option> 
              @endforeach
            </select>
            @error('day_of_week') 
              <span class="error-message">{{ $message }}</span> 
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Waktu Mulai</label>
            <input type="time" name="start_time" class="form-control" required>
            @error('start_time') 
              <span class="error-message">{{ $message }}</span> 
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" name="end_time" class="form-control" required>
            @error('end_time') 
              <span class="error-message">{{ $message }}</span> 
            @enderror
          </div>

          <div class="form-group">
            <div class="checkbox-group">
              <input type="checkbox" name="is_available" id="is_available" value="1" checked>
              <label for="is_available">Jadwal Tersedia</label>
            </div>
          </div>

          <div class="actions">
            <button class="btn btn-primary" type="submit">
              <i class="fa-solid fa-calendar-plus"></i> Tambah Jadwal
            </button>
            <a class="btn btn-outline" href="{{ route('doctor.dashboard') }}">
              <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
          </div>
        </form>
      </div>

      <!-- Daftar Jadwal -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-table-list"></i>
          <h3>Daftar Jadwal Praktek</h3>
        </div>
        
        @if($schedules->isEmpty())
          <div class="empty-state">
            <i class="fa-regular fa-calendar-xmark"></i>
            <h3>Belum Ada Jadwal Praktek</h3>
            <p>Tambahkan jadwal praktek Anda untuk memudahkan pasien membuat janji temu.</p>
          </div>
        @else
          <div class="table-container">
            <table class="table">
              <thead>
                <tr>
                  <th>Hari</th>
                  <th>Jam Praktek</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($schedules as $s)
                  <tr>
                    <td style="font-weight: 600;">{{ $days[$s->day_of_week] ?? $s->day_of_week }}</td>
                    <td>
                      {{ \Carbon\Carbon::parse($s->start_time)->format('H:i') }} - 
                      {{ \Carbon\Carbon::parse($s->end_time)->format('H:i') }}
                    </td>
                    <td>
                      <span class="badge {{ $s->is_available ? 'badge-success' : 'badge-warning' }}">
                        {{ $s->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                      </span>
                    </td>
                    <td>
                      <form method="POST" action="{{ route('doctor.schedules.destroy', $s) }}" 
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">
                          <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          
          <div class="schedule-info" style="margin-top: 20px; padding: 16px; background: var(--extra-light-blue); border-radius: var(--border-radius);">
            <p style="color: var(--text-light); font-size: 14px; margin: 0;">
              <i class="fa-solid fa-info-circle" style="color: var(--primary-color);"></i>
              Total: <strong>{{ $schedules->count() }}</strong> jadwal praktek
            </p>
          </div>
        @endif
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Validasi form - pastikan end time setelah start time
      const form = document.querySelector('form');
      if (form) {
        form.addEventListener('submit', function(e) {
          const startTime = document.querySelector('input[name="start_time"]').value;
          const endTime = document.querySelector('input[name="end_time"]').value;
          
          if (startTime && endTime && startTime >= endTime) {
            e.preventDefault();
            alert('Waktu selesai harus setelah waktu mulai');
          }
        });
      }
      
      // Improve time input UX
      const timeInputs = document.querySelectorAll('input[type="time"]');
      timeInputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.showPicker && this.showPicker();
        });
      });
    });
  </script>
</body>
</html>