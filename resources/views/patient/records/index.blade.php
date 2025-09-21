<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Medis - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-file-medical"></i>
      <h2 style="margin:0;">Riwayat Medis</h2>
    </div>

    @if($records->isEmpty())
      <div class="card"><p class="text-muted" style="text-align:center;margin:8px 0;">Belum ada catatan medis.</p></div>
    @else
      <ul style="list-style:none;padding:0;margin:0;">
        @foreach($records as $r)
          <li class="card" style="margin:8px 0;">
            <div style="display:flex;justify-content:space-between;gap:10px;align-items:center;">
              <div>
                <div><strong>Diagnosa:</strong> {{ $r->diagnosis ?? '-' }}</div>
                <div class="text-muted">{{ $r->created_at->format('d M Y H:i') }}</div>
              </div>
              <a class="btn btn-outline btn-sm" href="{{ route('patient.records.show', $r) }}">
                <i class="fa-solid fa-eye"></i> Detail
              </a>
            </div>
          </li>
        @endforeach
      </ul>
      @if(method_exists($records,'links'))
        <div style="margin-top:10px;">{{ $records->links() }}</div>
      @endif
    @endif
  </main>
</body>
</html>
