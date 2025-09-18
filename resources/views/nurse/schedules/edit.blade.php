<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Jadwal - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #2563eb;
      --primary-dark: #1e40af;
      --secondary: #64748b;
      --success: #10b981;
      --warning: #f59e0b;
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
      padding: 20px;
      min-height: 100vh;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
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

    .header h2 {
      font-size: 24px;
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

    textarea.form-control {
      min-height: 120px;
      resize: vertical;
      line-height: 1.5;
    }

    .readonly-input {
      background-color: #f9fafb;
      color: var(--text-light);
      cursor: not-allowed;
    }

    .shift-info {
      margin-top: 16px;
      padding: 16px;
      background-color: #f8fafc;
      border-radius: 10px;
      border-left: 4px solid var(--primary);
    }

    .shift-item {
      display: flex;
      align-items: center;
      margin-bottom: 8px;
      padding: 8px 0;
    }

    .shift-item:last-child {
      margin-bottom: 0;
    }

    .badge {
      display: inline-flex;
      align-items: center;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      margin-right: 12px;
      min-width: 80px;
      justify-content: center;
    }

    .badge-pagi {
      background-color: #e0f2fe;
      color: var(--primary);
    }

    .badge-siang {
      background-color: #fef3c7;
      color: var(--warning);
    }

    .badge-malam {
      background-color: #e0e7ff;
      color: #6366f1;
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

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 20px 15px;
        margin: 20px auto;
      }

      .card {
        padding: 24px;
      }

      .header {
        flex-direction: column;
        text-align: center;
        gap: 12px;
      }

      .header h2 {
        font-size: 22px;
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
        padding: 15px 10px;
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

      .shift-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .badge {
        margin-bottom: 8px;
        margin-right: 0;
      }

      .btn {
        padding: 12px 20px;
        font-size: 14px;
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
  <div class="container">
    <div class="card">
      <div class="header">
        <i class="fa-solid fa-calendar-plus"></i>
        <h2>Edit Jadwal</h2>
      </div>
      {{-- Logika untuk memisahkan shift dan tugas dari database --}}
            @php
                $taskString = $schedule->task;
                $shift = '';
                $taskDescription = $taskString;

                if (str_starts_with($taskString, 'Shift Pagi: ')) {
                    $shift = 'Pagi';
                    $taskDescription = substr($taskString, strlen('Shift Pagi: '));
                } elseif (str_starts_with($taskString, 'Shift Siang: ')) {
                    $shift = 'Siang';
                    $taskDescription = substr($taskString, strlen('Shift Siang: '));
                } elseif (str_starts_with($taskString, 'Shift Malam: ')) {
                    $shift = 'Malam';
                    $taskDescription = substr($taskString, strlen('Shift Malam: '));
                }
            @endphp

      <form action="{{ route('nurse.schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="nurse_name">Nama Perawat</label>
          <input
            type="text"
            id="nurse_name"
            class="form-control readonly-input"
            value="{{ $schedule->nurse_name }}"
            readonly
            disabled
          >
        </div>

        <div class="form-group">
          <div class="form-group">
                    <label for="shift">Shift</label>
                    <select id="shift" name="shift" class="form-select" required>
                        <option value="" disabled>Pilih shift...</option>
                        <option value="Pagi" {{ $shift === 'Pagi' ? 'selected' : '' }}>Pagi</option>
                        <option value="Siang" {{ $shift === 'Siang' ? 'selected' : '' }}>Siang</option>
                        <option value="Malam" {{ $shift === 'Malam' ? 'selected' : '' }}>Malam</option>
                    </select>
                </div>

          <div class="shift-info">
            <div class="shift-item">
              <span class="badge badge-pagi">Pagi</span>
              <span>07:00 - 14:00 | Shift pagi untuk perawatan rutin</span>
            </div>
            <div class="shift-item">
              <span class="badge badge-siang">Siang</span>
              <span>14:00 - 21:00 | Shift siang untuk observasi intensif</span>
            </div>
            <div class="shift-item">
              <span class="badge badge-malam">Malam</span>
              <span>21:00 - 07:00 | Shift malam untuk perawatan darurat</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="task">Tugas Utama</label>
          <textarea id="task" name="task" class="form-control" required placeholder="Contoh: Bertugas di ruang UGD, ...">{{ $taskDescription }}</textarea>
        </div>

        <div class="form-group">
          <label for="date">Tanggal</label>
          <input type="date" id="date" name="date" class="form-control" required value="{{ $schedule->schedule_date }}">
        </div>

        <div class="button-group">
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-save"></i> Simpan Perubahan
          </button>
          <a href="{{ route('nurse.schedules.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-times"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Set tanggal minimum ke hari ini
    document.addEventListener('DOMContentLoaded', function() {
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('date').setAttribute('min', today);

      // Menambahkan interaksi untuk memilih shift
      const shiftSelect = document.getElementById('shift');
      const shiftItems = document.querySelectorAll('.shift-item');

      // Highlight shift yang dipilih saat halaman dimuat
      highlightSelectedShift();

      shiftSelect.addEventListener('change', highlightSelectedShift);

      function highlightSelectedShift() {
        // Hapus highlight dari semua item
        shiftItems.forEach(item => {
          item.style.backgroundColor = 'transparent';
        });

        // Highlight item yang sesuai dengan pilihan
        if (shiftSelect.value === 'Pagi') {
          shiftItems[0].style.backgroundColor = '#eff6ff';
        } else if (shiftSelect.value === 'Siang') {
          shiftItems[1].style.backgroundColor = '#fffbeb';
        } else if (shiftSelect.value === 'Malam') {
          shiftItems[2].style.backgroundColor = '#eef2ff';
        }
      }
    });
  </script>
</body>
</html>
