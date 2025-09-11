<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Booking - MediCare</title>
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

    /* Flash Message */
    .flash {
        padding: 16px 24px;
        background: #dcfce7;
        color: #166534;
        border-radius: var(--border-radius);
        margin-bottom: 30px;
        font-weight: 600;
        border: 1px solid #bbf7d0;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.15);
    }

    .flash i {
        font-size: 20px;
    }

    /* Card Styles */
    .card {
        background: #fff;
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        padding: 32px;
        margin-bottom: 30px;
        transition: all 0.3s ease;
        border: 1px solid rgba(96, 165, 250, 0.1);
    }

    .card:hover {
        box-shadow: var(--shadow-hover);
    }

    /* Section Title */
    .section-title {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        font-size: 24px;
        font-weight: 700;
        color: var(--text-color);
    }

    .section-title i {
        color: var(--primary-color);
        font-size: 22px;
        width: 50px;
        height: 50px;
        background: var(--gradient-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Text Utilities */
    .text-muted {
        color: var(--text-light);
        font-size: 16px;
        line-height: 1.6;
        text-align: center;
        padding: 40px 0;
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
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: center;
        min-width: 100px;
    }

    .badge-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-approved {
        background: #dcfce7;
        color: #166534;
    }

    .badge-rejected {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-completed {
        background: #bbf7d0;
        color: #166534;
    }

    .badge-canceled {
        background: #fda4af;
        color: #991b1b;
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
        min-width: 120px;
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
        min-width: 100px;
    }

    /* Actions */
    .actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 30px;
        gap: 8px;
    }

    .pagination-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: white;
        color: var(--text-color);
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .pagination-link:hover, .pagination-link.active {
        background: var(--gradient);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        body {
            padding: 90px 15px 30px;
        }
        
        .card {
            padding: 24px;
        }
        
        .section-title {
            font-size: 22px;
        }
        
        .section-title i {
            width: 45px;
            height: 45px;
            font-size: 20px;
        }
    }

    @media (max-width: 768px) {
        body {
            padding: 80px 10px 20px;
        }
        
        .card {
            padding: 20px;
            border-radius: 14px;
        }
        
        .section-title {
            font-size: 20px;
            flex-direction: column;
            text-align: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .section-title i {
            width: 40px;
            height: 40px;
            font-size: 18px;
        }
        
        .table th, .table td {
            padding: 14px 10px;
            font-size: 14px;
        }
        
        .badge {
            padding: 6px 10px;
            font-size: 12px;
            min-width: 80px;
        }
        
        .btn, .btn-sm {
            width: 100%;
            min-width: unset;
        }
        
        .actions {
            flex-direction: column;
            align-items: stretch;
        }
        
        .table-mobile-label {
            display: none;
        }
    }

    @media (max-width: 640px) {
        .table th:nth-child(5),
        .table td:nth-child(5) {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .section-title {
            font-size: 18px;
        }
        
        .flash {
            padding: 14px 20px;
            font-size: 14px;
        }
        
        .table th:nth-child(2),
        .table td:nth-child(2) {
            display: none;
        }
        
        .pagination-link {
            width: 35px;
            height: 35px;
            font-size: 14px;
        }
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 50px 20px;
    }

    .empty-state i {
        font-size: 60px;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        font-size: 20px;
        color: var(--text-light);
        margin-bottom: 10px;
    }

    .empty-state p {
        color: var(--text-light);
        max-width: 400px;
        margin: 0 auto;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')
  <div class="container">
    @if(session('ok')) 
      <div class="flash">
        <i class="fa-solid fa-circle-check"></i> {{ session('ok') }}
      </div> 
    @endif

    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-list-check"></i>
        <h3>Daftar Booking</h3>
      </div>

      @if($appointments->isEmpty())
        <div class="empty-state">
          <i class="fa-regular fa-calendar-xmark"></i>
          <h3>Belum ada booking</h3>
          <p>Belum ada janji temu yang perlu ditangani saat ini.</p>
        </div>
      @else
        <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Pasien</th>
                <th>Status</th>
                <th class="table-mobile-label">Alasan</th>
                <th style="min-width:260px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($appointments as $a)
                <tr>
                  <td>{{ \Carbon\Carbon::parse($a->date)->format('d M Y') }}</td>
                  <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
                  <td>{{ $a->patient->name ?? 'Pasien #'.$a->patient_id }}</td>
                  <td>
                    <span class="badge badge-{{ $a->status }}">{{ ucfirst($a->status) }}</span>
                  </td>
                  <td class="table-mobile-label">{{ Str::limit($a->reason, 30) }}</td>
                  <td>
                    <div class="actions">
                      @if($a->status === 'pending')
                        <form method="POST" action="{{ route('doctor.appointments.approve', $a) }}">
                          @csrf 
                          <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fa-solid fa-check"></i> Approve
                          </button>
                        </form>
                        <form method="POST" action="{{ route('doctor.appointments.reject', $a) }}">
                          @csrf 
                          <button class="btn btn-outline btn-sm" type="submit">
                            <i class="fa-solid fa-xmark"></i> Tolak
                          </button>
                        </form>
                      @endif

                      @if($a->status === 'approved')
                        <form method="POST" action="{{ route('doctor.appointments.complete', $a) }}">
                          @csrf 
                          <button class="btn btn-primary btn-sm" type="submit">
                            <i class="fa-solid fa-flag-checkered"></i> Selesai
                          </button>
                        </form>
                        <a class="btn btn-outline btn-sm" href="{{ route('doctor.records.create', $a) }}">
                          <i class="fa-solid fa-notes-medical"></i> Rekam Medis
                        </a>
                      @endif
                      
                      @if(in_array($a->status, ['completed', 'rejected', 'canceled']))
                        <span class="text-muted" style="font-size: 13px;">Tidak ada aksi</span>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="pagination">
          {{ $appointments->links() }}
        </div>
      @endif
    </div>
  </div>

  <script>
    // Menambahkan efek interaktif pada tabel
    document.addEventListener('DOMContentLoaded', function() {
      const tableRows = document.querySelectorAll('.table tbody tr');
      
      tableRows.forEach(row => {
        row.addEventListener('click', function(e) {
          if (!e.target.closest('button') && !e.target.closest('a')) {
            this.style.backgroundColor = '#f1f5f9';
            setTimeout(() => {
              this.style.backgroundColor = '';
            }, 300);
          }
        });
      });
      
      // Improvisasi pagination styling
      const paginationLinks = document.querySelectorAll('.pagination a');
      paginationLinks.forEach(link => {
        link.classList.add('pagination-link');
        if (link.innerHTML.includes('Previous')) {
          link.innerHTML = '<i class="fas fa-chevron-left"></i>';
        } else if (link.innerHTML.includes('Next')) {
          link.innerHTML = '<i class="fas fa-chevron-right"></i>';
        }
        
        if (link.classList.contains('active')) {
          link.classList.add('active');
        }
      });
    });
  </script>
</body>
</html>