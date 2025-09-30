<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Permintaan Darurat - MediCare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --completed: #8b5cf6;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #1f2937;
            --text-light: #6b7280;
            --border: #e5e7eb;
            --radius: 16px;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            --gradient: linear-gradient(135deg, var(--primary), var(--primary-dark));
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            padding-top: 80px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px 40px;
        }

        .card {
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 32px;
            border: 1px solid var(--border);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 0.5s ease-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .header i {
            color: var(--danger);
            background: #fee2e2;
            padding: 12px;
            border-radius: 12px;
            min-width: 46px;
            text-align: center;
            font-size: 18px;
        }

        .header h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        .grid {
            display: grid;
            gap: 16px;
        }

        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-4 {
            grid-template-columns: repeat(2, 1fr);
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .info-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
        }

        .label {
            font-size: 12px;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.35px;
            font-weight: 700;
            margin-bottom: 6px;
            display: block;
        }

        .value {
            font-weight: 600;
            font-size: 16px;
            color: var(--text);
            margin-bottom: 4px;
        }

        .muted {
            color: var(--text-light);
            font-size: 13px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .level-low {
            color: #15803d;
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .level-medium {
            color: #d97706;
            background-color: #fffbeb;
            border: 1px solid #fed7aa;
        }

        .level-high {
            color: #dc2626;
            background-color: #fef2f2;
            border: 1px solid #fecaca;
        }

        .level-critical {
            color: #be123c;
            background-color: #fdf2f8;
            border: 1px solid #fbcfe8;
            font-weight: 700;
        }

        .status-pending {
            color: #b45309;
            background-color: #fffbeb;
            border: 1px solid #fef3c7;
        }

        .status-in_progress {
            color: #0369a1;
            background-color: #f0f9ff;
            border: 1px solid #bae6fd;
        }

        .status-resolved {
            color: #047857;
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        .status-completed {
            color: #6d28d9;
            background-color: #faf5ff;
            border: 1px solid #e9d5ff;
        }

        .description-box {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            margin-top: 20px;
        }

        .description-content {
            margin-top: 8px;
            line-height: 1.7;
            color: var(--text);
        }

        .action-buttons {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px 30px;
            }

            .card {
                padding: 24px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-content {
                flex-direction: row;
                text-align: left;
                gap: 12px;
                width: 100%;
            }

            .header h2 {
                font-size: 22px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .grid-2, .grid-4 {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            body {
                padding-top: 70px;
            }

            .container {
                padding: 0 12px 20px;
            }

            .card {
                padding: 20px;
                border-radius: 14px;
            }

            .header h2 {
                font-size: 20px;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .header i {
                align-self: center;
            }

            .action-buttons {
                gap: 10px;
            }

            .info-box, .description-box {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding-top: 60px;
            }

            .container {
                padding: 0 10px 15px;
            }

            .card {
                padding: 16px;
                border-radius: 12px;
            }

            .header h2 {
                font-size: 18px;
            }

            .header i {
                padding: 10px;
                min-width: 40px;
                font-size: 16px;
            }

            .value {
                font-size: 15px;
            }

            .label, .muted {
                font-size: 11px;
            }

            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .badge {
                padding: 6px 12px;
                font-size: 12px;
            }
        }

        @media (max-width: 360px) {
            .header h2 {
                font-size: 16px;
            }

            .header i {
                padding: 8px;
                min-width: 36px;
                font-size: 14px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, a:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
@include('layouts.medicare')

<main class="container">
    <div class="card">
        <div class="header">
            <div class="header-content">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h2>Detail Permintaan Darurat</h2>
            </div>
            <div class="action-buttons" style="margin-top: 0; padding-top: 0; border-top: none;">
                <a href="{{ route('admin.emergencies.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                </a>
                <a href="{{ route('admin.emergencies.edit',$emergency->id) }}" class="btn btn-primary">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </a>
                <form action="{{ route('admin.emergencies.destroy',$emergency->id) }}" method="POST" onsubmit="return confirm('Hapus data emergency ini?')" style="display: inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        <i class="fa-solid fa-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>

        {{-- Ringkasan --}}
        <div class="grid grid-2" style="margin-bottom: 20px;">
            <div class="info-box">
                <div class="label">Pasien</div>
                <div class="value">{{ $emergency->patient->name ?? 'N/A' }}</div>
                <div class="muted">ID: {{ $emergency->patient->id ?? 'N/A' }}</div>
            </div>
            <div class="info-box">
                <div class="label">Dibuat Pada</div>
                <div class="value">{{ $emergency->created_at->format('d M Y, H:i') }}</div>
                <div class="muted">ID Laporan: #{{ $emergency->id }}</div>
            </div>
        </div>

        {{-- Status dan Level --}}
        <div class="grid grid-4">
            <div class="info-box">
                <div class="label">Tingkat Kedaruratan</div>
                @php
                    $lvl = $emergency->level ?? 'medium';
                    $lvlClass = match($lvl) {
                        'low' => 'level-low',
                        'medium' => 'level-medium',
                        'high' => 'level-high',
                        'critical' => 'level-critical',
                        default => 'level-medium'
                    };
                @endphp
                <span class="badge {{ $lvlClass }}">
                    <i class="fa-solid fa-circle" style="font-size: 8px;"></i>
                    {{ ucfirst($lvl) }}
                </span>
            </div>

            <div class="info-box">
                <div class="label">Status</div>
                @php
                    $st = $emergency->status ?? 'pending';
                    $stClass = match($st) {
                        'pending' => 'status-pending',
                        'open' => 'status-pending',
                        'resolved' => 'status-resolved',
                        'completed' => 'status-completed',
                        default => 'status-pending'
                    };
                @endphp
                <span class="badge {{ $stClass }}">
                    <i class="fa-solid fa-circle" style="font-size: 8px;"></i>
                    {{ ucfirst($st) }}
                </span>
            </div>

            <div class="info-box">
                <div class="label">Dokter yang Ditugaskan</div>
                <div class="value">{{ optional($emergency->doctor)->name ?? 'Belum ditugaskan' }}</div>
                <div class="muted">
                    @if($emergency->doctor)
                        Spesialis: {{ optional($emergency->doctor)->specialization ?? 'Tidak tersedia' }}
                    @endif
                </div>
            </div>

            <div class="info-box">
                <div class="label">Ruangan</div>
                <div class="value">{{ optional($emergency->room)->name ?? 'Belum ditugaskan' }}</div>
                <div class="muted">
                    @if($emergency->room)
                        Kapasitas: {{ optional($emergency->room)->capacity ?? 'Tidak tersedia' }}
                    @endif
                </div>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="description-box">
            <div class="label">Deskripsi Kondisi Darurat</div>
            <div class="description-content">
                {{ $emergency->description }}
            </div>
        </div>

        @if($emergency->nurse)
            <div class="info-box" style="margin-top: 20px;">
                <div class="label">Ditangani oleh Perawat</div>
                <div class="value">{{ $emergency->nurse->name }}</div>
                <div class="muted">ID Perawat: {{ $emergency->nurse->id }}</div>
            </div>
        @endif

        {{-- Informasi Tambahan --}}
        <div class="grid grid-2" style="margin-top: 20px;">
            <div class="info-box">
                <div class="label">Terakhir Diperbarui</div>
                <div class="value">{{ $emergency->updated_at->format('d M Y, H:i') }}</div>
                <div class="muted">{{ $emergency->updated_at->diffForHumans() }}</div>
            </div>
            <div class="info-box">
                <div class="label">Prioritas</div>
                <div class="value">
                    @php
                        $priority = match($lvl) {
                            'critical' => 'Sangat Tinggi',
                            'high' => 'Tinggi',
                            'medium' => 'Sedang',
                            'low' => 'Rendah',
                            default => 'Sedang'
                        };
                    @endphp
                    {{ $priority }}
                </div>
                <div class="muted">Berdasarkan tingkat kedaruratan</div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
