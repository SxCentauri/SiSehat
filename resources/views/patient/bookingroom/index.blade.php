<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking - MediCare</title>
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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 100px 20px 40px;
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
            color: #fff;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
        }

        .alert {
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .alert-success i {
            color: var(--success);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid var(--border);
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

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            gap: 6px;
            border: 1px solid transparent;
        }

        .status-pending {
            background-color: #fffbeb;
            color: var(--warning);
            border-color: #fef3c7;
        }

        .status-approved {
            background-color: #f0fdf4;
            color: var(--success);
            border-color: #bbf7d0;
        }

        .status-completed {
            background-color: #faf5ff;
            color: var(--completed);
            border-color: #e9d5ff;
        }

        .status-rejected {
            background-color: #fef2f2;
            color: var(--danger);
            border-color: #fecaca;
        }

        .room-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .room-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
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

        /* Filter Section untuk Pasien */
        .filter-section {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-btn {
            padding: 8px 16px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--text-light);
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .filter-btn:hover {
            border-color: var(--primary);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 90px 15px 30px;
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

            th, td {
                padding: 12px 16px;
            }

            .table-container {
                font-size: 14px;
            }

            .filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-btn {
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            .container {
                padding: 80px 12px 20px;
            }

            .card {
                padding: 20px;
                border-radius: 14px;
            }

            .header h2 {
                font-size: 20px;
            }

            th, td {
                padding: 10px 12px;
                font-size: 13px;
            }

            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .empty-state {
                padding: 40px 15px;
            }

            .empty-state i {
                font-size: 48px;
            }

            .status-badge {
                padding: 6px 12px;
                font-size: 11px;
            }

            .room-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
        }

        @media (max-width: 480px) {
            th, td {
                padding: 8px 10px;
            }

            .pagination a, .pagination span {
                padding: 6px 12px;
                font-size: 13px;
            }

            .filter-btn {
                padding: 6px 12px;
                font-size: 13px;
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
        .btn:focus, a:focus, .filter-btn:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    @include('layouts.medicare')
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-calendar-check"></i>
                    <h2>Riwayat Booking Ruangan</h2>
                </div>
                <a href="{{ route('patient.bookingroom.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Booking Ruangan Baru
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Filter Section untuk Pasien -->
            <div class="filter-section">
                <button class="filter-btn active" onclick="filterBookings('all')">Semua</button>
                <button class="filter-btn" onclick="filterBookings('pending')">Pending</button>
                <button class="filter-btn" onclick="filterBookings('approved')">Disetujui</button>
                <button class="filter-btn" onclick="filterBookings('completed')">Selesai</button>
                <button class="filter-btn" onclick="filterBookings('rejected')">Ditolak</button>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kondisi</th>
                            <th>Status</th>
                            <th>Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr class="booking-row" data-status="{{ $booking->status }}">
                                <td>
                                    <div class="booking-date">
                                        <div class="date-main">{{ $booking->created_at->format('d M Y') }}</div>
                                        <div class="date-time">{{ $booking->created_at->format('H:i') }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="condition-text">
                                        {{ Str::limit($booking->condition, 60) }}
                                        @if(strlen($booking->condition) > 60)
                                            <span class="text-primary cursor-pointer" title="{{ $booking->condition }}">...</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($booking->status == 'pending')
                                        <span class="status-badge status-pending">
                                            <i class="fa-solid fa-clock"></i> Pending
                                        </span>
                                    @elseif($booking->status == 'approved')
                                        <span class="status-badge status-approved">
                                            <i class="fa-solid fa-check-circle"></i> Disetujui
                                        </span>
                                    @elseif($booking->status == 'completed')
                                        <span class="status-badge status-completed">
                                            <i class="fa-solid fa-check-double"></i> Selesai
                                        </span>
                                    @else
                                        <span class="status-badge status-rejected">
                                            <i class="fa-solid fa-times-circle"></i> Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($booking->room)
                                        <div class="room-info">
                                            <div class="room-icon">
                                                <i class="fa-solid fa-bed"></i>
                                            </div>
                                            <div>
                                                <div class="room-name">{{ $booking->room->name }}</div>
                                                @if($booking->status == 'completed')
                                                    <div class="room-status" style="font-size: 11px; color: var(--text-light);">
                                                        Masa inap selesai
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <i class="fa-solid fa-calendar-xmark"></i>
                                        <h3>Belum ada riwayat booking</h3>
                                        <p>Mulai dengan membuat booking ruangan baru</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bookings->count() > 0)
                <div class="pagination">
                    {{ $bookings->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
        function filterBookings(status) {
            // Update active filter button
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter rows
            const rows = document.querySelectorAll('.booking-row');
            let visibleCount = 0;

            rows.forEach(row => {
                if (status === 'all' || row.dataset.status === status) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Show empty state if no rows visible
            const emptyState = document.querySelector('.empty-state');
            if (emptyState) {
                if (visibleCount === 0) {
                    emptyState.style.display = 'block';
                } else {
                    emptyState.style.display = 'none';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Tooltip untuk kondisi yang dipotong
            const conditionTexts = document.querySelectorAll('.condition-text');
            conditionTexts.forEach(text => {
                const fullText = text.querySelector('span');
                if (fullText) {
                    text.addEventListener('mouseenter', function() {
                        this.setAttribute('title', fullText.getAttribute('title'));
                    });
                }
            });

            // Tambahkan efek interaktif pada baris tabel
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.addEventListener('click', function() {
                    // Jika diperlukan, tambahkan aksi ketika baris diklik
                    // Misalnya, redirect ke detail booking
                });
            });
        });
    </script>
</body>
</html>
