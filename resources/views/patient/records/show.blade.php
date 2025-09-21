<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Catatan Medis - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-notes-medical"></i>
      <h2 style="margin:0;">Detail Riwayat Medis</h2>
    </div>

    <div class="card">
      <div class="grid grid-2">
        <div>
          <div><strong>Keluhan:</strong> {{ $record->complaints ?? '-' }}</div>
          <div><strong>Diagnosa:</strong> {{ $record->diagnosis ?? '-' }}</div>
          <div><strong>Catatan:</strong> {{ $record->notes ?? '-' }}</div>
        </div>
        <div>
          <div><strong>Dibuat:</strong> {{ $record->created_at->format('d M Y H:i') }}</div>
          <div><strong>Dokter:</strong> {{ $record->doctor->name ?? '#'.$record->doctor_id }}</div>
        </div>
      </div>
    </div>

    <div class="actions">
      <a class="btn btn-outline" href="{{ route('patient.records.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </main>
</body>
</html>
