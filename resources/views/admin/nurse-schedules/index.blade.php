<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Perawat - MediCare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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

        .btn-primary {
            background: var(--gradient);
            color: #fff;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
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

        .btn-sm {
            padding: 8px 12px;
            font-size: 12px;
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

        .badge.day-monday {
            background: #f0f9ff;
            color: #0369a1;
            border: 1px solid #bae6fd;
        }

        .badge.day-tuesday {
            background: #f0fdf4;
            color: #047857;
            border: 1px solid #bbf7d0;
        }

        .badge.day-wednesday {
            background: #faf5ff;
            color: #7c3aed;
            border: 1px solid #ddd6fe;
        }

        .badge.day-thursday {
            background: #fffbeb;
            color: #d97706;
            border: 1px solid #fed7aa;
        }

        .badge.day-friday {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .badge.day-saturday {
            background: #fdf4ff;
            color: #c026d3;
            border: 1px solid #fae8ff;
        }

        .badge.day-sunday {
            background: #fffbeb;
            color: #f59e0b;
            border: 1px solid #fef3c7;
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

        /* Empty state styling */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 16px;
            color: #d1d5db;
        }

        .empty-state h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--text);
        }

        /* Time styling */
        .time-slot {
            font-weight: 600;
            color: var(--text);
        }

        .time-slot + div {
            font-size: 12px;
            color: var(--text-light);
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

            .btn {
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
    </style>
</head>
<body>
    @extends('layouts.medicare')

    <div class="container">
        <div class="card">
            <!-- Header Section -->
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-user-nurse"></i>
                    <h1>Jadwal Perawat</h1>
                </div>
                <div class="header-actions">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                    <a href="{{ route('admin.nurse-schedules.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Tambah Jadwal
                    </a>
                </div>
            </div>

            <!-- Table Section -->
            <div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>Perawat</th>
                <th>Tanggal Jadwal</th>
                <th>Tugas</th>
                <th style="width:180px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $s)
                <tr>
                    <td>
                        <div style="font-weight: 600;">{{ $s->nurse->name ?? $s->nurse_name ?? '-' }}</div>
                        @if($s->nurse && $s->nurse->email)
                            <div style="font-size: 12px; color: var(--text-light);">{{ $s->nurse->email }}</div>
                        @endif
                    </td>
                    <td>
                        {{-- Menampilkan hari dari schedule_date --}}
                        <div style="font-weight: 600;">{{ \Carbon\Carbon::parse($s->schedule_date)->translatedFormat('l') }}</div>

                        {{-- Menampilkan tanggal lengkap dari schedule_date --}}
                        <div style="font-size: 12px; color: var(--text-light); margin-top: 4px;">
                            {{ \Carbon\Carbon::parse($s->schedule_date)->translatedFormat('d F Y') }}
                        </div>
                    </td>
                    <td>
                        {{-- Menampilkan isi dari kolom task --}}
                        {{ $s->task }}
                    </td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-secondary" href="{{ route('admin.nurse-schedules.edit', $s) }}">
                                <i class="fa-solid fa-pen"></i> Edit
                            </a>
                            <form method="post" action="{{ route('admin.nurse-schedules.destroy', $s) }}" onsubmit="return confirm('Hapus jadwal?')" style="display: inline;">
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
                    {{-- Colspan disesuaikan menjadi 4 karena jumlah kolom berubah --}}
                    <td colspan="4">
                        <div class="empty-state">
                            <i class="fa-solid fa-calendar-times"></i>
                            <h3>Belum ada data jadwal</h3>
                            <p>Semua jadwal perawat akan tampil di sini</p>
                            <a href="{{ route('admin.nurse-schedules.create') }}" class="btn btn-primary" style="margin-top: 16px;">
                                <i class="fa-solid fa-plus"></i> Tambah Jadwal Pertama
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

            @if($items->count() > 0)
                <div class="pagination">{{ $items->links() }}</div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Add click effect to table rows
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('click', function(e) {
                    if (!e.target.closest('a') && !e.target.closest('button') && !e.target.closest('form')) {
                        this.style.transform = 'scale(0.99)';
                        setTimeout(() => {
                            this.style.transform = '';
                        }, 150);
                    }
                });
            });
        });
    </script>
</body>
</html>
