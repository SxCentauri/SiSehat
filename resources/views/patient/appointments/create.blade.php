<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Janji Temu - MediCare</title>
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
      max-width: 800px;
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

    .header h2 {
      font-size: 24px;
      font-weight: 700;
      color: var(--text);
    }

    .btn {
      padding: 12px 24px;
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

    .form-actions {
      display: flex;
      gap: 12px;
      justify-content: flex-end;
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
      flex-wrap: wrap;
    }

    .field {
      margin-bottom: 24px;
    }

    .field label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: var(--text);
      font-size: 14px;
    }

    .field input,
    .field select,
    .field textarea {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid var(--border);
      border-radius: 10px;
      font-size: 14px;
      font-family: 'Inter', sans-serif;
      transition: all 0.3s;
      background-color: white;
    }

    .field input:focus,
    .field select:focus,
    .field textarea:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .field textarea {
      resize: vertical;
      min-height: 100px;
    }

    .grid {
      display: grid;
      gap: 20px;
    }

    .grid-2 {
      grid-template-columns: 1fr 1fr;
    }

    .doctor-option {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 8px 0;
    }

    .doctor-icon {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 14px;
    }

    .doctor-info {
      display: flex;
      flex-direction: column;
    }

    .doctor-name {
      font-weight: 600;
      color: var(--text);
    }

    .doctor-specialty {
      font-size: 12px;
      color: var(--text-light);
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

      .header h2 {
        font-size: 22px;
      }

      .grid-2 {
        grid-template-columns: 1fr;
        gap: 16px;
      }

      .form-actions {
        flex-direction: column-reverse;
      }

      .btn {
        width: 100%;
        justify-content: center;
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

      .header h2 {
        font-size: 20px;
      }

      .field {
        margin-bottom: 20px;
      }

      .field input,
      .field select,
      .field textarea {
        padding: 10px 14px;
        font-size: 13px;
      }
    }

    @media (max-width: 480px) {
      .container {
        padding: 70px 10px 15px;
      }

      .card {
        padding: 16px;
      }

      .header {
        margin-bottom: 20px;
      }

      .header i {
        padding: 10px;
        font-size: 16px;
        min-width: 40px;
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

    .field {
      animation: fadeIn 0.3s ease-out;
    }

    /* Focus states for accessibility */
    .btn:focus,
    a:focus,
    input:focus,
    select:focus,
    textarea:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }

    /* Error states */
    .error {
      color: var(--danger);
      font-size: 12px;
      margin-top: 4px;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .error input,
    .error select,
    .error textarea {
      border-color: var(--danger);
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-calendar-plus"></i>
          <h2>Buat Janji Temu</h2>
        </div>
      </div>

      <form method="POST" action="{{ route('patient.appointments.store') }}">
        @csrf

        <div class="field">
          <label for="doctor_id">
            <i class="fa-solid fa-user-md"></i> Pilih Dokter
          </label>
          <select name="doctor_id" id="doctor_id" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach($doctors as $d)
              <option value="{{ $d->id }}" data-specialty="{{ $d->specialty ?? 'Umum' }}">
                {{ $d->name }} - {{ $d->specialty ?? 'Dokter Umum' }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="grid grid-2">
          <div class="field">
            <label for="date">
              <i class="fa-solid fa-calendar-day"></i> Tanggal Janji
            </label>
            <input type="date" name="date" id="date" required min="{{ date('Y-m-d') }}">
          </div>
          <div class="field">
            <label for="time">
              <i class="fa-solid fa-clock"></i> Waktu Janji
            </label>
            <input type="time" name="time" id="time" required min="08:00" max="20:00">
          </div>
        </div>

        <div class="field">
          <label for="reason">
            <i class="fa-solid fa-comment-medical"></i> Alasan/Keluhan
          </label>
          <textarea name="reason" id="reason" rows="4" placeholder="Jelaskan keluhan atau alasan konsultasi Anda..."></textarea>
          <small style="color: var(--text-light); font-size: 12px; margin-top: 4px;">
            Opsional, namun disarankan untuk membantu dokter memahami kebutuhan Anda
          </small>
        </div>

        <div class="form-actions">
          <a href="{{ route('patient.appointments.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Janji
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-paper-plane"></i> Kirim Permohonan Janji
          </button>
        </div>
      </form>
    </div>
  </main>

  <script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar?.classList.add('scrolled');
      } else {
        navbar?.classList.remove('scrolled');
      }
    });

    // Form validation and enhancements
    document.addEventListener('DOMContentLoaded', function() {
      const dateInput = document.getElementById('date');
      const timeInput = document.getElementById('time');
      const doctorSelect = document.getElementById('doctor_id');

      // Set minimum date to today
      const today = new Date().toISOString().split('T')[0];
      dateInput.min = today;

      // Add real-time validation
      dateInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
          this.style.borderColor = 'var(--danger)';
          // Reset to today if past date selected
          this.value = today.toISOString().split('T')[0];
        } else {
          this.style.borderColor = 'var(--border)';
        }
      });

      // Time validation
      timeInput.addEventListener('change', function() {
        const time = this.value;
        const [hours] = time.split(':').map(Number);

        if (hours < 8 || hours > 20) {
          this.style.borderColor = 'var(--danger)';
          // Show message or adjust to valid time
        } else {
          this.style.borderColor = 'var(--border)';
        }
      });

      // Doctor select enhancement
      doctorSelect.addEventListener('change', function() {
        if (this.value) {
          this.style.borderColor = 'var(--success)';
        } else {
          this.style.borderColor = 'var(--border)';
        }
      });

      // Form submission feedback
      const form = document.querySelector('form');
      form.addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Mengirim...';
        submitBtn.disabled = true;
      });
    });

    // Add some interactive effects
    const fields = document.querySelectorAll('.field input, .field select, .field textarea');
    fields.forEach(field => {
      field.addEventListener('focus', function() {
        this.parentElement.style.transform = 'translateX(5px)';
      });

      field.addEventListener('blur', function() {
        this.parentElement.style.transform = 'translateX(0)';
      });
    });
  </script>
</body>
</html>
