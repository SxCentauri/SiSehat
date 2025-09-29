<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan Darurat - MediCare</title>
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
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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

        .header-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
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

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
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

        .btn-sm {
            padding: 10px 16px;
            font-size: 13px;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid var(--border);
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px; /* Minimum width for table to maintain readability */
        }

        thead {
            background-color: #f8fafc;
        }

        th {
            padding: 16px 20px;
            text-align: left;
            font-weight: 600;
            color: var(--text-light);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f8fafc;
            transform: translateX(5px);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            gap: 6px;
            border: 1px solid transparent;
        }

        .badge-pending {
            background-color: #fffbeb;
            color: var(--warning);
            border-color: #fef3c7;
        }

        .badge-approved {
            background-color: #f0fdf4;
            color: var(--success);
            border-color: #bbf7d0;
        }

        .badge-rejected {
            background-color: #fef2f2;
            color: var(--danger);
            border-color: #fecaca;
        }

        .badge-completed {
            background-color: #f5f3ff;
            color: var(--completed);
            border-color: #ddd6fe;
        }

        .level-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
        }

        .level-low {
            background-color: #f0fdf4;
            color: var(--success);
        }

        .level-medium {
            background-color: #fffbeb;
            color: var(--warning);
        }

        .level-high {
            background-color: #fef2f2;
            color: var(--danger);
        }

        .level-critical {
            background-color: #fee2e2;
            color: #991b1b;
            font-weight: 700;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            padding: 16px 20px;
            border-radius: 10px;
            margin-bottom: 24px;
            border: 1px solid #bbf7d0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success i {
            color: #16a34a;
        }

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

        .empty-state p {
            font-size: 14px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 24px;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pagination a, .pagination span {
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 14px;
        }

        .pagination a {
            color: var(--primary);
            border: 1px solid var(--border);
        }

        .pagination a:hover {
            background-color: #eff6ff;
            border-color: var(--primary);
        }

        .pagination .current {
            background: var(--gradient);
            color: white;
            border: 1px solid var(--primary);
        }

        /* Responsive Styles - Diperbaiki */
        @media (max-width: 1024px) {
            .container {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 70px;
            }
            
            .container {
                padding: 0 15px 30px;
            }

            .card {
                padding: 24px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-content {
                flex-direction: row;
                text-align: left;
                gap: 12px;
            }

            .header h2 {
                font-size: 22px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-start;
            }

            th, td {
                padding: 12px 16px;
            }
            
            .table-container {
                margin: 15px 0;
                border-radius: 8px;
            }
        }

        @media (max-width: 640px) {
            body {
                padding-top: 60px;
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

            .header-actions {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            th, td {
                padding: 10px 12px;
                font-size: 13px;
            }
            
            /* Perbaikan untuk tabel pada layar kecil */
            table {
                min-width: 600px;
            }
            
            .badge {
                padding: 6px 12px;
                font-size: 11px;
            }
            
            .level-indicator {
                padding: 4px 8px;
                font-size: 11px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding-top: 55px;
            }
            
            .container {
                padding: 0 10px 15px;
            }

            .card {
                padding: 16px;
            }
            
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 8px;
            }
            
            .header i {
                padding: 10px;
                font-size: 16px;
                min-width: 40px;
            }
            
            .header h2 {
                font-size: 18px;
            }
            
            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }
            
            th, td {
                padding: 8px 10px;
                font-size: 12px;
            }
            
            .empty-state {
                padding: 40px 15px;
            }
            
            .empty-state i {
                font-size: 48px;
            }
            
            .empty-state h3 {
                font-size: 16px;
            }
            
            .empty-state p {
                font-size: 13px;
            }
            
            .alert-success {
                padding: 12px 16px;
                font-size: 13px;
            }
        }

        /* Perbaikan untuk layar sangat kecil (di bawah 360px) */
        @media (max-width: 360px) {
            body {
                padding-top: 50px;
            }
            
            .container {
                padding: 0 8px 10px;
            }

            .card {
                padding: 12px;
                border-radius: 12px;
            }
            
            .header h2 {
                font-size: 16px;
            }
            
            .header-actions {
                gap: 8px;
            }
            
            .btn {
                padding: 8px 12px;
                font-size: 12px;
            }
            
            .pagination a, .pagination span {
                padding: 6px 12px;
                font-size: 12px;
            }
        }

        /* Animation */
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

        .card {
            animation: fadeIn 0.5s ease-out;
        }

        tbody tr {
            animation: fadeIn 0.3s ease-out;
        }

        /* Focus states for accessibility */
        .btn:focus, a:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
        
        /* Perbaikan untuk sel tabel pada layar kecil */
        .mobile-table-cell {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .mobile-table-label {
            font-size: 11px;
            color: var(--text-light);
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    @include('layouts.medicare')

    <main class="container">
        <div class="card">
            <div class="header">
                <div class="header-content">
                    <h2><i class="fa-solid fa-list-check"></i>  Riwayat Laporan Darurat</h2>
                </div>
                <div class="header-actions">
                    <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                    <a href="{{ route('patient.emergencies.create') }}" class="btn btn-danger btn-sm">
                        <i class="fa-solid fa-plus"></i> Lapor Darurat Baru
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($emergencies->isEmpty())
                <div class="empty-state">
                    <i class="fa-solid fa-file-medical"></i>
                    <h3>Belum ada riwayat laporan darurat</h3>
                    <p>Laporan darurat Anda akan muncul di sini setelah membuat laporan</p>
                </div>
            @else
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal Laporan</th>
                                <th>Level</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Penanganan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emergencies as $emergency)
                                <tr>
                                    <td>
                                        <div class="mobile-table-cell">
                                            <span class="mobile-table-label">Tanggal</span>
                                            <div style="font-weight: 600;">{{ $emergency->created_at->format('d M Y') }}</div>
                                            <div style="font-size: 12px; color: var(--text-light);">{{ $emergency->created_at->format('H:i') }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $levelClass = match($emergency->level) {
                                                'low' => 'level-low',
                                                'medium' => 'level-medium',
                                                'high' => 'level-high',
                                                'critical' => 'level-critical',
                                                default => 'level-medium',
                                            };
                                        @endphp
                                        <div class="mobile-table-cell">
                                            <span class="mobile-table-label">Level</span>
                                            <span class="level-indicator {{ $levelClass }}">
                                                <i class="fa-solid fa-circle"></i>
                                                {{ ucfirst($emergency->level) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mobile-table-cell">
                                            <span class="mobile-table-label">Deskripsi</span>
                                            <div style="font-weight: 500;">{{ Str::limit($emergency->description, 50) }}</div>
                                            @if(strlen($emergency->description) > 50)
                                                <div style="font-size: 11px; color: var(--text-light); margin-top: 4px;">
                                                    Klik untuk melihat selengkapnya
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @php
                                            $statusClass = match($emergency->status) {
                                                'pending' => 'badge-pending',
                                                'approved' => 'badge-approved',
                                                'rejected' => 'badge-rejected',
                                                'completed' => 'badge-completed',
                                                default => 'badge-pending',
                                            };
                                        @endphp
                                        <div class="mobile-table-cell">
                                            <span class="mobile-table-label">Status</span>
                                            <span class="badge {{ $statusClass }}">
                                                <i class="fa-solid fa-circle"></i>
                                                {{ ucfirst($emergency->status) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mobile-table-cell">
                                            <span class="mobile-table-label">Penanganan</span>
                                            @if($emergency->status == 'approved' || $emergency->status == 'completed')
                                                <div style="font-size: 13px;">
                                                    <div><strong>Dokter:</strong> Dr. {{ $emergency->doctor->name ?? 'N/A' }}</div>
                                                    <div><strong>Ruangan:</strong> {{ $emergency->room->name ?? 'N/A' }}</div>
                                                </div>
                                            @else
                                                <span style="color: var(--text-light); font-style: italic;">Menunggu penanganan</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(method_exists($emergencies,'links'))
                    <div class="pagination">
                        {{ $emergencies->links() }}
                    </div>
                @endif
            @endif
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to table rows
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach((row, index) => {
                row.style.animationDelay = `${index * 0.1}s`;
            });

            // Add hover effects to table rows
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
            
            // Improve table scrolling on mobile
            const tableContainer = document.querySelector('.table-container');
            if (tableContainer) {
                tableContainer.addEventListener('touchstart', function() {
                    this.style.overflowX = 'auto';
                });
            }
        });
    </script>
</body>
</html>