<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tangani Permintaan Darurat - MediCare</title>
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
                transform: translateY(20px);
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
            color: var(--danger);
            background: #fee2e2;
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

        .patient-info {
            background: #f8fafc;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 30px;
            border: 1px solid var(--border);
        }

        .patient-info h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .patient-info h3 i {
            color: var(--primary);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .info-label {
            font-size: 12px;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-value {
            font-size: 16px;
            font-weight: 500;
            color: var(--text);
        }

        .level-high {
            color: var(--danger);
            font-weight: 600;
        }

        .level-medium {
            color: var(--warning);
            font-weight: 600;
        }

        .level-low {
            color: var(--success);
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
        }

        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background-color: white;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .action-fields {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }

        .action-fields.hidden {
            display: none;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            gap: 4px;
        }

        .status-pending {
            background-color: #fffbeb;
            color: var(--warning);
        }

        .room-option {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }

        .room-availability {
            font-size: 12px;
            color: var(--text-light);
            background: #f1f5f9;
            padding: 4px 8px;
            border-radius: 6px;
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

            .header h1 {
                font-size: 22px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
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

            .patient-info {
                padding: 20px;
            }

            .action-fields {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .info-value {
                font-size: 14px;
            }

            .form-select {
                padding: 10px 14px;
                font-size: 13px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, .form-select:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    @extends('layouts.medicare')

    <div class="container">
        <div class="card">
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <h1>Tangani Permintaan Darurat</h1>
                </div>
                <div class="header-actions">
                    <a href="{{ route('admin.emergencies.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>

            <!-- Patient Information -->
            <div class="patient-info">
                <h3>
                    <i class="fa-solid fa-user-injured"></i>
                    Detail Pasien
                </h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Nama Pasien</span>
                        <span class="info-value">{{ $emergency->patient->name ?? 'N/A' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Level Darurat</span>
                        <span class="info-value level-{{ $emergency->level }}">
                            <i class="fa-solid fa-{{ $emergency->level == 'high' ? 'fire' : ($emergency->level == 'medium' ? 'exclamation-triangle' : 'info-circle') }}"></i>
                            {{ ucfirst($emergency->level) }}
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status Saat Ini</span>
                        <span class="status-badge status-pending">
                            <i class="fa-solid fa-clock"></i>
                            Pending
                        </span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Waktu Permintaan</span>
                        <span class="info-value">{{ $emergency->created_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
                <div class="info-item" style="margin-top: 16px;">
                    <span class="info-label">Deskripsi Darurat</span>
                    <span class="info-value" style="background: white; padding: 12px; border-radius: 8px; border: 1px solid var(--border);">
                        {{ $emergency->description }}
                    </span>
                </div>
            </div>

            <!-- Action Form -->
            <form action="{{ route('admin.emergencies.update', $emergency->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status" class="form-label">
                        <i class="fa-solid fa-list-check"></i>
                        Tindakan yang Akan Diambil
                    </label>
                    <select name="status" id="status" class="form-select" onchange="toggleActionFields(this.value)">
                        <option value="approved">Setujui & Tugaskan</option>
                        <option value="rejected">Tolak Permintaan</option>
                    </select>
                </div>

                <div id="action-fields" class="action-fields">
                    <div class="form-group">
                        <label for="assigned_doctor_id" class="form-label">
                            <i class="fa-solid fa-user-doctor"></i>
                            Tugaskan Dokter
                        </label>
                        <select name="assigned_doctor_id" id="assigned_doctor_id" class="form-select" required>
                            <option value="">Pilih Dokter...</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">
                                    {{ $doctor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="assigned_room_id" class="form-label">
                            <i class="fa-solid fa-bed"></i>
                            Tempatkan di Ruangan
                        </label>
                        <select name="assigned_room_id" id="assigned_room_id" class="form-select" required>
                            <option value="">Pilih Ruangan...</option>
                            @forelse($availableRooms as $room)
                                <option value="{{ $room->id }}">
                                    <div class="room-option">
                                        <span>{{ $room->name }}</span>
                                        <span class="room-availability">
                                            Tersedia: {{ $room->capacity - $room->occupied }}/{{ $room->capacity }}
                                        </span>
                                    </div>
                                </option>
                            @empty
                                <option value="" disabled>Tidak ada ruangan tersedia</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Simpan Tindakan
                    </button>
                    <a href="{{ route('admin.emergencies.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-xmark"></i>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleActionFields(status) {
            const fields = document.getElementById('action-fields');
            const doctorSelect = document.getElementById('assigned_doctor_id');
            const roomSelect = document.getElementById('assigned_room_id');

            if (status === 'approved') {
                fields.classList.remove('hidden');
                doctorSelect.required = true;
                roomSelect.required = true;
            } else {
                fields.classList.add('hidden');
                doctorSelect.required = false;
                roomSelect.required = false;
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initial state
            toggleActionFields(document.getElementById('status').value);

            // Add confirmation for rejection
            const form = document.querySelector('form');
            const statusSelect = document.getElementById('status');

            form.addEventListener('submit', function(e) {
                if (statusSelect.value === 'rejected') {
                    if (!confirm('Apakah Anda yakin ingin menolak permintaan darurat ini?')) {
                        e.preventDefault();
                    }
                }
            });

            // Add focus effects
            const selects = document.querySelectorAll('.form-select');
            selects.forEach(select => {
                select.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateX(5px)';
                });
                select.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</body>
</html>
