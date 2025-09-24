<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perawat - MediCare Hospital</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #60a5fa;
            --light-blue: #dbeafe;
            --extra-light-blue: #eff6ff;
            --text-color: #1f2937;
            --text-light: #6b7280;
            --white: #ffffff;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
            --shadow: 0 20px 50px rgba(37, 99, 235, 0.1);
            --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
        }

        body {
            line-height: 1.6;
            color: var(--text-color);
            overflow-x: hidden;
            background: #f8fafc; /* Latar belakang sedikit abu-abu untuk kontras */
            padding-top: 80px;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        /* Kartu & Grid */
        .card {
            background: #fff;
            border-radius: 25px;
            box-shadow: var(--shadow);
            padding: 2.5rem;
            margin-bottom: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(96, 165, 250, 0.1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-hover);
            border-color: rgba(96, 165, 250, 0.2);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: var(--gradient);
            transition: left 0.4s ease;
        }

        .card:hover::before {
            left: 0;
        }

        .grid {
            display: grid;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        /* Grid yang fleksibel untuk 6 kartu */
        .grid-auto-fit {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        }

        /* Section Title */
        .section-title {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-color);
        }

        .section-title i {
            color: var(--primary-color);
            font-size: 1.3rem;
            width: 45px;
            height: 45px;
            background: var(--gradient-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* Statistik Cards */
        .stat-card {
            text-align: center;
            padding: 2rem 1.5rem;
            justify-content: space-between;
        }

        .stat-card-content { width: 100%; }
        .stat-number {
            font-size: 2.8rem; font-weight: 800;
            margin: 1rem 0;
            background: linear-gradient(135deg, var(--text-color) 0%, var(--primary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }
        .stat-description {
            color: var(--text-light); font-size: 0.95rem;
            margin-bottom: 1.5rem; line-height: 1.5;
            min-height: 2.8rem; display: flex;
            align-items: center; justify-content: center;
        }

        .progress-container {
        margin: 1.5rem 0;
        width: 100%;
    }

        .progress-label {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: var(--text-light);
        width: 100%;
    }

    .progress-bar {
        height: 8px;
        background: #eef2ff;
        border-radius: 10px;
        overflow: hidden;
        width: 100%;
    }

    .progress-fill {
        height: 100%;
        background: var(--gradient);
        border-radius: 10px;
        transition: width 0.5s ease;
    }

    .progress-value {
        font-weight: 700;
        color: var(--secondary-color);
    }

        /* Buttons */
        .btn {
            padding: 0.9rem 1.8rem; font-size: 0.95rem; font-weight: 600;
            border: none; border-radius: 12px; cursor: pointer;
            transition: all 0.3s ease; display: inline-flex;
            align-items: center; justify-content: center; gap: 0.5rem;
            text-align: center;
        }
        .btn-primary {
            background: var(--gradient); color: white;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
        }
        .btn-outline {
            background: transparent; border: 2px solid var(--primary-color);
            color: var(--primary-color);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.1);
        }
        .btn-outline:hover {
            background: var(--primary-color); color: white;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(37, 99, 235, 0.2);
        }
        .btn-sm { padding: 0.7rem 1.4rem; font-size: 0.85rem; }

        /* Table */
        .table-container { overflow-x: auto; }
        .table {
            width: 100%; border-collapse: separate; border-spacing: 0;
            background: white; border-radius: 20px; overflow: hidden;
        }
        .table th {
            background: var(--gradient-light); color: var(--primary-color);
            padding: 1.2rem 1.5rem; font-weight: 600; text-align: left;
            font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;
        }
        .table td {
            padding: 1.2rem 1.5rem; border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem; vertical-align: middle;
        }
        .table tr:last-child td { border-bottom: none; }
        .table tr:hover { background: #f8fafc; }
        .table-actions { display: flex; gap: 0.5rem; }

        /* Badge & Status */
        .badge {
            display: inline-block; padding: 0.5rem 1rem; border-radius: 20px;
            font-size: 0.8rem; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.5px;
        }
        .badge.critical { background: #fee2e2; color: #991b1b; }
        .badge.stable { background: #dcfce7; color: #166534; }
        .badge.observation { background: #fef3c7; color: #92400e; }

        /* Actions */
        .actions {
            margin-top: auto; padding-top: 1.5rem;
            width: 100%; display: flex; justify-content: center;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container { padding: 0 1.5rem; }
        }
        @media (max-width: 768px) {
            .grid-auto-fit { grid-template-columns: 1fr; }
            .card { padding: 2rem 1.5rem; border-radius: 20px; }
        }
    </style>
</head>
<body>
    @include('layouts.medicare')

    <main class="container">
        @if(session('ok'))
      <div class="flash">
        <i class="fa-solid fa-circle-check"></i> {{ session('ok') }}
      </div>
    @endif

        <div class="grid grid-auto-fit">
            <div class="card stat-card">
                <div class="stat-card-content">
                    <div class="section-title"><i class="fa-solid fa-bed-pulse"></i><h3>Permintaan Booking</h3></div>
                    <div class="stat-number">{{ $pendingBookings }}</div>
                    <p class="stat-description">Menunggu Persetujuan</p>
                </div>
                <div class="actions">
                    <a href="{{ route('nurse.room-bookings.index') }}" class="btn btn-outline btn-sm">Proses</a>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-card-content">
                    <div class="section-title"><i class="fa-solid fa-hospital"></i><h3>Status Ruangan</h3></div>
                    <div class="stat-number">{{ $rooms ?? 0 }}</div>
                    <p class="stat-description">Ruangan tersedia / terisi</p>
                </div>
                <div class="actions">
                    <a href="{{ route('nurse.rooms.index') }}" class="btn btn-outline btn-sm">Kelola Ruangan</a>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-card-content">
                    <div class="section-title"><i class="fa-solid fa-pills"></i><h3>Reminder Obat</h3></div>
                    <div class="stat-number">{{ $reminders ?? 0 }}</div>
                    <p class="stat-description">Jadwal obat untuk pasien</p>
                </div>
                <div class="actions">
                    <a href="{{ route('nurse.reminders.index') }}" class="btn btn-outline btn-sm">Lihat Jadwal</a>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-card-content">
                    <div class="section-title"><i class="fa-solid fa-calendar-check"></i><h3>Jadwal & Tugas</h3></div>
                    <div class="stat-number">{{ $schedules ?? 0 }}</div>
                    <p class="stat-description">Tugas & shift hari ini</p>
                </div>
                <div class="actions">
                    <a href="{{ route('nurse.schedules.index') }}" class="btn btn-outline btn-sm">Kelola Tugas</a>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-card-content">
                    <div class="section-title"><i class="fa-solid fa-user-doctor"></i><h3>Support Dokter</h3></div>
                    <div class="stat-number">{{ $supports ?? 0 }}</div>
                    <p class="stat-description">Permintaan bantuan dokter</p>
                </div>
                <div class="actions">
                    <a href="{{ route('nurse.supports.index') }}" class="btn btn-outline btn-sm">Lihat Detail</a>
                </div>
            </div>

            <div class="card stat-card">
                <div class="stat-card-content">
                    <div class="section-title"><i class="fa-solid fa-triangle-exclamation"></i><h3>Emergency</h3></div>
                    <div class="stat-number" style="background: linear-gradient(135deg, #b91c1c 0%, #ef4444 100%); -webkit-background-clip: text; background-clip: text;">{{ $emergencies ?? 0 }}</div>
                    <p class="stat-description">Kasus darurat menunggu</p>
                </div>
                <div class="actions">
                    <a href="{{ route('nurse.emergencies.index') }}" class="btn btn-outline btn-sm">Respon Darurat</a>
                </div>
            </div>

            <div class="grid" style="grid-template-columns: 1fr;">
            <div class="card">
                <div class="section-title">
                    <i class="fa-solid fa-user-nurse"></i> {{-- Icon diubah --}}
                    <h3>Profil Perawat</h3> {{-- Judul diubah --}}
                </div>
                <div class="card-text-content">
                    <p class="text-muted">Skor kelengkapan profil:</p>
                    <div class="progress-container">
                        <div class="progress-label">
                            <span>Kelengkapan</span>
                            <span class="progress-value">{{ $profileScore ?? 0 }}%</span> {{-- Panggil skor --}}
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:{{ $profileScore ?? 0 }}%"></div>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    {{-- Route diubah ke nurse.profile.edit --}}
                    <a class="btn btn-primary btn-sm w-100" href="{{ route('nurse.profile.edit') }}">
                        <i class="fa-solid fa-pen"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
