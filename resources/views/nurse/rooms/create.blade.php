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
    }
    body { font-family: 'Inter', sans-serif; background: var(--bg); padding: 100px 20px 40px; }
    .container { max-width: 700px; margin: auto; }
    .card {
      background: #fff; border-radius: var(--radius); box-shadow: var(--shadow);
      padding: 32px; border: 1px solid rgba(96,165,250,0.1);
    }
    .section-title { display:flex; align-items:center; gap:14px; font-size:22px; font-weight:700; margin-bottom:25px; }
    .section-title i { color: var(--primary); background:#e0f2fe; padding:12px; border-radius:12px; }
    label { font-weight:600; margin-bottom:6px; display:block; }
    input, select, textarea {
      width:100%; padding:12px; border-radius:12px; border:1px solid #d1d5db;
      margin-bottom:18px; font-size:15px;
    }
    input:focus, select:focus, textarea:focus { outline:none; border-color: var(--primary); box-shadow:0 0 0 3px rgba(37,99,235,.2); }
    .btn {
      padding:12px 20px; border-radius:12px; font-weight:600; display:inline-flex; align-items:center; gap:8px;
      text-decoration:none; border:none; cursor:pointer; transition:.3s;
    }
    .btn-success { background: var(--gradient); color:#fff; box-shadow:0 8px 20px rgba(37,99,235,.2); }
    .btn-success:hover { transform:translateY(-2px); }
    .btn-secondary { background:#e5e7eb; color:#1f2937; }
    .btn-secondary:hover { background:#d1d5db; }
    .form-actions { display:flex; gap:10px; margin-top:20px; }
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
        <div>
          <label>Nama Ruangan</label>
          <input type="text" name="name" required placeholder="Contoh: Ruang ICU 1">
        </div>
        <div>
          <label>Status</label>
          <select name="status" required>
            <option value="available">Kosong</option>
            <option value="occupied">Terisi</option>
            <option value="maintenance">Maintenance</option>
          </select>
        </div>
        <div>
          <label>Kapasitas</label>
          <input type="number" name="capacity" min="1" required placeholder="Jumlah maksimal pasien">
        </div>
        <div>
          <label>Terisi</label>
          <input type="number" name="occupied" min="0" required placeholder="Jumlah pasien saat ini">
        </div>

        <div class="form-actions">
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
