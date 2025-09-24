<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Booking Ruangan - MediCare</title>
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
            max-width: 1000px;
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
            align-items: center;
            gap: 14px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
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

        .patient-info {
            background: #f8fafc;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 32px;
            border-left: 4px solid var(--primary);
        }

        .info-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .info-header i {
            color: var(--primary);
            font-size: 20px;
        }

        .info-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: var(--text);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .info-label {
            font-size: 14px;
            color: var(--text-light);
            font-weight: 500;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: var(--text);
        }

        .notes-box {
            background: #fff7ed;
            border: 1px solid #fed7aa;
            border-radius: 8px;
            padding: 16px;
            margin-top: 12px;
        }

        .notes-label {
            font-size: 14px;
            color: #ea580c;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .divider {
            height: 1px;
            background: var(--border);
            margin: 32px 0;
        }

        .form-section {
            margin-bottom: 32px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .section-header i {
            color: var(--primary);
            font-size: 18px;
        }

        .section-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: var(--text);
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
        }

        .form-select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            background-color: var(--card-bg);
            transition: all 0.3s;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23646b73'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 18px;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        .room-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
            margin-top: 12px;
        }

        .room-option {
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: 16px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .room-option:hover {
            border-color: var(--primary);
            background: #f0f9ff;
        }

        .room-option.selected {
            border-color: var(--primary);
            background: #eff6ff;
        }

        .room-option input[type="radio"] {
            display: none;
        }

        .room-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .room-details {
            flex: 1;
        }

        .room-name {
            font-weight: 600;
            color: var(--text);
            margin-bottom: 4px;
        }

        .room-capacity {
            font-size: 14px;
            color: var(--text-light);
        }

        .no-rooms {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: var(--danger);
        }

        .no-rooms i {
            font-size: 32px;
            margin-bottom: 12px;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 15px;
        }

        .btn-primary {
            background: var(--gradient);
            color: #fff;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-primary:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #e5e7eb;
        }

        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
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
                text-align: center;
                gap: 12px;
            }

            .header h1 {
                font-size: 24px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .room-options {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .button-group .btn {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
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

            .patient-info {
                padding: 16px;
            }

            .form-select {
                padding: 12px 14px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 14px;
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

        .form-group {
            animation: fadeIn 0.6s ease-out;
        }

        /* Focus states for accessibility */
        .btn:focus, .form-select:focus, .room-option:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        .room-option {
            outline: none;
        }
    </style>
</head>
<body>
    @include('layouts.medicare')
    <div class="container">
        <div class="card">
            <div class="header">
                <i class="fa-solid fa-bed-pulse"></i>
                <h1>Kelola Booking Ruangan</h1>
            </div>

            <!-- Informasi Pasien -->
            <div class="patient-info">
                <div class="info-header">
                    <i class="fa-solid fa-user-injured"></i>
                    <h2>Detail Permintaan Pasien</h2>
                </div>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Nama Pasien</span>
                        {{-- [FIX] Menggunakan variabel $roomBooking --}}
                        <span class="info-value">{{ $roomBooking->patient->name ?? 'N/A' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Tanggal Permintaan</span>
                        {{-- [FIX] Menggunakan variabel $roomBooking --}}
                        <span class="info-value">{{ $roomBooking->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Kondisi yang Dilaporkan</span>
                        {{-- [FIX] Menggunakan variabel $roomBooking --}}
                        <span class="info-value">{{ $roomBooking->condition }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status Saat Ini</span>
                        <span class="info-value">
                            {{-- [FIX] Menggunakan variabel $roomBooking --}}
                            @if($roomBooking->status == 'pending')
                                <span style="color: var(--warning);">Menunggu Persetujuan</span>
                            @elseif($roomBooking->status == 'approved')
                                <span style="color: var(--success);">Disetujui</span>
                            @else
                                <span style="color: var(--danger);">Ditolak</span>
                            @endif
                        </span>
                    </div>
                </div>
                {{-- [FIX] Menggunakan variabel $roomBooking --}}
                @if($roomBooking->notes)
                <div class="notes-box">
                    <div class="notes-label">Catatan dari Pasien:</div>
                    <div>{{ $roomBooking->notes }}</div>
                </div>
                @endif
            </div>

            <div class="divider"></div>

            <!-- Form Aksi Perawat -->
            <form action="{{ route('nurse.room-bookings.update', $roomBooking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-section">
                    <h2>Tindakan yang Akan Diambil</h2>
                    <div class="form-group">
                        <label for="status">Status Permintaan</label>
                        <select name="status" id="status" class="form-select" onchange="toggleRoomSelect(this.value)">
                            <option value="approved">Setujui Permintaan</option>
                            <option value="rejected">Tolak Permintaan</option>
                        </select>
                    </div>

                    <div id="room-select-wrapper" class="form-group">
                        <label>Pilih Ruangan Tersedia</label>
                        @if($availableRooms->isEmpty())
                            <div class="no-rooms">
                                <p>Tidak ada ruangan yang tersedia saat ini</p>
                            </div>
                        @else
                            <div class="room-options" id="room-options">
                                @foreach ($availableRooms as $room)
                                    <div class="room-option" onclick="selectRoom(this, {{ $room->id }})">
                                        <input type="radio" name="room_id" value="{{ $room->id }}" {{ $loop->first ? 'checked' : '' }}>
                                        <div class="room-details">
                                            <div class="room-name">{{ $room->name }}</div>
                                            <div class="room-capacity">Kapasitas: {{ $room->capacity }} orang</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @error('room_id')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary" id="submit-btn" @if($availableRooms->isEmpty()) disabled @endif>
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Keputusan
                    </button>
                    <a href="{{ route('nurse.room-bookings.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleRoomSelect(status) {
            const roomSelectWrapper = document.getElementById('room-select-wrapper');
            const submitBtn = document.getElementById('submit-btn');

            if (status === 'approved') {
                roomSelectWrapper.style.display = 'block';
                submitBtn.disabled = {{ $availableRooms->isEmpty() ? 'true' : 'false' }};
            } else {
                roomSelectWrapper.style.display = 'none';
                submitBtn.disabled = false;
            }
        }

        function selectRoom(element, roomId) {
            document.querySelectorAll('.room-option').forEach(opt => opt.classList.remove('selected'));
            element.classList.add('selected');
            element.querySelector('input[type="radio"]').checked = true;
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleRoomSelect(document.getElementById('status').value);
            const firstRoomOption = document.querySelector('.room-option');
            if (firstRoomOption) {
                selectRoom(firstRoomOption, firstRoomOption.querySelector('input').value);
            }
        });
    </script>
</body>
</html>
