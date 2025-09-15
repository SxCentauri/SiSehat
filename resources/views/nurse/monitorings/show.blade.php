<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Monitoring Pasien - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        --light-bg: #f8fafc;
        --text-color: #1f2937;
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
    .detail-item { margin-bottom: 15px; }
    .detail-item strong { display: inline-block; width: 160px; }
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
    .btn-secondary {
        background: #e5e7eb;
        color: var(--text-color);
    }
    .btn-secondary:hover { background: #d1d5db; }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-circle-info"></i>
        <h3>Detail Monitoring Pasien</h3>
      </div>

      <div class="detail-item">
        <strong>Nama Pasien:</strong> {{ $monitoring->patient_name }}
      </div>
      <div class="detail-item">
        <strong>Kondisi:</strong> {{ $monitoring->condition }}
      </div>
      <div class="detail-item">
        <strong>Catatan:</strong> {{ $monitoring->notes ?? '-' }}
      </div>
      <div class="detail-item">
        <strong>Tanggal Dicatat:</strong> 
        {{ \Carbon\Carbon::parse($monitoring->recorded_at)->format('d M Y H:i') }}
      </div>

      <div style="margin-top:20px;">
        <a href="{{ route('nurse.monitorings.index') }}" class="btn btn-secondary">
          <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
      </div>
    </div>
  </div>
</body>
</html>
