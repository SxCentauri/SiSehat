<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Catatan Medis - MediCare</title>
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
      max-width: 1200px;
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
      margin-bottom: 20px;
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

    .header-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
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

    .btn-outline {
      background: transparent;
      color: var(--primary);
      border: 1px solid var(--primary);
    }

    .btn-outline:hover {
      background: var(--primary);
      color: white;
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

    .btn-sm {
      padding: 10px 16px;
      font-size: 13px;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
      margin-bottom: 24px;
    }

    .info-section {
      background: #f8fafc;
      padding: 20px;
      border-radius: 12px;
      border: 1px solid var(--border);
    }

    .info-section h3 {
      font-size: 16px;
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 16px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-section h3 i {
      font-size: 14px;
    }

    .info-item {
      margin-bottom: 16px;
      padding-bottom: 16px;
      border-bottom: 1px solid var(--border);
    }

    .info-item:last-child {
      margin-bottom: 0;
      padding-bottom: 0;
      border-bottom: none;
    }

    .info-label {
      font-size: 14px;
      font-weight: 600;
      color: var(--text-light);
      margin-bottom: 4px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .info-label i {
      font-size: 12px;
      color: var(--primary);
    }

    .info-value {
      font-size: 15px;
      color: var(--text);
      line-height: 1.5;
    }

    .notes-content {
      background: white;
      padding: 16px;
      border-radius: 8px;
      border: 1px solid var(--border);
      margin-top: 8px;
      line-height: 1.6;
    }

    .actions {
      display: flex;
      justify-content: flex-start;
      margin-top: 24px;
    }

    /* Responsive Styles - PERBAIKAN UTAMA */
    @media (max-width: 1200px) {
      .container {
        max-width: 100%;
        padding: 0 20px 30px;
      }
    }

    @media (max-width: 1024px) {
      .header {
        flex-direction: row;
        justify-content: space-between;
      }
      
      .info-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
      }
    }

    @media (max-width: 768px) {
      .container {
        padding: 0 15px 25px;
      }

      .card {
        padding: 24px;
      }

      .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }

      .header-content {
        flex-direction: row;
        text-align: left;
        gap: 12px;
        width: 100%;
      }

      .header h2 {
        font-size: 22px;
      }

      .header-actions {
        width: 100%;
        justify-content: flex-start;
      }

      .info-grid {
        grid-template-columns: 1fr;
        gap: 16px;
      }

      .info-section {
        padding: 18px;
      }
      
      .info-item {
        margin-bottom: 14px;
        padding-bottom: 14px;
      }
      
      .info-value {
        font-size: 14px;
      }
      
      .notes-content {
        padding: 14px;
        font-size: 14px;
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

      .header-actions {
        flex-direction: column;
        width: 100%;
      }

      .btn {
        width: 100%;
        justify-content: center;
      }
      
      .info-section {
        padding: 16px;
      }
      
      .info-section h3 {
        font-size: 15px;
        margin-bottom: 14px;
      }
      
      .info-label {
        font-size: 13px;
      }
      
      .info-value {
        font-size: 14px;
      }
      
      .notes-content {
        padding: 12px;
        font-size: 13px;
      }
    }

    @media (max-width: 480px) {
      .container {
        padding: 0 10px 15px;
      }
      
      .card {
        padding: 16px;
        border-radius: 12px;
      }
      
      .header h2 {
        font-size: 18px;
      }
      
      .header-content i {
        padding: 10px;
        min-width: 42px;
        font-size: 16px;
      }
      
      .info-section {
        padding: 14px;
      }
      
      .info-section h3 {
        font-size: 14px;
        margin-bottom: 12px;
      }
      
      .info-item {
        margin-bottom: 12px;
        padding-bottom: 12px;
      }
      
      .info-label {
        font-size: 12px;
      }
      
      .info-value {
        font-size: 13px;
      }
      
      .notes-content {
        padding: 10px;
        font-size: 12px;
      }
      
      .btn {
        padding: 10px 16px;
        font-size: 13px;
      }
    }

    @media (max-width: 360px) {
      .container {
        padding: 0 8px 12px;
      }
      
      .card {
        padding: 14px;
      }
      
      .header h2 {
        font-size: 16px;
      }
      
      .header-content i {
        padding: 8px;
        min-width: 38px;
        font-size: 14px;
      }
      
      .info-section {
        padding: 12px;
      }
      
      .info-section h3 {
        font-size: 13px;
      }
      
      .info-label {
        font-size: 11px;
      }
      
      .info-value {
        font-size: 12px;
      }
      
      .notes-content {
        padding: 8px;
        font-size: 11px;
      }
      
      .btn {
        padding: 8px 12px;
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
    .btn:focus, a:focus {
      outline: 2px solid var(--primary);
      outline-offset: 2px;
    }
    
    /* Perbaikan untuk hover effects di mobile */
    @media (max-width: 768px) {
      .card:hover {
        transform: none; /* Nonaktifkan transform hover di mobile */
      }
      
      .btn:hover {
        transform: none; /* Nonaktifkan transform hover di mobile */
      }
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="card">
      <div class="header">
        <div class="header-content">
          <i class="fa-solid fa-notes-medical"></i>
          <h2>Detail Riwayat Medis</h2>
        </div>
        <div class="header-actions">
            <a href="{{ route('patient.records.index') }}" class="btn btn-secondary btn-sm">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Riwayat Medis
            </a>
        </div>
      </div>

      <div class="info-grid">
        <div class="info-section">
          <h3><i class="fa-solid fa-stethoscope"></i> Informasi Medis</h3>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-comment-medical"></i>
              Keluhan Utama
            </div>
            <div class="info-value">{{ $record->complaints ?? '-' }}</div>
          </div>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-diagnoses"></i>
              Diagnosis
            </div>
            <div class="info-value">{{ $record->diagnosis ?? '-' }}</div>
          </div>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-file-medical"></i>
              Catatan Medis
            </div>
            <div class="info-value">
              @if($record->notes)
                <div class="notes-content">{{ $record->notes }}</div>
              @else
                -
              @endif
            </div>
          </div>
        </div>

        <div class="info-section">
          <h3><i class="fa-solid fa-calendar-check"></i> Informasi Konsultasi</h3>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-calendar"></i>
              Tanggal Konsultasi
            </div>
            <div class="info-value">{{ $record->created_at->format('d M Y H:i') }}</div>
          </div>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-user-md"></i>
              Dokter Penangani
            </div>
            <div class="info-value">{{ $record->doctor->name ?? '#'.$record->doctor_id }}</div>
          </div>

          <div class="info-item">
            <div class="info-label">
              <i class="fa-solid fa-id-card"></i>
              ID Catatan
            </div>
            <div class="info-value">#{{ $record->id }}</div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Add animation to info sections
      const infoSections = document.querySelectorAll('.info-section');
      infoSections.forEach((section, index) => {
        section.style.animationDelay = `${index * 0.2}s`;
        section.style.animation = 'fadeIn 0.6s ease-out';
      });

      // Add hover effects to info items (hanya di desktop)
      if (window.innerWidth > 768) {
        const infoItems = document.querySelectorAll('.info-item');
        infoItems.forEach(item => {
          item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
          });
          item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
          });
        });
      }
    });
  </script>
</body>
</html>