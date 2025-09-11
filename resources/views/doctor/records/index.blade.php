<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Rekam Medis - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary-color: #2563eb;
        --secondary-color: #1e40af;
        --accent-color: #60a5fa;
        --light-blue: #dbeafe;
        --extra-light-blue: #eff6ff;
        --text-color: #1f2937;
        --text-light: #6b7280;
        --white: #ffffff;
        --success-color: #10b981;
        --danger-color: #ef4444;
        --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
        --shadow: 0 20px 50px rgba(37, 99, 235, 0.1);
        --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
        --border-radius: 16px;
    }

    body {
        line-height: 1.6;
        color: var(--text-color);
        background: #f8fafc;
        padding: 100px 20px 40px;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Header Section */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .page-title {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .page-title i {
        color: var(--primary-color);
        font-size: 32px;
        width: 60px;
        height: 60px;
        background: var(--gradient-light);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .page-title h1 {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-color);
    }

    .stats-container {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
    }

    .stat-card {
        background: var(--white);
        padding: 16px 24px;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 12px;
        min-width: 200px;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 20px;
    }

    .stat-info {
        display: flex;
        flex-direction: column;
    }

    .stat-number {
        font-size: 24px;
        font-weight: 700;
        color: var(--secondary-color);
    }

    .stat-label {
        font-size: 14px;
        color: var(--text-light);
        font-weight: 500;
    }

    /* Card Styles */
    .card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 32px;
        transition: all 0.3s ease;
        border: 1px solid rgba(96, 165, 250, 0.1);
        margin-bottom: 30px;
    }

    .card:hover {
        box-shadow: var(--shadow-hover);
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        border-radius: var(--border-radius);
        box-shadow: 0 10px 40px rgba(37, 99, 235, 0.08);
        margin: 24px 0;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
        border-radius: var(--border-radius);
        overflow: hidden;
    }

    .table th {
        background: var(--gradient-light);
        color: var(--primary-color);
        padding: 18px 16px;
        font-weight: 600;
        text-align: left;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .table td {
        padding: 20px 16px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 15px;
        vertical-align: middle;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    .table tr:hover {
        background: #f8fafc;
    }

    /* Badge Styles */
    .badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: center;
    }

    .badge-success {
        background: #dcfce7;
        color: #166534;
    }

    .badge-warning {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-info {
        background: #dbeafe;
        color: #1e40af;
    }

    /* Button Styles */
    .btn {
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
        text-decoration: none;
    }

    .btn-primary {
        background: var(--gradient);
        color: white;
        box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
    }

    .btn-outline {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
    }

    .btn-outline:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(37, 99, 235, 0.2);
    }

    .btn-sm {
        padding: 8px 14px;
        font-size: 13px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state i {
        font-size: 64px;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 22px;
        color: var(--text-light);
        margin-bottom: 12px;
        font-weight: 600;
    }

    .empty-state p {
        color: var(--text-light);
        max-width: 400px;
        margin: 0 auto 24px;
        line-height: 1.6;
    }

    /* Info Jumlah Data */
    .data-count-info {
        text-align: center;
        margin-top: 20px;
        color: var(--text-light);
        font-size: 14px;
        font-weight: 500;
        padding: 12px;
        background: var(--extra-light-blue);
        border-radius: var(--border-radius);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        body {
            padding: 90px 15px 30px;
        }
        
        .card {
            padding: 24px;
        }
        
        .page-title h1 {
            font-size: 24px;
        }
        
        .page-title i {
            width: 50px;
            height: 50px;
            font-size: 24px;
        }
        
        .stat-card {
            min-width: 180px;
            padding: 14px 20px;
        }
    }

    @media (max-width: 768px) {
        body {
            padding: 80px 10px 20px;
        }
        
        .page-header {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }
        
        .page-title {
            justify-content: center;
        }
        
        .stats-container {
            justify-content: center;
        }
        
        .card {
            padding: 20px;
            border-radius: 14px;
        }
        
        .table th, .table td {
            padding: 14px 10px;
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .page-title h1 {
            font-size: 20px;
        }
        
        .page-title i {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
        
        .stat-card {
            flex: 1;
            min-width: unset;
        }
        
        .stat-number {
            font-size: 20px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
        
        .table th:nth-child(3),
        .table td:nth-child(3),
        .table th:nth-child(4),
        .table td:nth-child(4) {
            display: none;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        animation: fadeIn 0.6s ease-out;
    }

    .stat-card {
        animation: fadeIn 0.6s ease-out;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
  </style>
</head>
<body>
    @include('layouts.medicare')
  <div class="container">
    <!-- Header dengan Statistik -->
    <div class="page-header">
      <div class="page-title">
        <i class="fa-solid fa-file-medical"></i>
        <h1>Daftar Rekam Medis</h1>
      </div>
      
      <div class="stats-container">
        <div class="stat-card">
          <div class="stat-icon">
            <i class="fa-solid fa-file-medical"></i>
          </div>
          <div class="stat-info">
            <div class="stat-number">{{ $records->count() }}</div>
            <div class="stat-label">Total Rekam Medis</div>
          </div>
        </div>
        
        <div class="stat-card">
          <div class="stat-icon">
            <i class="fa-solid fa-user-injured"></i>
          </div>
          <div class="stat-info">
            <div class="stat-number">{{ $records->groupBy('patient_id')->count() }}</div>
            <div class="stat-label">Pasien Ditangani</div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      @if($records->isEmpty())
        <div class="empty-state">
          <i class="fa-regular fa-file-medical"></i>
          <h3>Belum Ada Rekam Medis</h3>
          <p>Anda belum memiliki rekam medis. Rekam medis akan muncul setelah Anda membuatnya dari janji temu pasien.</p>
          <a href="{{ route('doctor.appointments.index') }}" class="btn btn-primary">
            <i class="fa-solid fa-calendar-days"></i> Lihat Janji Temu
          </a>
        </div>
      @else
        <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Pasien</th>
                <th>Diagnosis</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($records as $record)
                <tr>
                  <td>
                    <div style="font-weight: 600;">{{ $record->created_at->format('d M Y') }}</div>
                    <div style="font-size: 13px; color: var(--text-light);">{{ $record->created_at->format('H:i') }}</div>
                  </td>
                  <td>
                    <div style="font-weight: 600;">{{ $record->patient->name ?? 'N/A' }}</div>
                    <div style="font-size: 13px; color: var(--text-light);">ID: {{ $record->patient_id }}</div>
                  </td>
                  <td>
                    @if($record->diagnosis)
                      {{ Str::limit($record->diagnosis, 50) }}
                    @else
                      <span style="color: var(--text-light); font-style: italic;">Belum ada diagnosis</span>
                    @endif
                    
                    @if($record->complaints)
                      <div style="font-size: 13px; color: var(--text-light); margin-top: 4px;">
                        Keluhan: {{ Str::limit($record->complaints, 30) }}
                      </div>
                    @endif
                  </td>
                  <td>
                    @php
                      $ongoingTreatments = $record->treatments->where('status', 'ongoing')->count();
                      $totalTreatments = $record->treatments->count();
                    @endphp
                    
                    @if($ongoingTreatments > 0)
                      <span class="badge badge-warning">Dalam Perawatan ({{ $ongoingTreatments }})</span>
                    @elseif($totalTreatments > 0)
                      <span class="badge badge-success">Selesai</span>
                    @else
                      <span class="badge badge-info">Konsultasi</span>
                    @endif
                  </td>
                  <td>
                    <a class="btn btn-outline btn-sm" href="{{ route('doctor.records.show', $record) }}">
                      <i class="fa-solid fa-eye"></i> Detail
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Info jumlah data -->
        <div class="data-count-info">
          Menampilkan semua {{ $records->count() }} rekam medis
        </div>
      @endif
    </div>
  </div>
</body>
</html>