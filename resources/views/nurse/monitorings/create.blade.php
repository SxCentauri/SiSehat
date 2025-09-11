<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Monitoring Pasien - MediCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-primary">➕ Tambah Monitoring Pasien</h2>

        <div class="card shadow-sm p-4">
            <form action="{{ route('nurse.monitorings.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pasien</label>
                    <input type="text" name="patient_name" class="form-control rounded-3" placeholder="Masukkan nama pasien" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kondisi</label>
                    <input type="text" name="condition" class="form-control rounded-3" placeholder="Masukkan kondisi pasien" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Catatan</label>
                    <textarea name="notes" rows="3" class="form-control rounded-3" placeholder="Tambahkan catatan jika ada"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tanggal Dicatat</label>
                    <input type="datetime-local" name="recorded_at" class="form-control rounded-3" required>
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button class="btn btn-success px-4 rounded-3">
                        <i class="fa-solid fa-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('nurse.monitorings.index') }}" class="btn btn-secondary px-4 rounded-3">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
