<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Ruangan - MediCare</title>
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
      --warning: #f59e0b;
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

    .btn-success {
      background: var(--gradient);
      color: #fff;
      box-shadow: 0 8px 20px rgba(37,99,235,.2);
    }

    .btn-success:hover {
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

    .status-info {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 8px;
    }

    .status-item {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 14px;
    }

    .badge {
      padding: 6px 12px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 13px;
      display: inline-block;
    }

    .badge-success {
      background: #bbf7d0;
      color: #166534;
    }

    .badge-danger {
      background: #fecaca;
      color: #991b1b;
    }

    .badge-warning {
      background: #fde68a;
      color: #92400e;
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
        <i class="fa-solid fa-bed"></i>
        <h3>Tambah Ruangan</h3>
      </div>

      <form action="{{ route('nurse.rooms.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="name">Nama Ruangan</label>
          <input type="text" id="name" name="name" class="form-control" required placeholder="Contoh: Ruang ICU 1">
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select id="status" name="status" class="form-select" required>
            <option value="available">Kosong</option>
            <option value="occupied">Terisi</option>
            <option value="maintenance">Maintenance</option>
          </select>

          <div class="status-info">
            <div class="status-item">
              <span class="badge badge-success">Kosong</span> - Tersedia untuk pasien baru
            </div>
            <div class="status-item">
              <span class="badge badge-danger">Terisi</span> - Sedang digunakan pasien
            </div>
            <div class="status-item">
              <span class="badge badge-warning">Maintenance</span> - Dalam perbaikan
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="capacity">Kapasitas</label>
          <input type="number" id="capacity" name="capacity" class="form-control" min="1" required placeholder="Jumlah maksimal pasien">
        </div>

        <div class="form-group">
          <label for="occupied">Terisi</label>
          <input type="number" id="occupied" name="occupied" class="form-control" min="0" required placeholder="Jumlah pasien saat ini">
        </div>

        <div class="button-group">
          <button type="submit" class="btn btn-success">
            <i class="fa-solid fa-save"></i> Simpan
          </button>
          <a href="{{ route('nurse.rooms.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
