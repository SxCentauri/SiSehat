<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Jadwal - MediCare</title>
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
      --danger: #ef4444;
      --success: #10b981;
      --warning: #f59e0b;
      --info: #3b82f6;
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
    }

    .container {
      max-width: 800px;
      margin: auto;
      padding: 100px 20px 40px;
    }

    .card {
      background: #fff;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      padding: 32px;
      border: 1px solid rgba(96,165,250,0.1);
    }

    .section-title {
      display: flex;
      align-items: center;
      gap: 14px;
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 25px;
    }

    .section-title i {
      color: var(--primary);
      background: #e0f2fe;
      padding: 12px;
      border-radius: 12px;
      min-width: 46px;
      text-align: center;
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

    textarea.form-control {
      min-height: 120px;
      resize: vertical;
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
      transition: .3s;
      font-size: 14px;
    }

    .btn-primary {
      background: var(--gradient);
      color: #fff;
      box-shadow: 0 8px 20px rgba(37,99,235,.2);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(37,99,235,.3);
    }

    .btn-secondary {
      background: #e5e7eb;
      color: #1f2937;
    }

    .btn-secondary:hover {
      background: #d1d5db;
    }

    .button-group {
      display: flex;
      gap: 12px;
      margin-top: 32px;
      flex-wrap: wrap;
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
      color: #f59e0b;
    }

    .badge-malam {
      background-color: #e0e7ff;
      color: #6366f1;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
      .container {
        padding: 90px 15px 30px;
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
        padding: 80px 12px 20px;
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

      .shift-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .badge {
        margin-bottom: 8px;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')
  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-calendar-plus"></i>
        <h3>Tambah Jadwal</h3>
      </div>

      <form action="{{ route('nurse.schedules.store') }}" method="POST">
                @csrf
                <div>
                <label for="nurse_name">Nama Perawat</label>
                <input
                    type="text"
                    id="nurse_name"
                    class="form-control"
                    value="{{ $nurseName }}"
                    readonly
                    disabled
                >
                </div>
                <div class="form-group">
                    <label for="shift">Shift</label>
                    <select id="shift" name="shift" class="form-select" required>
                        <option value="" disabled selected>Pilih shift...</option>
                        <option value="Pagi">Pagi (07:00 - 14:00)</option>
                        <option value="Siang">Siang (14:00 - 21:00)</option>
                        <option value="Malam">Malam (21:00 - 07:00)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="task">Tugas Utama</label>
                    <textarea id="task" name="task" class="form-control" required placeholder="Contoh: Bertugas di ruang UGD, memonitor pasien di kamar 101, ...">{{ old('task') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="date" id="date" name="date" class="form-control" required value="{{ old('date') }}">
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save"></i> Simpan Jadwal
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

      shiftSelect.addEventListener('change', function() {
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
      });
    });
  </script>
</body>
</html>
