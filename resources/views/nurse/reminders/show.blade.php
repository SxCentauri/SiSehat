<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Reminder Obat - MediCare</title>
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
      margin-bottom: 24px;
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

    .detail-item {
      display: flex;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #e5e7eb;
    }

    .detail-item:last-child {
      border-bottom: none;
      margin-bottom: 0;
      padding-bottom: 0;
    }

    .detail-label {
      min-width: 120px;
      font-weight: 600;
      color: #374151;
    }

    .detail-value {
      flex: 1;
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

    .medication-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background: #e0f2fe;
      color: var(--primary);
      border-radius: 10px;
      margin-right: 12px;
    }

    .time-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 6px 12px;
      background: #ffedd5;
      color: #ea580c;
      border-radius: 8px;
      font-weight: 600;
      font-size: 14px;
    }

    .notes-container {
      background: #f9fafb;
      padding: 16px;
      border-radius: 10px;
      border-left: 4px solid var(--primary);
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

      .detail-item {
        flex-direction: column;
        gap: 8px;
      }

      .detail-label {
        min-width: auto;
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

      .btn {
        width: 100%;
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')
  <div class="container">
    <div class="section-title">
      <i class="fa-solid fa-pills"></i>
      <h3>Detail Reminder Obat</h3>
    </div>

    <div class="card">
      <div class="detail-item">
        <div class="detail-label">Nama Pasien</div>
        <div class="detail-value">
          <div class="medication-icon">
            <i class="fa-solid fa-user"></i>
          </div>
          {{ $reminder->patient_name }}
        </div>
      </div>

      <div class="detail-item">
        <div class="detail-label">Obat</div>
        <div class="detail-value">
          <div class="medication-icon">
            <i class="fa-solid fa-pills"></i>
          </div>
          {{ $reminder->medication }}
        </div>
      </div>

      <div class="detail-item">
        <div class="detail-label">Dosis</div>
        <div class="detail-value">
          <div class="medication-icon">
            <i class="fa-solid fa-syringe"></i>
          </div>
          {{ $reminder->dosage }}
        </div>
      </div>

      <div class="detail-item">
        <div class="detail-label">Waktu</div>
        <div class="detail-value">
          <span class="time-badge">
            <i class="fa-solid fa-clock"></i>
            {{ $reminder->time }}
          </span>
        </div>
      </div>

      <div class="detail-item">
        <div class="detail-label">Catatan</div>
        <div class="detail-value">
          <div class="notes-container">
            {{ $reminder->notes ? $reminder->notes : 'Tidak ada catatan tambahan' }}
          </div>
        </div>
      </div>
    </div>

    <a href="{{ route('nurse.reminders.index') }}" class="btn btn-primary">
      <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Reminder
    </a>
  </div>
</body>
</html>
