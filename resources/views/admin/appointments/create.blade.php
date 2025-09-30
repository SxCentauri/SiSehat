<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Janji Temu - MediCare</title>
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
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .section-title i {
            color: var(--primary);
            background: #dbeafe;
            padding: 12px;
            border-radius: 12px;
            min-width: 46px;
            text-align: center;
            font-size: 18px;
        }

        .section-title h3 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
            margin: 0;
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
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-label i {
            color: var(--primary);
            font-size: 12px;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background: white;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .error-message i {
            font-size: 12px;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
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
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
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

        /* Status option styling */
        option[value="pending"] {
            color: #d97706;
        }

        option[value="approved"] {
            color: #047857;
        }

        option[value="cancelled"] {
            color: #dc2626;
        }

        option[value="completed"] {
            color: #6d28d9;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px 30px;
            }

            .card {
                padding: 24px;
            }

            .section-title {
                flex-direction: column;
                text-align: center;
                gap: 12px;
            }

            .section-title h3 {
                font-size: 22px;
            }

            .actions {
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

            .section-title h3 {
                font-size: 20px;
            }

            .section-title i {
                padding: 10px;
                min-width: 40px;
                font-size: 16px;
            }

            .form-control, .form-select {
                padding: 12px 14px;
            }

            .actions {
                gap: 10px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding-top: 60px;
            }

            .container {
                padding: 0 10px 15px;
            }

            .card {
                padding: 16px;
                border-radius: 12px;
            }

            .section-title h3 {
                font-size: 18px;
            }

            .section-title i {
                padding: 10px;
                min-width: 40px;
                font-size: 16px;
            }

            .form-control, .form-select {
                padding: 10px 12px;
                font-size: 13px;
            }

            .form-label, .error-message {
                font-size: 12px;
            }

            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }
        }

        @media (max-width: 360px) {
            .section-title h3 {
                font-size: 16px;
            }

            .section-title i {
                padding: 8px;
                min-width: 36px;
                font-size: 14px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, .form-control:focus, .form-select:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Animation for form elements */
        .form-group {
            animation: fadeIn 0.5s ease-out;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
    </style>
</head>
<body>
    @include('layouts.medicare')

    <main class="container">
        <div class="card">
            <div class="section-title">
                <i class="fa-solid fa-circle-plus"></i>
                <h3>Tambah Janji Temu</h3>
            </div>

            <form method="post" action="{{ route('admin.appointments.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-solid fa-user"></i>
                        Pasien
                    </label>
                    <select class="form-select" name="patient_id" required>
                        <option value="">-- Pilih Pasien --</option>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}" @selected(old('patient_id')==$p->id)>
                                {{ $p->name }} @if($p->id) (ID: {{ $p->id }}) @endif
                            </option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-solid fa-user-doctor"></i>
                        Dokter
                    </label>
                    <select class="form-select" name="doctor_id" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($doctors as $d)
                            <option value="{{ $d->id }}" @selected(old('doctor_id')==$d->id)>
                                {{ $d->name }} @if($d->specialization) - {{ $d->specialization }} @endif
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-solid fa-calendar-day"></i>
                        Tanggal
                    </label>
                    <input class="form-control" type="date" name="date" value="{{ old('date') }}" required>
                    @error('date')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-solid fa-clock"></i>
                        Waktu
                    </label>
                    <input class="form-control" type="time" name="time" value="{{ old('time') }}" required>
                    @error('time')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fa-solid fa-list-check"></i>
                        Status
                    </label>
                    <select class="form-select" name="status">
                        @foreach(['pending'=>'Pending','approved'=>'Approved','cancelled'=>'Cancelled','completed'=>'Completed'] as $k=>$v)
                            <option value="{{ $k }}" @selected(old('status')==$k)>
                                {{ $v }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="actions">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-save"></i> Simpan Janji Temu
                    </button>
                    <a class="btn btn-outline" href="{{ route('admin.appointments.index') }}">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
