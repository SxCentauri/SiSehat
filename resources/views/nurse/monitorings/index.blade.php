<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Pasien - MediCare</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 30px;
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        h2 {
            color: #1e40af;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #1e40af;
            border: none;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
        .table th {
            background-color: #e0e7ff;
            color: #1e3a8a;
        }
        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Monitoring Pasien Rawat Inap</h2>
        <a href="{{ route('nurse.monitorings.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pasien</th>
                        <th>Kondisi</th>
                        <th>Tanggal Dicatat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($monitorings as $monitoring)
                        <tr>
                            <td>{{ $monitoring->id }}</td>
                            <td>{{ $monitoring->patient_name }}</td>
                            <td>{{ $monitoring->condition }}</td>
                            <td>{{ $monitoring->recorded_at }}</td>
                            <td>
                                <a href="{{ route('nurse.monitorings.show', $monitoring->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('nurse.monitorings.edit', $monitoring->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('nurse.monitorings.destroy', $monitoring->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Belum ada data monitoring</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $monitorings->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
