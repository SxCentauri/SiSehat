<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reminder Obat Anda - MediCare</title>
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
            flex-wrap: wrap;
        }

        .header i {
            color: var(--primary);
            background: #e0f2fe;
            padding: 12px;
            border-radius: 12px;
            min-width: 46px;
            text-align: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .header h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
        }

        .date-info {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            font-size: 14px;
            background: #f8fafc;
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid var(--border);
            flex-shrink: 0;
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

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-success {
            background: var(--success);
            color: #fff;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.2);
        }

        .btn-success:hover {
            background: #0da271;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-sm {
            padding: 10px 16px;
            font-size: 13px;
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

        .reminders-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 24px;
            margin-top: 20px;
        }

        .reminder-card {
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 24px;
            border: 1px solid var(--border);
            transition: all 0.3s ease;
            position: relative;
            animation: fadeIn 0.5s ease-out;
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

        .reminder-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .reminder-card.completed {
            border-left: 4px solid var(--success);
            opacity: 0.9;
        }

        .reminder-card.pending {
            border-left: 4px solid var(--warning);
        }

        .reminder-card.urgent {
            border-left: 4px solid var(--danger);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: var(--shadow); }
            50% { box-shadow: 0 0 0 5px rgba(239, 68, 68, 0.1); }
            100% { box-shadow: var(--shadow); }
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 10px;
        }

        .time-display {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: 700;
            color: var(--text);
        }

        .time-display i {
            color: var(--text-light);
            font-size: 18px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            gap: 4px;
            flex-shrink: 0;
        }

        .status-pending {
            background-color: #fffbeb;
            color: var(--warning);
        }

        .status-completed {
            background-color: #f0fdf4;
            color: var(--success);
        }

        .medication-info {
            margin-bottom: 20px;
        }

        .medication-name {
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            color: var(--text);
        }

        .medication-name i {
            color: var(--primary);
        }

        .medication-details {
            display: grid;
            gap: 8px;
            margin-left: 28px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--text-light);
        }

        .detail-item i {
            width: 16px;
            text-align: center;
            color: var(--secondary);
        }

        .card-actions {
            margin-top: 20px;
        }

        .btn-full {
            width: 100%;
            justify-content: center;
        }

        .empty-state, .filter-empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
            grid-column: 1 / -1; /* Make it span all columns in a grid */
        }

        .empty-state i, .filter-empty-state i {
            font-size: 64px;
            margin-bottom: 16px;
            color: #d1d5db;
        }

        .empty-state h3, .filter-empty-state h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--text);
        }

        .empty-state p, .filter-empty-state p {
            font-size: 14px;
        }

        .header-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
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

        /* Responsive Styles - PERBAIKAN UTAMA */
        @media (max-width: 1200px) {
            .container {
                max-width: 100%;
                padding: 100px 20px 30px;
            }
        }

        @media (max-width: 1024px) {
            .reminders-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
            }
            
            .header {
                flex-direction: row;
                justify-content: space-between;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 90px 15px 25px;
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
                width: 100%;
            }

            .header h2 {
                font-size: 22px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .reminders-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .filter-section {
                flex-direction: row;
                align-items: stretch;
                justify-content: center;
            }

            .filter-btn {
                flex: 1;
                text-align: center;
                min-width: 120px;
            }
            
            .date-info {
                margin-top: 10px;
                width: 100%;
                justify-content: center;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            
            .time-display {
                font-size: 18px;
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

            .header-actions {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .time-display {
                font-size: 18px;
            }

            .medication-name {
                font-size: 16px;
            }

            .empty-state, .filter-empty-state {
                padding: 40px 15px;
            }

            .empty-state i, .filter-empty-state i {
                font-size: 48px;
            }
            
            .reminder-card {
                padding: 20px;
            }
            
            .filter-section {
                flex-direction: column;
            }
            
            .filter-btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 70px 10px 15px;
            }
            
            .card {
                padding: 16px;
                border-radius: 12px;
            }
            
            .header h2 {
                font-size: 18px;
            }
            
            .header-content i {
                padding: 10px;
                min-width: 42px;
                font-size: 16px;
            }
            
            .reminder-card {
                padding: 16px;
            }

            .time-display {
                font-size: 16px;
            }
            
            .medication-name {
                font-size: 16px;
                flex-direction: column;
                align-items: flex-start;
                gap: 6px;
            }
            
            .medication-details {
                margin-left: 0;
            }
            
            .detail-item {
                font-size: 13px;
            }
            
            .status-badge {
                padding: 5px 10px;
                font-size: 11px;
            }
            
            .empty-state, .filter-empty-state {
                padding: 30px 10px;
            }
            
            .empty-state i, .filter-empty-state i {
                font-size: 40px;
            }
            
            .empty-state h3, .filter-empty-state h3 {
                font-size: 16px;
            }
            
            .empty-state p, .filter-empty-state p {
                font-size: 13px;
            }
        }

        @media (max-width: 360px) {
            .container {
                padding: 70px 8px 12px;
            }
            
            .card {
                padding: 14px;
            }
            
            .header h2 {
                font-size: 16px;
            }
            
            .header-content i {
                padding: 8px;
                min-width: 38px;
                font-size: 14px;
            }
            
            .reminder-card {
                padding: 14px;
            }
            
            .time-display {
                font-size: 15px;
            }
            
            .medication-name {
                font-size: 15px;
            }
            
            .detail-item {
                font-size: 12px;
            }
            
            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, a:focus, .filter-btn:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
        
        /* Perbaikan untuk animasi di perangkat mobile */
        @media (max-width: 768px) {
            .reminder-card:hover {
                transform: none; /* Nonaktifkan transform hover di mobile */
            }
            
            .card:hover {
                transform: none; /* Nonaktifkan transform hover di mobile */
            }
        }
    </style>
</head>
<body>
    @include('layouts.medicare')

    <div class="container">
        <div class="card">
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-pills"></i>
                    <h2>Reminder Obat Anda</h2>
                    <div class="date-info">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>Hari ini: {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
                    </div>
                </div>
                <div class="header-actions">
                    <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
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
                <button class="filter-btn active" onclick="filterReminders(this, 'all')">Semua</button>
                <button class="filter-btn" onclick="filterReminders(this, 'pending')">Belum Dikonsumsi</button>
                <button class="filter-btn" onclick="filterReminders(this, 'done')">Sudah Dikonsumsi</button>
            </div>

            @if($reminders->isEmpty())
                <div class="empty-state">
                    <i class="fa-solid fa-bell-slash"></i>
                    <h3>Tidak ada reminder hari ini</h3>
                    <p>Selamat! Anda sudah mengonsumsi semua obat sesuai jadwal.</p>
                </div>
            @else
                <div class="reminders-grid">
                    @foreach($reminders as $reminder)
                        @php
                            $reminderTime = \Carbon\Carbon::parse($reminder->time);
                            $currentTime = \Carbon\Carbon::now();
                            $isUrgent = $reminder->status == 'pending' && $reminderTime->lt($currentTime);
                            // Kelas status 'done' diubah menjadi 'completed' untuk styling
                            $cardClass = $reminder->status == 'done' ? 'completed' : ($isUrgent ? 'urgent' : 'pending');
                        @endphp

                        <div class="reminder-card reminder-item {{ $cardClass }}" data-status="{{ $reminder->status }}">
                            <div class="card-header">
                                <div class="time-display">
                                    <i class="fa-regular fa-clock"></i>
                                    <span>{{ $reminderTime->format('H:i') }}</span>
                                </div>
                                <span class="status-badge {{ $reminder->status == 'done' ? 'status-completed' : 'status-pending' }}">
                                    @if($reminder->status == 'done')
                                        <i class="fa-solid fa-check-circle"></i> Selesai
                                    @else
                                        <i class="fa-solid fa-clock"></i> Belum
                                    @endif
                                </span>
                            </div>

                            <div class="medication-info">
                                <div class="medication-name">
                                    <i class="fa-solid fa-prescription-bottle-medical"></i>
                                    {{ $reminder->medication }}
                                </div>
                                <div class="medication-details">
                                    @if($reminder->dosage)
                                        <div class="detail-item">
                                            <i class="fa-solid fa-syringe"></i>
                                            <span>Dosis: {{ $reminder->dosage }}</span>
                                        </div>
                                    @endif
                                    <div class="detail-item">
                                        <i class="fa-solid fa-calendar"></i>
                                        <span>Diresepkan: {{ \Carbon\Carbon::parse($reminder->created_at)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-actions">
                                @if($reminder->status == 'pending')
                                    <form action="{{ route('patient.reminders.markAsDone', $reminder->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-full">
                                            <i class="fa-solid fa-check"></i> Tandai Sudah Dikonsumsi
                                        </button>
                                    </form>
                                @else
                                    <div class="status-badge status-completed" style="width: 100%; justify-content: center;">
                                        <i class="fa-solid fa-check-double"></i> Obat telah dikonsumsi
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    {{-- Pesan ini akan muncul jika filter tidak menemukan hasil --}}
                    <div class="filter-empty-state" style="display: none;">
                        <i class="fa-solid fa-filter"></i>
                        <h3>Tidak ada reminder dengan filter ini</h3>
                        <p>Coba pilih filter status lainnya</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        function filterReminders(clickedButton, status) {
            // Update tombol filter yang aktif
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            clickedButton.classList.add('active');

            const items = document.querySelectorAll('.reminder-item');
            const filterEmptyState = document.querySelector('.filter-empty-state');
            let visibleCount = 0;

            items.forEach(item => {
                const itemStatus = item.dataset.status;

                // Tampilkan item jika statusnya cocok, atau jika filter 'semua' dipilih
                if (status === 'all' || itemStatus === status) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Tampilkan atau sembunyikan pesan 'empty state' untuk filter
            if (filterEmptyState) {
                if (visibleCount === 0) {
                    filterEmptyState.style.display = 'block';
                } else {
                    filterEmptyState.style.display = 'none';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Sembunyikan notifikasi sukses setelah 5 detik
            const alert = document.querySelector('.alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.style.display = 'none', 500);
                }, 5000);
            }
            
            // Nonaktifkan animasi hover di perangkat mobile
            if (window.innerWidth <= 768) {
                document.querySelectorAll('.reminder-card, .card').forEach(card => {
                    card.style.transform = 'none';
                });
            }
        });
    </script>
</body>
</html>