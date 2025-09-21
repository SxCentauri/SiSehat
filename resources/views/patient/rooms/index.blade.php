<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cek Ruangan - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-bed-pulse"></i>
      <h2 style="margin:0;">Ketersediaan Ruangan</h2>
    </div>

    <div class="card">
      <div class="table-container">
        <table class="table">
          <thead><tr><th>Ruangan</th><th>Status</th><th>Kapasitas</th><th>Terisi</th></tr></thead>
          <tbody>
            @forelse($rooms as $r)
              <tr>
                <td>{{ $r->name }}</td>
                <td><span class="badge">{{ ucfirst($r->status) }}</span></td>
                <td>{{ $r->capacity }}</td>
                <td>{{ $r->occupied }}</td>
              </tr>
            @empty
              <tr><td colspan="4" class="text-muted" style="text-align:center;">Data ruangan kosong.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>
