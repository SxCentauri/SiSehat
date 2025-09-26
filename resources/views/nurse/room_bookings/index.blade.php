<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Booking Ruangan - MediCare</title>
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
            --info: #3b82f6;
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

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
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

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .stats {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #f8fafc;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
        }

        .stat-pending { color: var(--warning); }
        .stat-approved { color: var(--success); }
        .stat-rejected { color: var(--danger); }
        .stat-completed { color: var(--completed); }

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
            margin-top: 20px;
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

        .patient-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .patient-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .patient-details {
            display: flex;
            flex-direction: column;
        }

        .patient-name {
            font-weight: 600;
            color: var(--text);
        }

        .patient-id {
            font-size: 12px;
            color: var(--text-light);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            gap: 6px;
        }

        .status-pending {
            background-color: #fffbeb;
            color: var(--warning);
            border: 1px solid #fef3c7;
        }

        .status-approved {
            background-color: #f0fdf4;
            color: var(--success);
            border: 1px solid #bbf7d0;
        }

        .status-completed {
            background-color: #faf5ff;
            color: var(--completed);
            border: 1px solid #e9d5ff;
        }

        .status-rejected {
            background-color: #fef2f2;
            color: var(--danger);
            border: 1px solid #fecaca;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-manage {
            background: var(--gradient);
            color: white;
        }

        .btn-manage:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-complete {
            background: var(--success);
            color: white;
        }

        .btn-complete:hover {
            background: #0da271;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .action-disabled {
            color: var(--text-light);
            font-style: italic;
            padding: 8px 0;
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

        .action-form {
            display: inline;
        }

        /* Filter Section */
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

            .header h1 {
                font-size: 24px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .stats {
                justify-content: center;
                width: 100%;
            }

            th, td {
                padding: 12px 16px;
            }

            .table-container {
                font-size: 14px;
            }

            .patient-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .patient-avatar {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .action-btn {
                padding: 6px 12px;
                font-size: 13px;
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

            .header h1 {
                font-size: 22px;
            }

            th, td {
                padding: 10px 12px;
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

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            th, td {
                padding: 8px 10px;
            }

            .stats {
                flex-direction: column;
                width: 100%;
            }

            .stat-item {
                justify-content: center;
            }

            .action-btn {
                padding: 5px 10px;
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
        .action-btn:focus, .filter-btn:focus, .btn:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Confirmation dialog styling */
        .confirmation-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .dialog-content {
            background: white;
            padding: 24px;
            border-radius: 12px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            animation: fadeIn 0.3s ease-out;
        }

        .dialog-buttons {
            display: flex;
            gap: 12px;
            margin-top: 20px;
            justify-content: center;
        }

        .btn-confirm {
            background: var(--success);
            color: white;
        }

        .btn-cancel {
            background: var(--danger);
            color: white;
        }
    </style>
</head>
<body>
    @include('layouts.medicare')
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-bed-pulse"></i>
                    <h1>Manajemen Booking Ruangan</h1>
                </div>
                <div class="header-actions">
                    <a href="{{ route('nurse.dashboard') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <div class="stats">
                <div class="stat-item stat-pending">
                    <i class="fa-solid fa-clock"></i>
                    <span>Pending: {{ $bookings->where('status', 'pending')->count() }}</span>
                </div>
                <div class="stat-item stat-approved">
                    <i class="fa-solid fa-check-circle"></i>
                    <span>Disetujui: {{ $bookings->where('status', 'approved')->count() }}</span>
                </div>
                <div class="stat-item stat-completed">
                    <i class="fa-solid fa-check-double"></i>
                    <span>Selesai: {{ $bookings->where('status', 'completed')->count() }}</span>
                </div>
                <div class="stat-item stat-rejected">
                    <i class="fa-solid fa-times-circle"></i>
                    <span>Ditolak: {{ $bookings->where('status', 'rejected')->count() }}</span>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Filter Section -->
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
                            <th>Pasien</th>
                            <th>Kondisi</th>
                            <th>Tanggal Request</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr class="booking-row" data-status="{{ $booking->status }}">
                                <td>
                                    <div class="patient-info">
                                        <div class="patient-avatar">
                                            {{ substr($booking->patient->name ?? 'N/A', 0, 1) }}
                                        </div>
                                        <div class="patient-details">
                                            <span class="patient-name">{{ $booking->patient->name ?? 'N/A' }}</span>
                                            <span class="patient-id">ID: {{ $booking->patient->id ?? '-' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="condition-text">
                                        {{ Str::limit($booking->condition, 50) }}
                                        @if(strlen($booking->condition) > 50)
                                            <span class="text-primary cursor-pointer" title="{{ $booking->condition }}">...</span>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $booking->created_at->format('d M Y, H:i') }}</td>
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
                                    @if($booking->status == 'pending')
                                        <a href="{{ route('nurse.room-bookings.edit', $booking->id) }}" class="action-btn btn-manage">
                                            <i class="fa-solid fa-pen-to-square"></i> Kelola
                                        </a>
                                    @elseif($booking->status == 'approved')
                                        <form action="{{ route('nurse.room-bookings.checkout', $booking->id) }}" method="POST" class="action-form">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="action-btn btn-complete" onclick="return showConfirmationDialog(event)">
                                                <i class="fa-solid fa-check"></i> Selesaikan
                                            </button>
                                        </form>
                                    @else
                                        <span class="action-disabled">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="fa-solid fa-clipboard-list"></i>
                                        <h3>Tidak ada data booking</h3>
                                        <p>Belum ada permintaan booking ruangan yang masuk</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Confirmation Dialog -->
    <div class="confirmation-dialog" id="checkoutDialog">
        <div class="dialog-content">
            <i class="fa-solid fa-question-circle" style="font-size: 48px; color: var(--warning); margin-bottom: 16px;"></i>
            <h3 style="margin-bottom: 8px;">Konfirmasi Penyelesaian</h3>
            <p>Apakah Anda yakin ingin menyelesaikan masa inap pasien ini?</p>
            <div class="dialog-buttons">
                <button type="button" class="action-btn btn-cancel" onclick="closeDialog()">
                    <i class="fa-solid fa-times"></i> Batal
                </button>
                <button type="button" class="action-btn btn-confirm" onclick="confirmAndSubmit()">
                    <i class="fa-solid fa-check"></i> Ya, Selesaikan
                </button>
            </div>
        </div>
    </div>

    <script>
        let currentForm = null;

        function showConfirmationDialog(event) {
            event.preventDefault();
            currentForm = event.target.closest('form');
            document.getElementById('checkoutDialog').style.display = 'flex';
            return false;
        }

        function confirmAndSubmit() {
            if (currentForm) {
                currentForm.submit();
            }
            closeDialog();
        }

        function closeDialog() {
            document.getElementById('checkoutDialog').style.display = 'none';
            currentForm = null;
        }

        function filterBookings(status) {
            // Update active filter button
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter rows
            const rows = document.querySelectorAll('.booking-row');
            rows.forEach(row => {
                if (status === 'all' || row.dataset.status === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
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

            // Tutup dialog ketika klik di luar konten
            document.getElementById('checkoutDialog').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeDialog();
                }
            });

            // Tutup dialog dengan ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeDialog();
                }
            });
        });
    </script>
</body>
</html>
