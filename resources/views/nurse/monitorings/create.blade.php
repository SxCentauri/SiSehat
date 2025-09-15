<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Monitoring Pasien - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        --light-bg: #f8fafc;
        --text-color: #1f2937;
        --text-light: #6b7280;
        --radius: 16px;
        --shadow: 0 20px 50px rgba(37,99,235,0.1);
    }
    body {
        font-family: 'Inter', sans-serif;
        background: var(--light-bg);
        color: var(--text-color);
        padding: 100px 20px 40px;
    }
    .container { max-width: 700px; margin: 0 auto; }
    .card {
        background: white;
        padding: 32px;
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        border: 1px solid rgba(96,165,250,0.1);
    }
    .section-title {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 25px;
        font-size: 22px;
        font-weight: 700;
    }
    .section-title i {
        color: var(--primary-color);
        background: #e0f2fe;
        padding: 12px;
        border-radius: 12px;
    }
    label { font-weight: 600; margin-bottom: 6px; display: block; }
    input, textarea, select {
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        border: 1px solid #d1d5db;
        margin-bottom: 18px;
        font-size: 15px;
    }
    input:focus, textarea:focus, select:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37,99,235,0.2);
    }
    .btn {
        padding: 12px 20px;
        font-size: 15px;
        font-weight: 600;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        transition: 0.3s ease;
    }
    .btn-primary {
        background: var(--gradient);
        color: white;
        box-shadow: 0 10px 30px rgba(37,99,235,0.2);
    }
    .btn-primary:hover { transform: translateY(-2px); }
    .btn-secondary {
        background: #e5e7eb;
        color: var(--text-color);
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-heart-circle-plus"></i>
        <h3>Tambah Monitoring Pasien</h3>
      </div>

      <form action="{{ route('nurse.monitorings.store') }}" method="POST">
        @csrf

        <label>Nama Pasien</label>
        <input type="text" name="patient_name" placeholder="Masukkan nama pasien" required>

        <label>Kondisi</label>
        <select name="condition" required>
          <option value="">-- Pilih Kondisi --</option>
          <option value="Sangat Baik">Sangat Baik</option>
          <option value="Baik">Baik</option>
          <option value="Cukup">Cukup</option>
          <option value="Buruk">Buruk</option>
          <option value="Kritis">Kritis</option>
        </select>

        <label>Catatan</label>
        <textarea name="notes" rows="3" placeholder="Tambahkan catatan jika ada"></textarea>

        <label>Tanggal Dicatat</label>
        <input type="datetime-local" name="recorded_at" required>

        <div style="display:flex; gap:12px; margin-top:20px;">
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-save"></i> Simpan
          </button>
          <a href="{{ route('nurse.monitorings.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
