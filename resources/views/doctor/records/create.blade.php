<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rekam Medis - MediCare</title>
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
        --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
        --shadow: 0 20px 50px rgba(37, 99, 235, 0.1);
        --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
        --border-radius: 16px;
    }

    body {
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

    /* Card Styles */
    .card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 32px;
        transition: all 0.3s ease;
        border: 1px solid rgba(96, 165, 250, 0.1);
        height: 100%;
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

    /* Patient Info */
    .patient-info {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .info-label {
        font-weight: 600;
        color: var(--text-light);
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 16px;
        font-weight: 500;
    }

    /* Badge Styles */
    .badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: center;
    }

    .badge-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-approved {
        background: #dcfce7;
        color: #166534;
    }

    .badge-completed {
        background: #bbf7d0;
        color: #166534;
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
        min-height: 120px;
        resize: vertical;
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
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 18px;
        }
        
        .form-control {
            padding: 12px 14px;
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
    <div class="grid grid-2">
      <!-- Informasi Pasien -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-user-injured"></i>
          <h3>Informasi Pasien</h3>
        </div>
        
        <div class="patient-info">
          <div class="info-item">
            <span class="info-label">Nama Pasien</span>
            <span class="info-value">{{ $appointment->patient->name ?? 'Pasien #'.$appointment->patient_id }}</span>
          </div>
          
          <div class="info-item">
            <span class="info-label">Tanggal Janji</span>
            <span class="info-value">{{ \Carbon\Carbon::parse($appointment->date)->format('d F Y') }}</span>
          </div>
          
          <div class="info-item">
            <span class="info-label">Waktu Janji</span>
            <span class="info-value">{{ \Illuminate\Support\Str::of($appointment->time)->limit(5,'') }} WIB</span>
          </div>
          
          <div class="info-item">
            <span class="info-label">Status</span>
            <span class="badge badge-{{ $appointment->status }}">{{ ucfirst($appointment->status) }}</span>
          </div>
        </div>
      </div>

      <!-- Form Rekam Medis -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-notes-medical"></i>
          <h3>Form Rekam Medis</h3>
        </div>
        
        <form method="POST" action="{{ route('doctor.records.store', $appointment) }}">
          @csrf
          
          <div class="form-group">
            <label class="form-label">Keluhan Utama</label>
            <textarea name="complaints" class="form-control" rows="3" placeholder="Masukkan keluhan utama pasien">{{ old('complaints') }}</textarea>
            @error('complaints') 
              <span class="error-message">{{ $message }}</span> 
            @enderror
          </div>
          
          <div class="form-group">
            <label class="form-label">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" rows="3" placeholder="Masukkan diagnosis medis">{{ old('diagnosis') }}</textarea>
            @error('diagnosis') 
              <span class="error-message">{{ $message }}</span> 
            @enderror
          </div>
          
          <div class="form-group">
            <label class="form-label">Catatan dan Rencana Perawatan</label>
            <textarea name="notes" class="form-control" rows="3" placeholder="Masukkan catatan tambahan dan rencana perawatan">{{ old('notes') }}</textarea>
            @error('notes') 
              <span class="error-message">{{ $message }}</span> 
            @enderror
          </div>

          <div class="actions">
            <button class="btn btn-primary" type="submit">
              <i class="fa-solid fa-save"></i> Simpan Rekam Medis
            </button>
            <a class="btn btn-outline" href="{{ route('doctor.appointments.index') }}">
              <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
          </div>
        </form>
      </div>
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
    });
  </script>
</body>
</html>