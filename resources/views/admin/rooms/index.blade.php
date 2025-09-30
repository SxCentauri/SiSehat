<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ruangan - MediCare</title>
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
            max-width: 1200px;
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
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .header i {
            color: var(--primary);
            background: #dbeafe;
            padding: 12px;
            border-radius: 12px;
            min-width: 46px;
            text-align: center;
            font-size: 18px;
        }

         .header h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }
        .btn {
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 13px;
            white-space: nowrap;
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
            color: #fff;
            box-shadow: 0 4px 6px rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(239, 68, 68, 0.3);
        }

        .btn-primary {
            background: var(--gradient);
            color: #fff;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-sm {
            padding: 8px 12px;
            font-size: 12px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 16px;
            flex-wrap: wrap;
        }

        .search {
            display: flex;
            gap: 12px;
            align-items: center;
            flex: 1;
            min-width: 300px;
        }

        .form-control {
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background: white;
            flex: 1;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .table-wrap {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        thead {
            background: #f8fafc;
            border-bottom: 2px solid var(--border);
        }

        th {
            padding: 16px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.35px;
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            font-size: 14px;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: #f8fafc;
            transform: translateX(5px);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .badge.status-available {
            background: #f0fdf4;
            color: #047857;
            border: 1px solid #bbf7d0;
        }

        .badge.status-occupied {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .badge.status-maintenance {
            background: #fffbeb;
            color: #d97706;
            border: 1px solid #fed7aa;
        }

        .badge.status-cleaning {
            background: #f0f9ff;
            color: #0369a1;
            border: 1px solid #bae6fd;
        }

        .capacity-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .capacity-bar {
            flex: 1;
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            overflow: hidden;
        }

        .capacity-fill {
            height: 100%;
            background: var(--success);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .capacity-fill.high {
            background: var(--danger);
        }

        .capacity-fill.medium {
            background: var(--warning);
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .actions .btn {
            padding: 8px 12px;
            font-size: 12px;
            white-space: nowrap;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 24px;
        }

        .pagination nav {
            display: flex;
            gap: 8px;
        }

        .pagination .page-link {
            padding: 8px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
            transition: all 0.3s;
        }

        .pagination .page-link:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination .active .page-link {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
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
                align-items: center;
                gap: 16px;
                text-align: center;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 12px;
                width: 100%;
            }

            .header h1 {
                font-size: 22px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
            }

            .header-actions .btn {
                width: auto;
                min-width: 200px;
            }

            .toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .search {
                min-width: 100%;
            }

            .actions {
                flex-direction: column;
                gap: 6px;
            }

            .actions .btn {
                width: 100%;
                justify-content: center;
            }

            th, td {
                padding: 12px 16px;
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

            .header h1 {
                font-size: 20px;
            }

            .header-actions {
                flex-direction: column;
                width: 100%;
            }

            .header i {
                padding: 10px;
                min-width: 40px;
                font-size: 16px;
            }

            .form-control, .btn {
                padding: 10px 14px;
                font-size: 13px;
            }

            th, td {
                padding: 10px 12px;
                font-size: 13px;
            }

            .table-wrap {
                border-radius: 10px;
            }
        }

        @media (max-width: 480px) {
            .card {
                padding: 16px;
                border-radius: 12px;
            }

            .header h1 {
                font-size: 18px;
            }

            .header i {
                padding: 8px;
                min-width: 36px;
                font-size: 14px;
            }

            th, td {
                padding: 8px 10px;
                font-size: 12px;
            }

            .badge {
                padding: 4px 8px;
                font-size: 11px;
            }

            .actions .btn {
                padding: 6px 10px;
                font-size: 11px;
            }

            .header-actions .btn {
                width: 100%;
                min-width: auto;
                justify-content: center;
            }
        }

        @media (max-width: 360px) {
            .header-content {
                gap: 8px;
            }

            .header h1 {
                font-size: 16px;
            }

            .btn {
                padding: 8px 12px;
                font-size: 12px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, .form-control:focus, .page-link:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Empty state styling */
        tbody tr td[colspan] {
            text-align: center;
            color: var(--text-light);
            font-style: italic;
            padding: 40px 20px;
        }
    </style>
</head>
<body>
    @include('layouts.medicare')

    <main class="container">
        <div class="card">
            <!-- HEADER DIPERBAIKI -->
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-door-open"></i>
                    <h1>Kelola Ruangan</h1>
                </div>
                <div class="header-actions">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                    <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Tambah Ruangan
                    </a>
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kapasitas</th>
                            <th>Terisi</th>
                            <th>Status</th>
                            <th style="width:200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rooms as $r)
                            <tr>
                                <td>
                                    <div class="value">{{ $r->code ?? '-' }}</div>
                                </td>
                                <td>
                                    <div class="value">{{ $r->name }}</div>
                                </td>
                                <td>
                                    <div class="value">{{ $r->capacity ?? 0 }}</div>
                                </td>
                                <td>
                                    <div class="capacity-info">
                                        <span>{{ $r->occupied ?? 0 }}/{{ $r->capacity ?? 0 }}</span>
                                        @if($r->capacity > 0)
                                            <div class="capacity-bar">
                                                @php
                                                    $occupancyRate = ($r->occupied / $r->capacity) * 100;
                                                    $fillClass = $occupancyRate >= 80 ? 'high' : ($occupancyRate >= 50 ? 'medium' : '');
                                                @endphp
                                                <div class="capacity-fill {{ $fillClass }}" style="width: {{ $occupancyRate }}%"></div>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="badge status-{{ $r->status }}">
                                        <i class="fa-solid fa-circle" style="font-size: 6px;"></i>
                                        {{ $r->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a class="btn btn-secondary" href="{{ route('admin.rooms.edit',$r) }}">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        <form method="post" action="{{ route('admin.rooms.destroy',$r) }}" onsubmit="return confirm('Hapus ruangan?')" style="display: inline;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa-solid fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div style="text-align: center; padding: 40px 20px;">
                                        <i class="fa-solid fa-door-closed" style="font-size: 48px; color: var(--text-light); margin-bottom: 16px;"></i>
                                        <div style="color: var(--text-light); font-size: 16px;">Belum ada data ruangan</div>
                                        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary" style="margin-top: 16px;">
                                            <i class="fa-solid fa-plus"></i> Tambah Ruangan Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($rooms->count() > 0)
                <div class="pagination">{{ $rooms->links() }}</div>
            @endif
        </div>
    </main>
</body>
</html>
