<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jadwal Perawat - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <style>
    :root{
      --primary:#2563eb; --primary-dark:#1e40af; --text:#1f2937; --text-light:#6b7280;
      --bg:#f8fafc; --card:#ffffff; --border:#e5e7eb; --radius:16px; --shadow:0 10px 25px rgba(0,0,0,.05)
    }
    *{box-sizing:border-box;margin:0;padding:0}
    body{font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto;background:var(--bg);color:var(--text);line-height:1.6;padding-top:80px}
    .container{max-width:1200px;margin:auto;padding:0 20px 40px}
    .card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);padding:32px;box-shadow:var(--shadow);transition:.3s}
    .card:hover{transform:translateY(-2px)}
    .section-title{display:flex;gap:14px;align-items:center;margin-bottom:22px}
    .section-title i{color:var(--primary);background:#e0f2fe;padding:12px;border-radius:12px;min-width:46px;text-align:center}
    .section-title h3{font-size:24px;font-weight:700}
    .button-group{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:16px}
    .btn{display:inline-flex;gap:8px;align-items:center;padding:12px 20px;border-radius:12px;border:1px solid transparent;font-weight:600;font-size:14px;text-decoration:none}
    .btn-primary{background:var(--primary);color:#fff}.btn-primary:hover{background:var(--primary-dark)}
    .btn-secondary{background:#f1f5f9;color:var(--text);border-color:var(--border)}
    .btn-warning{background:#fef3c7;color:#b45309;border-color:#fef3c7}
    .btn-danger{background:#fee2e2;color:#b91c1c;border-color:#fee2e2}
    .btn-sm{padding:10px 16px;font-size:13px}
    .alert-success{background:#f0fdf4;color:#166534;border:1px solid #bbf7d0;border-radius:10px;padding:14px 16px;margin-bottom:16px;display:flex;gap:10px;align-items:center}
    .table-container{border:1px solid var(--border);border-radius:10px;overflow:hidden;margin:20px 0}
    table{width:100%;border-collapse:collapse}
    thead{background:#f8fafc}
    th{padding:16px 20px;text-align:left;font-weight:600;color:var(--text-light);font-size:13px;letter-spacing:.4px;border-bottom:1px solid var(--border);text-transform:uppercase}
    td{padding:16px 20px;border-bottom:1px solid var(--border);font-size:14.5px;vertical-align:middle}
    tbody tr:hover{background:#f8fafc}
    .badge{display:inline-flex;align-items:center;padding:8px 12px;border-radius:10px;font-size:12px;font-weight:600;background:#f3f4f6;color:#111827}
    .action-group{display:flex;gap:8px;flex-wrap:wrap}
    .empty{text-align:center;color:var(--text-light);padding:52px 16px}
    .pagination{display:flex;justify-content:center;margin-top:18px;gap:8px;flex-wrap:wrap}
    @media (max-width: 768px){.card{padding:24px}.btn{width:100%;justify-content:center}.btn-sm{width:auto}}
    @media (max-width: 640px){
      .table-container{border:none}
      table, thead, tbody, th, td, tr{display:block} thead{display:none}
      tr{background:#fff;border:1px solid var(--border);border-radius:12px;margin-bottom:12px;padding:10px 10px 6px;box-shadow:0 4px 12px rgba(0,0,0,.04)}
      td{border:none;border-bottom:1px solid var(--border);position:relative;padding:10px 12px 10px 46%;min-height:40px;display:flex;align-items:center}
      td:last-child{border-bottom:none}
      td::before{content:attr(data-label);position:absolute;left:12px;top:50%;transform:translateY(-50%);width:42%;font-weight:600;color:var(--text-light);white-space:nowrap}
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card" role="region" aria-label="Daftar Jadwal Perawat">
      <div class="section-title">
        <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
        <h3>Jadwal Perawat</h3>
      </div>

      <div class="button-group" aria-label="Aksi Halaman">
        <a href="{{ route('nurse.schedules.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus" aria-hidden="true"></i> Tambah Jadwal
        </a>
        <a href="{{ route('nurse.dashboard') }}" class="btn btn-secondary">
          <i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Kembali Dashboard
        </a>
      </div>

      @if(session('ok'))
        <div class="alert-success" role="status">
          <i class="fa-solid fa-circle-check" aria-hidden="true"></i> {{ session('ok') }}
        </div>
      @endif

      @if($schedules->isEmpty())
        <div class="empty" role="note">
          <i class="fa-regular fa-calendar-xmark" aria-hidden="true"></i>
          <p>Belum ada jadwal</p>
        </div>
      @else
        <div class="table-container">
          <table role="table" aria-label="Tabel Jadwal Perawat">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tugas</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($schedules as $schedule)
                <tr>
                  <td data-label="ID">{{ $schedule->id }}</td>

                  <td data-label="Nama">
                    <span class="badge">{{ $schedule->nurse_name ?? ($schedule->nurse->name ?? '-') }}</span>
                  </td>

                  {{-- HANYA task (fallback ke notes). Tidak lagi merangkai hari/jam. --}}
                  <td data-label="Tugas">
                    {{ $schedule->task ?: ($schedule->notes ?? '—') }}
                  </td>

                  {{-- Tanggal hanya dari schedule_date biar sama seperti form create perawat --}}
                  <td data-label="Tanggal">
                    @if($schedule->schedule_date)
                      {{ \Carbon\Carbon::parse($schedule->schedule_date)->format('d M Y') }}
                    @else
                      —
                    @endif
                  </td>

                  <td data-label="Aksi">
                    <div class="action-group">
                      <a href="{{ route('nurse.schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen"></i> Edit
                      </a>
                      <form action="{{ route('nurse.schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Yakin hapus jadwal ini?')" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
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

        <div class="pagination" aria-label="Navigasi Halaman">
          {{ $schedules->links() }}
        </div>
      @endif
    </div>
  </div>

  <script>
    // Auto-apply data-label (untuk tampilan mobile kartu)
    document.addEventListener('DOMContentLoaded', function () {
      function syncLabels() {
        const headers = Array.from(document.querySelectorAll('thead th')).map(th => th.textContent.trim());
        document.querySelectorAll('tbody tr').forEach(row => {
          row.querySelectorAll('td').forEach((cell, i) => {
            if (!cell.getAttribute('data-label') && headers[i]) {
              cell.setAttribute('data-label', headers[i]);
            }
          });
        });
      }
      syncLabels();
      let t; window.addEventListener('resize', ()=>{clearTimeout(t); t=setTimeout(syncLabels,120);});
    });
  </script>
</body>
</html>
