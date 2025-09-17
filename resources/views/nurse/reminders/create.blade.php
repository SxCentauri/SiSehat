<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Reminder Obat - MediCare</title>
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
      --success: #10b981;
      --danger: #ef4444;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--bg);
      color: #1f2937;
      line-height: 1.6;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 100px auto 40px;
      padding: 0 20px;
    }

    .card {
      background: #fff;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px;
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
      min-width: 46px;
      text-align: center;
    }

    .btn {
      padding:12px 24px;
      border-radius:12px;
      font-weight:600;
      display:inline-flex;
      align-items:center;
      gap:8px;
      text-decoration:none;
      border:none;
      cursor:pointer;
      transition:.3s;
      font-size: 14px;
    }

    .btn-success {
      background: var(--success);
      color:#fff;
      box-shadow:0 8px 20px rgba(16,185,129,.2);
    }

    .btn-success:hover {
      transform:translateY(-2px);
      box-shadow:0 12px 25px rgba(16,185,129,.3);
      background: #0da271;
    }

    .btn-secondary {
      background:#e5e7eb;
      color:#1f2937;
    }

    .btn-secondary:hover {
      background:#d1d5db;
    }

    .form-group {
      margin-bottom: 24px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #374151;
    }

    .form-control {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid #d1d5db;
      border-radius: 10px;
      font-size: 16px;
      font-family: 'Inter', sans-serif;
      transition: all 0.3s;
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    textarea.form-control {
      min-height: 120px;
      resize: vertical;
    }

    .form-select {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid #d1d5db;
      border-radius: 10px;
      font-size: 16px;
      font-family: 'Inter', sans-serif;
      background-color: white;
      transition: all 0.3s;
    }

    .form-select:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .button-group {
      display: flex;
      gap: 12px;
      margin-top: 32px;
      flex-wrap: wrap;
    }

    .error-message {
      color: var(--danger);
      font-size: 14px;
      margin-top: 5px;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        margin: 90px auto 30px;
        padding: 0 15px;
      }

      .card {
        padding: 24px;
      }

      .section-title {
        font-size: 20px;
      }

      .button-group {
        flex-direction: column;
      }

      .button-group .btn {
        justify-content: center;
      }
    }

    @media (max-width: 480px) {
      .container {
        margin: 80px auto 20px;
        padding: 0 12px;
      }

      .card {
        padding: 20px;
        border-radius: 14px;
      }

      .section-title {
        font-size: 18px;
        flex-direction: column;
        text-align: center;
        gap: 10px;
      }

      .form-control, .form-select {
        padding: 10px 14px;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-plus"></i>
        <h3>Tambah Reminder Obat</h3>
      </div>

      @if ($errors->any())
        <div style="background: #fef2f2; color: var(--danger); padding: 16px; border-radius: 10px; margin-bottom: 24px; border: 1px solid #fecaca;">
          <strong><i class="fa-solid fa-circle-exclamation"></i> Terdapat kesalahan:</strong>
          <ul style="margin-top: 8px; margin-left: 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('nurse.reminders.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="patient_name">Nama Pasien *</label>
          <input type="text" id="patient_name" name="patient_name" class="form-control" value="{{ old('patient_name') }}" required placeholder="Masukkan nama pasien">
          @error('patient_name')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="medication">Nama Obat *</label>
          <input type="text" id="medication" name="medication" class="form-control" value="{{ old('medication') }}" required placeholder="Masukkan nama obat">
          @error('medication')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="dosage">Dosis</label>
          <input type="text" id="dosage" name="dosage" class="form-control" value="{{ old('dosage') }}" placeholder="Contoh: 1 tablet, 500mg">
          @error('dosage')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="time">Waktu Pemberian *</label>
          <input type="time" id="time" name="time" class="form-control" value="{{ old('time') }}" required>
          @error('time')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="status">Status *</label>
          <select id="status" name="status" class="form-select" required>
            <option value="">Pilih Status</option>
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
          </select>
          @error('status')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
            </div>
          @enderror
        </div>

        <div class="button-group">
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-floppy-disk"></i> Simpan Reminder
          </button>
          <a href="{{ route('nurse.reminders.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-xmark"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Set waktu default ke waktu berikutnya (jam berikutnya)
    document.addEventListener('DOMContentLoaded', function() {
      // Hanya set default jika belum ada nilai dari old (setelah form validation error)
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
    });
  </script>
</body>
</html>
