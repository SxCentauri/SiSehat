<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perawat - MediCare Hospital</title>
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
            --nurse: #8b5cf6;
            --nurse-dark: #7c3aed;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #1f2937;
            --text-light: #6b7280;
            --border: #e5e7eb;
            --radius: 16px;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            --gradient: linear-gradient(135deg, var(--nurse), var(--nurse-dark));
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
            animation: fadeInUp 0.6s ease-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .grid {
            display: grid;
            gap: 24px;
            margin-bottom: 30px;
        }

        .grid-auto-fit {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .grid-full {
            grid-template-columns: 1fr;
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
            color: var(--nurse);
            background: #f3e8ff;
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

        .stat-card {
            text-align: center;
            padding: 24px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin: 0 auto 16px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            color: var(--nurse);
            margin: 8px 0;
            line-height: 1;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 16px;
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
            box-shadow: 0 4px 6px rgba(139, 92, 246, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-outline {
            background: #f1f5f9;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
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

        .btn-sm {
            padding: 10px 16px;
            font-size: 13px;
        }

        .btn-full {
            width: 100%;
            justify-content: center;
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

        .profile-card {
            text-align: center;
            padding: 24px;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            text-align: left;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            flex-shrink: 0;
        }

        .profile-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 4px;
            color: var(--text);
        }

        .profile-info p {
            color: var(--text-light);
            font-size: 14px;
        }

        .progress-container {
            margin: 20px 0;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
            color: var(--text-light);
        }

        .progress-value {
            font-weight: 600;
            color: var(--nurse);
        }

        .progress-bar {
            height: 8px;
            background: #f1f5f9;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--gradient);
            border-radius: 10px;
            transition: width 0.5s ease;
        }

        .emergency-stat .stat-number {
            color: var(--danger);
            background: linear-gradient(135deg, #ef4444, #dc2626);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .emergency-stat .stat-icon {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .quick-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }

        .quick-stat {
            text-align: center;
            padding: 16px;
            background: #f8fafc;
            border-radius: 10px;
            border: 1px solid var(--border);
        }

        .quick-stat-number {
            font-size: 24px;
            font-weight: 700;
            color: var(--nurse);
            margin-bottom: 4px;
        }

        .quick-stat-label {
            font-size: 12px;
            color: var(--text-light);
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .grid-auto-fit {
                grid-template-columns: repeat(2, 1fr);
            }
        }

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

            .grid-auto-fit {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 28px;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }
             .card--hero .header{
    justify-content: center;   /* header di tengah */
    text-align: center;
    gap: 16px;
  }
  .card--hero .header-content{
    flex-direction: column;    /* ikon di atas, judul di bawah */
    align-items: center;       /* horizontal center */
    justify-content: center;
    width: 100%;
  }
  .card--hero .header-content h2{
    text-align: center;        /* teksnya ikut center */
  }
  .card--hero .header i{
    margin: 0 auto;            /* ikon tepat di tengah */
  }
  .card--hero .header > div:last-child{ /* blok tanggal */
    width: 100%;
    text-align: center;
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

            .btn {
                width: 100%;
                justify-content: center;
            }

            .quick-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .stat-number {
                font-size: 24px;
            }

            .quick-stats {
                grid-template-columns: 1fr;
            }

            .profile-avatar {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, a:focus, button:focus {
            outline: 2px solid var(--nurse);
            outline-offset: 2px;
        }

        /* Animation delays for cards */
        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }
        .card:nth-child(5) { animation-delay: 0.5s; }
        .card:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>
<body>
    @include('layouts.medicare')

    <main class="container">
        @if(session('ok'))
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('ok') }}</span>
            </div>
        @endif

        <!-- Welcome Header -->
        <div class="card card--hero" style="margin-bottom: 30px;">
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-user-nurse"></i>
                    <h2>Dashboard Perawat</h2>
                </div>
                <div style="color: var(--text-light); font-size: 14px;">
                    <i class="fa-solid fa-calendar-day"></i>
                    <span>{{ \Carbon\Carbon::now()->format('l, d F Y') }}</span>
                </div>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="grid grid-auto-fit">
            <!-- Permintaan Booking -->
            <div class="card stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-bed-pulse"></i>
                </div>
                <div class="stat-number">{{ $pendingBookings ?? 0 }}</div>
                <div class="stat-label">Permintaan Booking</div>
                <a href="{{ route('nurse.room-bookings.index') }}" class="btn btn-outline btn-sm btn-full">
                    <i class="fa-solid fa-gear"></i> Proses
                </a>
            </div>

            <!-- Status Ruangan -->
            <div class="card stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-hospital"></i>
                </div>
                <div class="stat-number">{{ $rooms ?? 0 }}</div>
                <div class="stat-label">Status Ruangan</div>
                <a href="{{ route('nurse.rooms.index') }}" class="btn btn-outline btn-sm btn-full">
                    <i class="fa-solid fa-cog"></i> Kelola Ruangan
                </a>
            </div>

            <!-- Reminder Obat -->
            <div class="card stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-pills"></i>
                </div>
                <div class="stat-number">{{ $reminders ?? 0 }}</div>
                <div class="stat-label">Reminder Obat</div>
                <a href="{{ route('nurse.reminders.index') }}" class="btn btn-outline btn-sm btn-full">
                    <i class="fa-solid fa-eye"></i> Lihat Jadwal
                </a>
            </div>

            <!-- Jadwal & Tugas -->
            <div class="card stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
                <div class="stat-number">{{ $schedules ?? 0 }}</div>
                <div class="stat-label">Jadwal & Tugas</div>
                <a href="{{ route('nurse.schedules.index') }}" class="btn btn-outline btn-sm btn-full">
                    <i class="fa-solid fa-tasks"></i> Kelola Tugas
                </a>
            </div>

            <!-- Support Dokter -->
            <div class="card stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
                <div class="stat-number">{{ $supports ?? 0 }}</div>
                <div class="stat-label">Support Dokter</div>
                <a href="{{ route('nurse.supports.index') }}" class="btn btn-outline btn-sm btn-full">
                    <i class="fa-solid fa-list"></i> Lihat Detail
                </a>
            </div>

            <!-- Emergency -->
            <div class="card stat-card emergency-stat">
                <div class="stat-icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="stat-number">{{ $emergencies ?? 0 }}</div>
                <div class="stat-label">Kasus Darurat</div>
                <a href="{{ route('nurse.emergencies.index') }}" class="btn btn-danger btn-sm btn-full">
                    <i class="fa-solid fa-bolt"></i> Respon Darurat
                </a>
            </div>
        </div>

        <!-- Profile Card -->
        <div class="grid grid-full">
            <div class="card profile-card">
                <div class="profile-header">
                    <div class="profile-avatar">
                        <i class="fa-solid fa-user-nurse"></i>
                    </div>
                    <div class="profile-info">
                        <h3>Profil Perawat</h3>
                        <p>Kelola informasi profil dan preferensi kerja Anda</p>
                    </div>
                </div>

                <div class="progress-container">
                    <div class="progress-label">
                        <span>Kelengkapan Profil</span>
                        <span class="progress-value">{{ $profileScore ?? 0 }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $profileScore ?? 0 }}%"></div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="quick-stats">
                    <div class="quick-stat">
                        <div class="quick-stat-number">{{ $pendingBookings ?? 0 }}</div>
                        <div class="quick-stat-label">Booking Pending</div>
                    </div>
                    <div class="quick-stat">
                        <div class="quick-stat-number">{{ $reminders ?? 0 }}</div>
                        <div class="quick-stat-label">Reminder Hari Ini</div>
                    </div>
                    <div class="quick-stat">
                        <div class="quick-stat-number">{{ $schedules ?? 0 }}</div>
                        <div class="quick-stat-label">Tugas Aktif</div>
                    </div>
                    <div class="quick-stat">
                        <div class="quick-stat-number">{{ $emergencies ?? 0 }}</div>
                        <div class="quick-stat-label">Darurat</div>
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <a class="btn btn-primary btn-full" href="{{ route('nurse.profile.edit') }}">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide alert after 5 seconds
            const alert = document.querySelector('.alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => {
                        alert.style.display = 'none';
                    }, 500);
                }, 5000);
            }

            // Add pulse animation to emergency card if there are emergencies
            const emergencyCount = {{ $emergencies ?? 0 }};
            if (emergencyCount > 0) {
                const emergencyCard = document.querySelector('.emergency-stat');
                emergencyCard.style.animation = 'pulse 2s infinite';

                // Add CSS for pulse animation
                const style = document.createElement('style');
                style.textContent = `
                    @keyframes pulse {
                        0% { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1); }
                        50% { transform: translateY(-5px) scale(1.02); box-shadow: 0 20px 40px rgba(239, 68, 68, 0.3); }
                        100% { transform: translateY(-5px); box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1); }
                    }
                `;
                document.head.appendChild(style);
            }

            // Add hover effects to quick stats
            const quickStats = document.querySelectorAll('.quick-stat');
            quickStats.forEach(stat => {
                stat.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
                });
                stat.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
        });
    </script>
</body>
</html>
