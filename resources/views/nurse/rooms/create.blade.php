<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Ruangan - MediCare</title>
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
      flex-wrap: wrap;
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
      flex-shrink: 0;
    }

    .btn-primary {
      background: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background: var(--primary-dark);
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

    .form-hint {
      color: var(--text-light);
      font-size: 13px;
      margin-top: 6px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .form-hint i {
      font-size: 12px;
      color: var(--primary);
    }

    .status-info {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 12px;
      margin-top: 12px;
    }

    .status-item {
      background: #f8fafc;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid var(--border);
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      padding: 6px 12px;
      border-radius: 16px;
      font-size: 11px;
      font-weight: 600;
      gap: 4px;
      border: 1px solid transparent;
    }

    .badge-success {
      background-color: #f0fdf4;
      color: var(--success);
      border-color: #bbf7d0;
    }

    .badge-danger {
      background-color: #fef2f2;
      color: var(--danger);
      border-color: #fecaca;
    }

    .badge-warning {
      background-color: #fffbeb;
      color: var(--warning);
      border-color: #fef3c7;
    }

    .capacity-info {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    /* Improved Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 0 15px 30px;
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
        flex-direction: row;
        justify-content: center;
        text-align: center;
        gap: 12px;
        width: 100%;
      }

      .header h2 {
        font-size: 22px;
        text-align: center;
      }

      .form-actions {
        flex-direction: column;
        gap: 10px;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }

      .capacity-info {
        grid-template-columns: 1fr;
        gap: 16px;
      }

      .status-info {
        grid-template-columns: 1fr;
        gap: 10px;
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

      .header-content {
        flex-direction: column;
        gap: 10px;
      }

      .header h2 {
        font-size: 20px;
      }

      .form-control, .form-select {
        padding: 12px 14px;
      }

      .status-item {
        flex-direction: column;
        text-align: center;
        gap: 6px;
      }

      .status-item span:last-child {
        font-size: 12px;
      }

      .form-group {
        margin-bottom: 20px;
      }
    }

    @media (max-width: 480px) {
      .header-content {
        gap: 8px;
      }

      .header i {
        padding: 10px;
        min-width: 42px;
        font-size: 16px;
      }

      .header h2 {
        font-size: 18px;
      }

      .btn {
        padding: 10px 16px;
        font-size: 13px;
      }

      .status-info {
        gap: 8px;
      }

      .status-item {
        padding: 10px;
      }

      .badge {
        padding: 4px 10px;
        font-size: 10px;
      }

      .form-label {
        font-size: 13px;
      }

      .form-control, .form-select {
        padding: 10px 12px;
        font-size: 13px;
      }
    }

    @media (max-width: 360px) {
      .header-content {
        flex-direction: column;
        text-align: center;
      }

      .form-actions {
        gap: 8px;
      }

      .status-item {
        padding: 8px;
      }

      .form-hint, .error-message {
        font-size: 12px;
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
          <i class="fa-solid fa-bed"></i>
          <h2>Tambah Ruangan Baru</h2>
        </div>
        <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">
          <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
        </a>
      </div>

      <form action="{{ route('nurse.rooms.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="name" class="form-label">
            <i class="fa-solid fa-signature"></i>
            Nama Ruangan
          </label>
          <input type="text" id="name" name="name" class="form-control"
                 value="{{ old('name') }}"
                 placeholder="Contoh: Ruang ICU 1, Ruang Isolasi A, dll."
                 required>
          @error('name')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
          <div class="form-hint">
            <i class="fa-solid fa-lightbulb"></i>
            Berikan nama yang jelas dan mudah dikenali
          </div>
        </div>

        <div class="form-group">
          <label for="room_number" class="form-label">
            <i class="fa-solid fa-hashtag"></i>
            Nomor Ruangan
          </label>
          <input type="text" id="room_number" name="room_number" class="form-control"
                 value="{{ old('room_number') }}"
                 placeholder="Contoh: 101, A-12, ICU-1"
                 required>
          @error('room_number')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror
          <div class="form-hint">
            <i class="fa-solid fa-lightbulb"></i>
            Nomor unik untuk identifikasi ruangan
          </div>
        </div>

        <div class="form-group">
          <label for="status" class="form-label">
            <i class="fa-solid fa-circle-check"></i>
            Status Ruangan
          </label>
          <select id="status" name="status" class="form-select" required>
            <option value="">Pilih Status...</option>
            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
            <option value="occupied" {{ old('status') == 'occupied' ? 'selected' : '' }}>Terisi</option>
            <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
          </select>
          @error('status')
            <div class="error-message">
              <i class="fa-solid fa-circle-exclamation"></i>
              {{ $message }}
            </div>
          @enderror

          <div class="status-info">
            <div class="status-item">
              <span class="badge badge-success">
                <i class="fa-solid fa-circle-check"></i> Tersedia
              </span>
              <span>Ruangan kosong dan siap digunakan</span>
            </div>
            <div class="status-item">
              <span class="badge badge-danger">
                <i class="fa-solid fa-circle-xmark"></i> Terisi
              </span>
              <span>Ruangan sedang digunakan pasien</span>
            </div>
            <div class="status-item">
              <span class="badge badge-warning">
                <i class="fa-solid fa-triangle-exclamation"></i> Maintenance
              </span>
              <span>Ruangan dalam perbaikan</span>
            </div>
          </div>
        </div>

        <div class="capacity-info">
          <div class="form-group">
            <label for="capacity" class="form-label">
              <i class="fa-solid fa-users"></i>
              Kapasitas Maksimal
            </label>
            <input type="number" id="capacity" name="capacity" class="form-control"
                   value="{{ old('capacity') }}"
                   min="1" max="50"
                   placeholder="Jumlah maksimal pasien"
                   required>
            @error('capacity')
              <div class="error-message">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ $message }}
              </div>
            @enderror
            <div class="form-hint">
              <i class="fa-solid fa-lightbulb"></i>
              Kapasitas total ruangan
            </div>
          </div>

          <div class="form-group">
            <label for="occupied" class="form-label">
              <i class="fa-solid fa-user-injured"></i>
              Jumlah Terisi
            </label>
            <input type="number" id="occupied" name="occupied" class="form-control"
                   value="{{ old('occupied', 0) }}"
                   min="0"
                   placeholder="Jumlah pasien saat ini"
                   required>
            @error('occupied')
              <div class="error-message">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ $message }}
              </div>
            @enderror
            <div class="form-hint">
              <i class="fa-solid fa-lightbulb"></i>
              Pasien yang sedang menempati ruangan
            </div>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-save"></i> Simpan Ruangan
          </button>
          <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">
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

      // Real-time validation for capacity and occupied
      const capacityInput = document.getElementById('capacity');
      const occupiedInput = document.getElementById('occupied');

      function validateCapacity() {
        const capacity = parseInt(capacityInput.value);
        const occupied = parseInt(occupiedInput.value);

        if (capacity > 0 && occupied > capacity) {
          occupiedInput.setCustomValidity('Jumlah terisi tidak boleh melebihi kapasitas');
          occupiedInput.style.borderColor = 'var(--danger)';
        } else {
          occupiedInput.setCustomValidity('');
          occupiedInput.style.borderColor = '';
        }
      }

      capacityInput.addEventListener('input', validateCapacity);
      occupiedInput.addEventListener('input', validateCapacity);

      // Auto-adjust occupied based on status
      const statusSelect = document.getElementById('status');
      statusSelect.addEventListener('change', function() {
        if (this.value === 'available') {
          occupiedInput.value = 0;
        } else if (this.value === 'occupied') {
          const capacity = parseInt(capacityInput.value) || 1;
          const currentOccupied = parseInt(occupiedInput.value) || 0;
          if (currentOccupied === 0) {
            occupiedInput.value = 1;
          }
        }
        validateCapacity();
      });

      // Initial validation
      validateCapacity();
    });
  </script>
</body>
</html>
