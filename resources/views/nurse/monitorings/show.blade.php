<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Monitoring Pasien</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>👩‍⚕️ Detail Monitoring Pasien</h2>

        <div class="card p-3">
            <p><strong>Nama Pasien:</strong> {{ $monitoring->patient_name }}</p>
            <p><strong>Kondisi:</strong> {{ $monitoring->condition }}</p>
            <p><strong>Catatan:</strong> {{ $monitoring->notes ?? '-' }}</p>
            <p><strong>Tanggal Dicatat:</strong> {{ $monitoring->recorded_at }}</p>
        </div>

        <a href="{{ route('nurse.monitorings.index') }}" class="btn btn-secondary mt-3">⬅ Kembali</a>
    </div>
</body>
</html>
