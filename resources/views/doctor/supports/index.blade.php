<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Dukungan Perawat - MediCare</title>
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
            color: var(--primary);
            background: #e0f2fe;
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

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
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

        .badge-Terkirim {
            background-color: #fefce8;
            color: #a16207;
            border-color: #fef9c3;
        }

        .badge-Dilihat {
            background-color: #fffbeb;
            color: var(--warning);
            border-color: #fef3c7;
        }

        .badge-Diproses {
            background-color: #faf5ff;
            color: var(--completed);
            border-color: #ddd6fe;
        }

        .badge-Selesai {
            background-color: #f0fdf4;
            color: var(--success);
            border-color: #bbf7d0;
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
                flex-direction: column;
                text-align: center;
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
        }

        @media (max-width: 480px) {
            th, td {
                padding: 8px 10px;
            }

            .badge {
                padding: 6px 12px;
                font-size: 11px;
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
    </style>
</head>
<body>
    @include('layouts.medicare')

    <main class="container">
        <div class="card">
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-inbox"></i>
                    <h2>Permintaan Dukungan dari Perawat</h2>
                </div>
                <div class="header-actions">
                    <a href="{{ route('doctor.dashboard') }}" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($supports->isEmpty())
                <div class="empty-state">
                    <i class="fa-solid fa-inbox"></i>
                    <h3>Tidak ada permintaan dukungan</h3>
                    <p>Permintaan dukungan dari perawat akan muncul di sini</p>
                </div>
            @else
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Subjek</th>
                                <th>Dari Perawat</th>
                                <th>Pasien</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supports as $support)
                                <tr>
                                    <td>
                                        <div style="font-weight: 600;">{{ Str::limit($support->subjek, 40) }}</div>
                                        @if(strlen($support->subjek) > 40)
                                            <div style="font-size: 11px; color: var(--text-light); margin-top: 4px;">
                                                Klik detail untuk melihat selengkapnya
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="font-weight: 500;">{{ $support->perawat->name ?? 'N/A' }}</div>
                                        <div style="font-size: 12px; color: var(--text-light);">Perawat</div>
                                    </td>
                                    <td>
                                        <div style="font-weight: 500;">{{ $support->patient->name ?? 'N/A' }}</div>
                                        <div style="font-size: 12px; color: var(--text-light);">Pasien</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ str_replace(' ', '', $support->status) }}">
                                            <i class="fa-solid fa-circle"></i>
                                            {{ $support->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('doctor.supports.show', $support->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-{{ $support->status === 'Selesai' ? 'eye' : 'reply' }}"></i>
                                            {{ $support->status === 'Selesai' ? 'Lihat Detail' : 'Lihat & Balas' }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(method_exists($supports,'links'))
                    <div class="pagination">
                        {{ $supports->links() }}
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
                    this.style.transform = 'translateX(5px)';
                });
            });

            // Update badge colors based on status
            const badges = document.querySelectorAll('.badge');
            badges.forEach(badge => {
                const status = badge.textContent.trim();
                if (status === 'Terkirim') {
                    badge.innerHTML = '<i class="fa-solid fa-clock"></i> ' + status;
                } else if (status === 'Dilihat') {
                    badge.innerHTML = '<i class="fa-solid fa-eye"></i> ' + status;
                } else if (status === 'Diproses') {
                    badge.innerHTML = '<i class="fa-solid fa-gears"></i> ' + status;
                } else if (status === 'Selesai') {
                    badge.innerHTML = '<i class="fa-solid fa-check"></i> ' + status;
                }
            });
        });
    </script>
</body>
</html>
