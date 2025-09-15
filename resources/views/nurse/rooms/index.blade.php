<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Ruangan - MediCare</title>
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
    .container { max-width: 1200px; margin: auto; }
    .card {
      background: #fff; border-radius: var(--radius); box-shadow: var(--shadow);
      padding: 32px; border: 1px solid rgba(96,165,250,0.1);
    }
    .section-title { display:flex; align-items:center; gap:14px; font-size:22px; font-weight:700; margin-bottom:25px; }
    .section-title i { color: var(--primary); background:#e0f2fe; padding:12px; border-radius:12px; }
    .btn {
      padding:10px 18px; border-radius:12px; font-weight:600; display:inline-flex; align-items:center; gap:8px;
      text-decoration:none; border:none; cursor:pointer; transition:.3s;
    }
    .btn-primary { background: var(--gradient); color:#fff; box-shadow:0 8px 20px rgba(37,99,235,.2); }
    .btn-primary:hover { transform:translateY(-2px); }
    .btn-warning { background:#fde68a; color:#92400e; }
    .btn-danger { background:#fca5a5; color:#991b1b; }
    .btn-info { background:#bae6fd; color:#075985; }
    .btn-secondary { background:#e5e7eb; color:#1f2937; }
    .btn-secondary:hover { background:#d1d5db; }
    .table-container { overflow-x:auto; border-radius:var(--radius); box-shadow:0 10px 30px rgba(0,0,0,0.05); }
    table { width:100%; border-collapse:collapse; }
    th { background:#eff6ff; color:var(--primary); padding:14px; text-align:left; font-size:14px; text-transform:uppercase; }
    td { padding:14px; border-bottom:1px solid #f1f5f9; font-size:15px; }
    .badge { padding:6px 12px; border-radius:8px; font-weight:600; font-size:13px; }
    .bg-success { background:#bbf7d0; color:#166534; }
    .bg-danger { background:#fecaca; color:#991b1b; }
    .bg-warning { background:#fde68a; color:#92400e; }
    .empty { text-align:center; color:#9ca3af; padding:50px 0; }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    <div class="card">
      <div class="section-title">
        <i class="fa-solid fa-bed"></i>
        <h3>Daftar Ruangan</h3>
      </div>

      <div style="display:flex; gap:10px; margin-bottom:20px;">
        <a href="{{ route('nurse.rooms.create') }}" class="btn btn-primary">
          <i class="fa-solid fa-plus"></i> Tambah Ruangan
        </a>
        <a href="{{ route('nurse.dashboard') }}" class="btn btn-secondary">
          <i class="fa-solid fa-arrow-left"></i> Kembali Dashboard
        </a>
      </div>

      @if(session('success'))
        <div class="alert alert-success" style="margin-bottom:20px; border-radius:12px; padding:12px 16px;">
          {{ session('success') }}
        </div>
      @endif

      @if($rooms->isEmpty())
        <div class="empty">
          <i class="fa-regular fa-hospital fa-2x"></i>
          <p>Belum ada data ruangan</p>
        </div>
      @else
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Ruangan</th>
                <th>Status</th>
                <th>Kapasitas</th>
                <th>Terisi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rooms as $room)
                <tr>
                  <td>{{ $room->id }}</td>
                  <td>{{ $room->name }}</td>
                  <td>
                    @if($room->status == 'available')
                      <span class="badge bg-success">Kosong</span>
                    @elseif($room->status == 'occupied')
                      <span class="badge bg-danger">Terisi</span>
                    @else
                      <span class="badge bg-warning">Maintenance</span>
                    @endif
                  </td>
                  <td>{{ $room->capacity }}</td>
                  <td>{{ $room->occupied }}</td>
                  <td style="display:flex;gap:6px;flex-wrap:wrap;">
                    <a href="{{ route('nurse.rooms.show', $room->id) }}" class="btn btn-info btn-sm" title="Detail">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('nurse.rooms.edit', $room->id) }}" class="btn btn-warning btn-sm" title="Edit">
                      <i class="fa-solid fa-pen"></i>
                    </a>
                    <form action="{{ route('nurse.rooms.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm" title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div style="margin-top:20px;">
          {{ $rooms->links() }}
        </div>
      @endif
    </div>
  </div>
</body>
</html>
