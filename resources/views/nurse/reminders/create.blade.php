<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Reminder Obat - MediCare</title>
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
      align-items: center;
      gap: 14px;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border);
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

    .form-group {
      margin-bottom: 24px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: var(--text);
      font-size: 14px;
    }

    .label-required::after {
      content: " *";
      color: var(--danger);
    }

    .form-control {
      width: 100%;
      padding: 14px 16px;
      border: 2px solid var(--border);
      border-radius: 10px;
      font-size: 16px;
      font-family: 'Inter', sans-serif;
      transition: all 0.3s;
      background-color: var(--card-bg);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .form-select {
      width: 100%;
      padding: 14px 16px;
      border: 2px solid var(--border);
      border-radius: 10px;
      font-size: 16px;
      font-family: 'Inter', sans-serif;
      background-color: var(--card-bg);
      transition: all 0.3s;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23646b73'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 16px center;
      background-size: 18px;
    }

    .form-select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .form-help {
      margin-top: 6px;
      font-size: 13px;
      color: var(--text-light);
    }

    .button-group {
      display: flex;
      gap: 12px;
      margin-top: 32px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 14px 24px;
      border-radius: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
      border: none;
      cursor: pointer;
      transition: all 0.3s;
      font-size: 15px;
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
      background: #e5e7eb;
    }

    .reminder-info {
      background: #f0f9ff;
      border: 1px solid #bae6fd;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 24px;
    }

    .info-title {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 12px;
      font-weight: 600;
      color: var(--primary);
    }

    .info-title i {
      font-size: 18px;
    }

    .info-list {
      list-style: none;
      padding-left: 0;
    }

    .info-list li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .info-list li i {
      color: var(--success);
      margin-top: 2px;
      flex-shrink: 0;
    }

    .patient-option {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 8px 0;
    }

    .patient-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      font-size: 14px;
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

    .time-input-wrapper {
      position: relative;
      max-width: 200px;
    }

    .time-input-wrapper i {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
      pointer-events: none;
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
        text-align: center;
        gap: 12px;
      }

      .header h1 {
        font-size: 24px;
      }

      .button-group {
        flex-direction: column;
      }

      .button-group .btn {
        justify-content: center;
      }

      .time-input-wrapper {
        max-width: 100%;
      }
    }

    @media (max-width: 480px) {
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

      .form-control, .form-select {
        padding: 12px 14px;
      }

      .btn {
        padding: 12px 20px;
        font-size: 14px;
      }

      .reminder-info {
        padding: 16px;
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

    .form-group {
      animation: fadeIn 0.6s ease-out;
    }

    /* Focus states for accessibility */
    .btn:focus, .form-control:focus, .form-select:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }

    /* Error states */
    .error-message {
      color: var(--danger);
      font-size: 13px;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .form-control.error, .form-select.error {
      border-color: var(--danger);
    }

    .input-with-icon {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-light);
    }

    .input-with-icon .form-control {
      padding-left: 45px;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="header">
        <i class="fa-solid fa-pills"></i>
        <h1>Tambah Reminder Obat</h1>
      </div>

      <div class="reminder-info">
        <div class="info-title">
          <i class="fa-solid fa-circle-info"></i>
          <span>Informasi Penting</span>
        </div>
        <ul class="info-list">
          <li>
            <i class="fa-solid fa-check"></i>
            <span>Reminder akan aktif secara otomatis setelah disimpan</span>
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <span>Pasien akan menerima notifikasi sesuai waktu yang ditentukan</span>
          </li>
          <li>
            <i class="fa-solid fa-check"></i>
            <span>Pastikan informasi obat dan dosis sudah benar</span>
          </li>
        </ul>
      </div>

      <form action="{{ route('nurse.reminders.store') }}" method="POST" id="reminderForm">
        @csrf

        <div class="form-group">
          <label for="patient_id" class="label-required">Pilih Pasien</label>
          <select name="patient_id" id="patient_id" class="form-select @error('patient_id') error @enderror" required>
            <option value="" disabled selected>-- Pilih pasien --</option>
            @foreach($patients as $patient)
              <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                {{ $patient->name }} (ID: {{ $patient->id }})
              </option>
            @endforeach
          </select>
          <div class="form-help">Pilih pasien yang akan menerima reminder</div>
          @error('patient_id')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="medication" class="label-required">Nama Obat</label>
          <div class="input-with-icon">
            <i class="fa-solid fa-pills input-icon"></i>
            <input type="text" name="medication" id="medication"
                   class="form-control @error('medication') error @enderror"
                   value="{{ old('medication') }}"
                   placeholder="Contoh: Paracetamol 500mg"
                   required>
          </div>
          <div class="form-help">Masukkan nama obat dan kekuatan dosis</div>
          @error('medication')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="dosage">Dosis dan Instruksi</label>
          <div class="input-with-icon">
            <i class="fa-solid fa-prescription-bottle-medical input-icon"></i>
            <input type="text" name="dosage" id="dosage"
                   class="form-control"
                   value="{{ old('dosage') }}"
                   placeholder="Contoh: 1 tablet, 3 kali sehari setelah makan">
          </div>
          <div class="form-help">Tambahkan instruksi minum obat jika diperlukan</div>
          @error('dosage')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="time" class="label-required">Waktu Minum Obat</label>
          <div class="time-input-wrapper">
            <input type="time" name="time" id="time"
                   class="form-control @error('time') error @enderror"
                   value="{{ old('time') }}"
                   required>
            <i class="fa-solid fa-clock"></i>
          </div>
          <div class="form-help">Atur waktu pemberian reminder setiap hari</div>
          @error('time')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="button-group">
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-bell"></i> Simpan Reminder
          </button>
          <a href="{{ route('nurse.reminders.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('reminderForm');
      const inputs = document.querySelectorAll('.form-control, .form-select');

      // Set waktu default ke waktu berikutnya (jam berikutnya)
      @if(!old('time'))
        const now = new Date();
        // Tambahkan 1 jam
        now.setHours(now.getHours() + 1);
        // Set menit ke 0
        now.setMinutes(0);

        // Format ke HH:MM
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');

        // Set nilai default
        document.getElementById('time').value = `${hours}:${minutes}`;
      @endif

      // Validasi real-time
      inputs.forEach(input => {
        input.addEventListener('blur', function() {
          if (this.hasAttribute('required') && !this.value.trim()) {
            this.classList.add('error');
          } else {
            this.classList.remove('error');
          }
        });

        input.addEventListener('input', function() {
          if (this.value.trim()) {
            this.classList.remove('error');
          }
        });
      });

      // Validasi sebelum submit
      form.addEventListener('submit', function(e) {
        let valid = true;
        inputs.forEach(input => {
          if (input.hasAttribute('required') && !input.value.trim()) {
            input.classList.add('error');
            valid = false;
          }
        });

        if (!valid) {
          e.preventDefault();
          // Scroll ke input pertama yang error
          const firstError = document.querySelector('.form-control.error, .form-select.error');
          if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            firstError.focus();
          }
        }
      });

      // Auto-focus pada input pertama
      const firstInput = document.querySelector('.form-control, .form-select');
      if (firstInput) {
        firstInput.focus();
      }

      // Preview patient info ketika dipilih
      const patientSelect = document.getElementById('patient_id');
      patientSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value) {
          // Bisa ditambahkan preview info pasien di sini
          console.log('Pasien terpilih:', selectedOption.text);
        }
      });
    });
  </script>
</body>
</html>
