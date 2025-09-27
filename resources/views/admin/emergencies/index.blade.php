<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Permintaan Darurat - MediCare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    :root{--primary:#2563eb;--primary-dark:#1e40af;--secondary:#64748b;--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--critical:#dc2626;--completed:#8b5cf6;--bg:#f8fafc;--card-bg:#ffffff;--text:#1f2937;--text-light:#6b7280;--border:#e5e7eb;--radius:16px;--shadow:0 10px 25px rgba(0,0,0,.05);--gradient:linear-gradient(135deg,var(--primary),var(--primary-dark))}
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);line-height:1.6;padding-top:80px}
    .container{max-width:1200px;margin:0 auto;padding:0 20px 40px}
    .card{background:var(--card-bg);border-radius:var(--radius);box-shadow:var(--shadow);padding:32px;border:1px solid var(--border);transition:transform .3s,box-shadow .3s;animation:fadeIn .5s ease-out}
    .card:hover{transform:translateY(-5px);box-shadow:0 15px 35px rgba(0,0,0,.1)}
    @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
    .header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;padding-bottom:20px;border-bottom:1px solid var(--border);flex-wrap:wrap;gap:20px}
    .header-content{display:flex;align-items:center;gap:14px}
    .header i{color:var(--danger);background:#fee2e2;padding:12px;border-radius:12px;min-width:46px;text-align:center;font-size:18px}
    .header h1{font-size:24px;font-weight:700;color:var(--text);margin:0}
    .header-actions{display:flex;gap:12px;flex-wrap:wrap}
    .btn{padding:10px 16px;border-radius:10px;font-weight:600;display:inline-flex;align-items:center;gap:6px;text-decoration:none;border:none;cursor:pointer;transition:.2s;font-size:13px}
    .btn-secondary{background:#f1f5f9;color:var(--text);border:1px solid var(--border)}
    .btn-secondary:hover{background:#e2e8f0;transform:translateY(-2px)}
    .btn-danger{background:var(--danger);color:#fff}
    .btn-danger:hover{background:#dc2626;transform:translateY(-2px)}
    .btn-primary{background:var(--gradient);color:#fff}
    .btn-primary:hover{transform:translateY(-2px)}
    .btn-sm{padding:10px 16px;font-size:13px}

    .table-container{overflow-x:auto;border-radius:10px;border:1px solid var(--border);margin:20px 0}
    table{width:100%;border-collapse:collapse}
    thead{background:#f8fafc}
    th{padding:16px 20px;text-align:left;font-weight:600;color:var(--text-light);font-size:14px;text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid var(--border)}
    td{padding:16px 20px;border-bottom:1px solid var(--border)}
    tbody tr{transition:.3s}
    tbody tr:hover{background:#f8fafc;transform:translateX(5px)}

    .status-badge{display:inline-flex;align-items:center;padding:8px 16px;border-radius:20px;font-size:12px;font-weight:600;gap:6px;border:1px solid transparent}
    .status-pending{background:#fffbeb;color:var(--warning);border-color:#fef3c7}
    .status-approved{background:#f0fdf4;color:var(--success);border-color:#bbf7d0}
    .status-approve{background:#e0f2fe;color:var(--primary);border-color:#bae6fd}
    .status-resolved{background:#faf5ff;color:var(--completed);border-color:#e9d5ff}
    .status-critical{background:#fef2f2;color:var(--critical);border-color:#fecaca;animation:pulse 2s infinite}
    @keyframes pulse{0%{transform:scale(1)}50%{transform:scale(1.05)}100%{transform:scale(1)}}

    .level-indicator{display:inline-flex;align-items:center;gap:6px;font-weight:600;padding:6px 12px;border-radius:8px;font-size:12px}
    .level-low{background:#f0fdf4;color:var(--success)}
    .level-medium{background:#fffbeb;color:var(--warning)}
    .level-high{background:#fef2f2;color:var(--danger)}
    .level-critical{background:#fee2e2;color:#991b1b;font-weight:700}

    .alert-success{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:16px;border-radius:10px;margin-bottom:24px;display:flex;align-items:center;gap:12px}

    /* === ACTIONS (fix: keep buttons on one line) === */
    .table-actions{display:flex;gap:8px;align-items:center;flex-wrap:nowrap;white-space:nowrap}
    .table-actions .btn{width:auto}
    .action-form{display:inline-flex;margin:0}

    .pagination{display:flex;justify-content:center;margin-top:24px;gap:8px;flex-wrap:wrap}
    .pagination a,.pagination span{padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:500;transition:.2s;font-size:14px}
    .pagination a{color:var(--primary);border:1px solid var(--border)}
    .pagination a:hover{background:#eff6ff;border-color:var(--primary)}
    .pagination .current{background:var(--gradient);color:#fff;border:1px solid var(--primary)}

    @media (max-width:768px){
        .container{padding:0 15px 30px}
        .card{padding:24px}
        .header{flex-direction:column;align-items:flex-start}
        .header-content{flex-direction:column;text-align:center;gap:12px}
        .header h1{font-size:22px}
        .header-actions{width:100%;justify-content:flex-start}
        th,td{padding:12px 16px;font-size:14px}
        .table-container{font-size:14px}
        .table-actions{flex-wrap:wrap}
    }
    @media (max-width:640px){
        .container{padding:0 12px 20px}
        .card{padding:20px;border-radius:14px}
        .header h1{font-size:20px}
        .header-actions{flex-direction:column;width:100%}
        th,td{padding:10px 12px;font-size:13px}
        .status-badge{padding:6px 12px;font-size:11px}
        .btn{padding:8px 12px;font-size:12px}
    }
    </style>
</head>
<body>
@include('layouts.medicare')
<div class="container">
    <div class="card">
        <div class="header">
            <div class="header-content">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h1>Manajemen Permintaan Darurat</h1>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                </a>
                <a href="{{ route('admin.emergencies.create') }}" class="btn btn-danger">
                    <i class="fa-solid fa-plus"></i> Tambah Emergency
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success"><i class="fa-solid fa-circle-check"></i>{{ session('success') }}</div>
        @endif

        @if($emergencies->isEmpty())
            <div class="empty-state">
                <i class="fa-solid fa-file-medical"></i>
                <h3>Belum ada permintaan darurat</h3>
                <p>Semua permintaan darurat akan tampil di sini</p>
            </div>
        @else
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Level</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Penanganan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($emergencies as $emergency)
                        @php
                            $isCritical = $emergency->level === 'critical';
                            $statusClass = match($emergency->status){
                                'pending' => $isCritical ? 'status-critical' : 'status-pending',
                                'approve' => 'status-approve',
                                'resolved' => 'status-resolved',
                                default => 'status-approved'
                            };
                            $levelClass = $isCritical ? 'level-critical' : "level-{$emergency->level}";
                        @endphp
                        <tr class="{{ $isCritical ? 'critical-case' : '' }}" style="{{ $isCritical ? 'border-left:4px solid var(--critical);' : '' }}">
                            <td>
                                <div style="font-weight:600">{{ $emergency->patient->name ?? 'N/A' }}</div>
                                <div style="font-size:12px;color:var(--text-light)">ID: {{ $emergency->patient->id ?? 'N/A' }}</div>
                            </td>
                            <td>
                                <span class="level-indicator {{ $levelClass }}"><i class="fa-solid fa-circle"></i>{{ ucfirst($emergency->level) }}</span>
                            </td>
                            <td><div style="max-width:280px;font-weight:500">{{ \Illuminate\Support\Str::limit($emergency->description,70) }}</div></td>
                            <td>
                                <div style="font-weight:600">{{ $emergency->created_at->format('d M Y') }}</div>
                                <div style="font-size:12px;color:var(--text-light)">{{ $emergency->created_at->format('H:i') }}</div>
                            </td>
                            <td><span class="status-badge {{ $statusClass }}"><i class="fa-solid fa-circle"></i>{{ ucfirst($emergency->status) }}</span></td>
                            <td>
                                @if(in_array($emergency->status, ['approved','approve','resolved','completed']))
                                    <div style="font-size:13px">
                                        <div><strong>Dokter:</strong> {{ optional($emergency->doctor)->name ?? 'N/A' }}</div>
                                        <div><strong>Ruangan:</strong> {{ optional($emergency->room)->name ?? 'N/A' }}</div>
                                    </div>
                                @else
                                    <span style="color:var(--text-light);font-style:italic">Menunggu penanganan</span>
                                @endif
                            </td>
                            <td>
                                <div class="table-actions">
                                    <a href="{{ route('admin.emergencies.show',$emergency->id) }}" class="btn btn-secondary btn-sm">
                                        <i class="fa-solid fa-eye"></i> Show
                                    </a>
                                    <a href="{{ route('admin.emergencies.edit',$emergency->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.emergencies.destroy',$emergency->id) }}" method="POST" class="action-form" onsubmit="return confirm('Hapus data emergency ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @if(method_exists($emergencies,'links'))
                <div class="pagination">{{ $emergencies->links() }}</div>
            @endif
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const alerts = document.querySelectorAll('.alert-success');
    alerts.forEach(a => setTimeout(()=>{ a.style.opacity='0'; a.style.transition='opacity .5s'; setTimeout(()=>a.style.display='none',500)}, 5000));
});
</script>
</body>
</html>
