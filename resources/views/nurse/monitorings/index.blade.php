<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monitoring Pasien - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
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
        --radius: 16px;
    }

    body {
        font-family: 'Inter', sans-serif;
        background: #f8fafc;
        padding: 100px 20px 40px;
        color: var(--text-color);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .card {
        background: var(--white);
        border-radius: var(--radius);
        box-shadow: var(--shadow);
        padding: 32px;
        margin-bottom: 30px;
        border: 1px solid rgba(96, 165, 250, 0.1);
        transition: 0.3s ease;
    }

    .card:hover { box-shadow: var(--shadow-hover); }

    .section-title {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: 700;
    }

    .section-title i {
        color: var(--primary-color);
        background: var(--gradient-light);
        border-radius: 12px;
        padding: 12px;
    }

    .btn {
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 12px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: none;
        transition: 0.3s ease;
        text-decoration: none;
    }
    .btn-primary {
        background: var(--gradient);
        color: white;
        box-shadow: 0 10px 30px rgba(37,99,235,.2);
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 40px rgba(37,99,235,.3);
    }
    .btn-secondary {
        background: #e2e8f0;
        color: #1e293b;
    }
    .btn-secondary:hover {
        background: #cbd5e1;
    }
    .btn-warning { background: #fde68a; color: #92400e; }
    .btn-danger { background: #fca5a5; color: #991b1b; }
    .btn-info   { background: #bae6fd; color: #075985; }

    .btn-wrapper {
        margin: 15px 0 25px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .table-container {
        overflow-x: auto;
        border-radius: var(--radius);
        box-shadow: 0 10px 40px rgba(37, 99, 235, 0.08);
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        background: var(--gradient-light);
        color: var(--primary-color);
        padding: 14px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
    }
    td {
        padding: 16px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 15px;
    }
    tr:hover { background: #f9fafb; }

    .empty-state {
        text-align: center;
        padding: 50px 20px;
        color: var(--text-light);
    }
    .empty-state i { font-size: 60px; margin-bottom: 10px; color: #cbd5e1; }

    .flash {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #bbf7d0;
        border-radius: 12px;
        padding: 12px 18px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-heart-pulse"></i>
        <h3>Monitoring Pasien Rawat Inap</h3>
      </div>

      <div class="btn-wrapper">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
          <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('nurse.monitorings.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Tambah Data
        </a>
      </div>

      @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
      @endif

      @if($monitorings->isEmpty())
        <div class="empty-state">
          <i class="fa-regular fa-hospital"></i>
          <h3>Belum ada data monitoring</h3>
          <p>Perawat belum mencatat kondisi pasien rawat inap.</p>
        </div>
      @else
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Pasien</th>
                <th>Kondisi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($monitorings as $m)
                <tr>
                  <td>{{ $m->id }}</td>
                  <td>{{ $m->patient_name }}</td>
                  <td>{{ $m->condition }}</td>
                  <td>{{ \Carbon\Carbon::parse($m->recorded_at)->format('d M Y H:i') }}</td>
                  <td>
                    <div class="actions" style="display:flex;gap:8px;flex-wrap:wrap;">
                      <a href="{{ route('nurse.monitorings.show', $m->id) }}" class="btn btn-info btn-sm">
                        <i class="fa-solid fa-eye"></i> Detail
                      </a>
                      <a href="{{ route('nurse.monitorings.edit', $m->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen"></i> Edit
                      </a>
                      <form action="{{ route('nurse.monitorings.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                          <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="pagination mt-3">
          {{ $monitorings->links() }}
        </div>
      @endif
    </div>
  </div>
</body>
</html>
