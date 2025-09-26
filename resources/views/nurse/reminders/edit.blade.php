<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Reminder Obat - MediCare</title>
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
      padding-top: 80px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 0 20px 40px;
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
      margin: 0;
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

    .btn-warning {
      background: var(--warning);
      color: white;
    }

    .btn-warning:hover {
      background: #e58c08;
      transform: translateY(-2px);
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

    .form-group {
      margin-bottom: 24px;
    }

    .form-label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: var(--text);
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .form-label i {
      color: var(--primary);
      font-size: 14px;
    }

    .form-control, .form-select {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid var(--border);
      border-radius: 10px;
      font-size: 14px;
      font-family: 'Inter', sans-serif;
      transition: all 0.3s;
      background: white;
    }

    .form-control:focus, .form-select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      transform: translateY(-1px);
    }

    textarea.form-control {
      min-height: 120px;
      resize: vertical;
      line-height: 1.5;
    }

    .form-actions {
      display: flex;
      gap: 12px;
      margin-top: 32px;
      padding-top: 24px;
      border-top: 1px solid var(--border);
      flex-wrap: wrap;
    }

    .error-message {
      color: var(--danger);
      font-size: 13px;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .error-message i {
      font-size: 12px;
    }

    .alert-error {
      background-color: #fef2f2;
      color: #dc2626;
      padding: 16px 20px;
      border-radius: 10px;
      margin-bottom: 24px;
      border: 1px solid #fecaca;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .alert-error i {
      color: #ef4444;
    }

    .alert-error ul {
      margin: 8px 0 0 20px;
    }

    .alert-error li {
      margin-bottom: 4px;
    }

    .patient-select-info {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 8px;
      font-size: 13px;
      color: var(--text-light);
    }

    .patient-select-info i {
      color: var(--primary);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 0 15px 30px;
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

      .form-actions {
        flex-direction: column;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
    }

    @media (max-width: 640px) {
      body {
        padding-top: 70px;
      }

      .container {
        padding: 0 12px 20px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .header h2 {
        font-size: 20px;
      }

      .form-control, .form-select {
        padding: 12px 14px;
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

    /* Focus states for accessibility */
    .btn:focus, .form-control:focus, .form-select:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-pen-to-square"></i>
          <h2>Edit Reminder Obat</h2>
        </div>
        <a href="{{ route('nurse.reminders.index') }}" class="btn btn-secondary">
          <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
      </div>

      @if ($errors->any())
        <div class="alert-error">
          <i class="fa-solid fa-circle-exclamation"></i>
          <div>
            <strong>Terjadi kesalahan:</strong>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif

      <form action="{{ route('nurse.reminders.update', $reminder->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="patient_id" class="form-label">
            <i class="fa-solid fa-user-injured"></i>
            Pasien
          </label>
          <select id="patient_id" name="patient_id" class="form-select" required>
            <option value="">Pilih Pasien...</option>
            @foreach($patients as $patient)
              <option value="{{ $patient->id }}" {{ old('patient_id', $reminder->patient_id) == $patient->id ? 'selected' : '' }}>
                {{ $patient->name }} (ID: {{ $patient->id }})
              </option>
            @endforeach
          </select>
          @error('patient_id')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
          <div class="patient-select-info">
            <i class="fa-solid fa-info-circle"></i>
            Pilih pasien yang akan menerima reminder obat
          </div>
        </div>

        <div class="form-group">
          <label for="medication" class="form-label">
            <i class="fa-solid fa-pills"></i>
            Nama Obat
          </label>
          <input type="text" id="medication" name="medication" class="form-control"
                 value="{{ old('medication', $reminder->medication) }}"
                 placeholder="Contoh: Paracetamol, Amoxicillin, Vitamin C"
                 required>
          @error('medication')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="dosage" class="form-label">
            <i class="fa-solid fa-prescription-bottle"></i>
            Dosis dan Instruksi
          </label>
          <input type="text" id="dosage" name="dosage" class="form-control"
                 value="{{ old('dosage', $reminder->dosage) }}"
                 placeholder="Contoh: 1 tablet, 500mg, 3x sehari setelah makan">
          @error('dosage')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="time" class="form-label">
            <i class="fa-solid fa-clock"></i>
            Waktu Pemberian
          </label>
          <input type="time" id="time" name="time" class="form-control"
                 value="{{ old('time', \Carbon\Carbon::parse($reminder->time)->format('H:i')) }}"
                 required>
          @error('time')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="form-label">
            <i class="fa-solid fa-circle-check"></i>
            Status Reminder
          </label>
          <select id="status" name="status" class="form-select" required>
            <option value="">Pilih Status...</option>
            <option value="pending" {{ old('status', $reminder->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="done" {{ old('status', $reminder->status) == 'done' ? 'selected' : '' }}>Selesai</option>
          </select>
          @error('status')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="notes" class="form-label">
            <i class="fa-solid fa-file-medical"></i>
            Catatan Tambahan
          </label>
          <textarea id="notes" name="notes" class="form-control"
                    placeholder="Tambahkan catatan khusus atau instruksi tambahan..."
                    rows="4">{{ old('notes', $reminder->notes) }}</textarea>
          @error('notes')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-warning">
            <i class="fa-solid fa-floppy-disk"></i> Update Reminder
          </button>
          <a href="{{ route('nurse.reminders.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-times"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to form elements
      const formElements = document.querySelectorAll('.form-group');
      formElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.2}s`;
        element.style.animation = 'fadeIn 0.6s ease-out';
      });

      // Auto-update time input format
      const timeInput = document.getElementById('time');
      timeInput.addEventListener('change', function() {
        const timeValue = this.value;
        if (timeValue && !timeValue.includes(':')) {
          // Format time jika input tidak sesuai format
          const hours = timeValue.substring(0, 2);
          const minutes = timeValue.substring(2, 4);
          if (hours && minutes) {
            this.value = `${hours}:${minutes}`;
          }
        }
      });

      // Real-time validation for medication name
      const medicationInput = document.getElementById('medication');
      medicationInput.addEventListener('input', function() {
        if (this.value.length < 2) {
          this.setCustomValidity('Nama obat harus minimal 2 karakter');
        } else {
          this.setCustomValidity('');
        }
      });
    });
  </script>
</body>
</html>
