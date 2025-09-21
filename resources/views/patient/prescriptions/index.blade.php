<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep Saya - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-prescription-bottle-medical"></i>
      <h2 style="margin:0;">Resep Saya</h2>
    </div>

    @if($items->isEmpty())
      <div class="card"><p class="text-muted" style="text-align:center;margin:8px 0;">Belum ada resep.</p></div>
    @else
      <div class="card">
        <div class="table-container">
          <table class="table">
            <thead><tr><th>Kode</th><th>Dokter</th><th>Status</th><th>Aksi</th></tr></thead>
            <tbody>
              @foreach($items as $rx)
                <tr>
                  <td>#{{ $rx->id }}</td>
                  <td>{{ $rx->doctor->name ?? '#'.$rx->doctor_id }}</td>
                  <td><span class="badge {{ $rx->status }}">{{ ucfirst($rx->status) }}</span></td>
                  <td class="actions">
                    <a class="btn btn-primary btn-sm" href="{{ route('patient.prescriptions.show', $rx) }}">
                      <i class="fa-solid fa-eye"></i> Lihat
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        @if(method_exists($items,'links'))
          <div style="margin-top:10px;">{{ $items->links() }}</div>
        @endif
      </div>
    @endif
  </main>
</body>
</html>
