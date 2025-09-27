<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permintaan Darurat - MediCare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{
            --primary:#2563eb;--primary-dark:#1e40af;--success:#10b981;--warn:#f59e0b;--danger:#ef4444;--critical:#dc2626;
            --bg:#f8fafc;--card:#fff;--text:#1f2937;--muted:#6b7280;--border:#e5e7eb;--radius:16px;
            --shadow:0 10px 25px rgba(0,0,0,.05);--grad:linear-gradient(135deg,var(--primary),var(--primary-dark));
        }
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:Inter,system-ui,Arial;background:var(--bg);color:var(--text);padding-top:80px;line-height:1.6}
        .container{max-width:960px;margin:0 auto;padding:0 20px 40px}
        .card{background:var(--card);border:1px solid var(--border);border-radius:var(--radius);box-shadow:var(--shadow);padding:28px}
        .header{display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;gap:12px;flex-wrap:wrap}
        .title{display:flex;align-items:center;gap:12px;font-weight:800}
        .title i{background:#fee2e2;color:var(--danger);padding:10px;border-radius:12px}
        .btn{display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border-radius:12px;font-weight:600;border:1px solid var(--border);background:#f1f5f9;color:var(--text);text-decoration:none;cursor:pointer;transition:.2s}
        .btn:hover{background:#e2e8f0;transform:translateY(-1px)}
        .btn-primary{background:var(--grad);color:#fff;border-color:transparent}
        .btn-danger{background:var(--danger);color:#fff;border-color:transparent}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:18px}
        .row{display:flex;gap:10px;align-items:center}
        .label{font-size:12px;color:var(--muted);text-transform:uppercase;letter-spacing:.35px;font-weight:700}
        .value{font-weight:600}
        .badge{display:inline-flex;align-items:center;gap:6px;padding:6px 12px;border-radius:999px;font-size:12px;font-weight:700}
        .b-pending{background:#fffbeb;color:#b45309;border:1px solid #fef3c7}
        .b-approved{background:#f0fdf4;color:#047857;border:1px solid #bbf7d0}
        .b-rejected{background:#fef2f2;color:#991b1b;border:1px solid #fecaca}
        .b-resolved{background:#faf5ff;color:#6d28d9;border:1px solid #e9d5ff}
        .lvl-low{background:#f0fdf4;color:#16a34a}
        .lvl-medium{background:#fffbeb;color:#d97706}
        .lvl-high{background:#fef2f2;color:#dc2626}
        .lvl-critical{background:#fee2e2;color:#991b1b}
        .muted{color:var(--muted)}
        .box{background:#f8fafc;border:1px solid var(--border);border-radius:12px;padding:16px}
        @media(max-width:720px){.grid{grid-template-columns:1fr}.btn{width:100%;justify-content:center}}
    </style>
</head>
<body>
@include('layouts.medicare')

<main class="container">
    <div class="card">
        <div class="header">
            <div class="title">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h2>Detail Permintaan Darurat</h2>
            </div>
            <div class="row" style="gap:10px;flex-wrap:wrap">
                <a href="{{ route('admin.emergencies.index') }}" class="btn"><i class="fa-solid fa-arrow-left"></i>Kembali</a>
                <a href="{{ route('admin.emergencies.edit',$emergency->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                <form action="{{ route('admin.emergencies.destroy',$emergency->id) }}" method="POST" onsubmit="return confirm('Hapus data emergency ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i>Delete</button>
                </form>
            </div>
        </div>

        {{-- Ringkasan --}}
        <div class="grid" style="margin-bottom:16px">
            <div class="box">
                <div class="label">Pasien</div>
                <div class="value">{{ $emergency->patient->name ?? 'N/A' }}</div>
                <div class="muted">ID: {{ $emergency->patient->id ?? 'N/A' }}</div>
            </div>
            <div class="box">
                <div class="label">Dibuat</div>
                <div class="value">{{ $emergency->created_at->format('d M Y, H:i') }}</div>
                <div class="muted">#{{ $emergency->id }}</div>
            </div>
        </div>

        <div class="grid">
            <div class="box">
                <div class="label">Level</div>
                @php
                    $lvl = $emergency->level ?? 'medium';
                    $lvlClass = match($lvl){
                        'low'=>'lvl-low','medium'=>'lvl-medium','high'=>'lvl-high','critical'=>'lvl-critical',default=>'lvl-medium'
                    };
                @endphp
                <span class="badge {{ $lvlClass }}"><i class="fa-solid fa-circle"></i>{{ ucfirst($lvl) }}</span>
            </div>

            <div class="box">
                <div class="label">Status</div>
                @php
                    $st = $emergency->status ?? 'pending';
                    $stClass = match($st){
                        'pending'=>'b-pending','approved'=>'b-approved','rejected'=>'b-rejected','resolved','completed'=>'b-resolved',default=>'b-pending'
                    };
                @endphp
                <span class="badge {{ $stClass }}"><i class="fa-solid fa-circle"></i>{{ ucfirst($st) }}</span>
            </div>

            <div class="box">
                <div class="label">Dokter Ditugaskan</div>
                <div class="value">{{ optional($emergency->doctor)->name ?? 'Belum ditugaskan' }}</div>
            </div>

            <div class="box">
                <div class="label">Ruangan</div>
                <div class="value">{{ optional($emergency->room)->name ?? 'Belum ada' }}</div>
            </div>
        </div>

        <div class="box" style="margin-top:18px">
            <div class="label">Deskripsi</div>
            <div style="margin-top:6px">{{ $emergency->description }}</div>
        </div>

        @if($emergency->nurse)
            <div class="box" style="margin-top:18px">
                <div class="label">Ditangani oleh Perawat</div>
                <div class="value">{{ $emergency->nurse->name }}</div>
            </div>
        @endif
    </div>
</main>
</body>
</html>
