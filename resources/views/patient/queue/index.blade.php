<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Antrian Saya - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-list-ol"></i>
      <h2 style="margin:0;">Antrian Saya</h2>
    </div>

    <div class="card">
      <div class="table-container">
        <table class="table">
          <thead><tr><th>No Antrian</th><th>Tanggal</th><th>Status</th></tr></thead>
          <tbody>
            @forelse($queues as $q)
              <tr>
                <td>{{ $q->queue_number }}</td>
                <td>{{ optional($q->scheduled_date)->format('d M Y') }}</td>
                <td><span class="badge {{ $q->status }}">{{ ucfirst($q->status) }}</span></td>
              </tr>
            @empty
              <tr><td colspan="3" class="text-muted" style="text-align:center;">Belum ada antrian.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      @if(method_exists($queues,'links'))
        <div style="margin-top:10px;">{{ $queues->links() }}</div>
      @endif
    </div>
  </main>
</body>
</html>
