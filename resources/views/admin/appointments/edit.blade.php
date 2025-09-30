<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Janji Temu - MediCare</title>
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
            background: #dbeafe;
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

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .form-container {
            max-width: 100%;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group-full {
            grid-column: 1 / -1;
        }

        .form-label {
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

        .form-control {
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background: white;
            width: 100%;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
        }

        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .error-message i {
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
        }

        /* Status badge styling in options */
        option[value="pending"] {
            color: #d97706;
            background: #fffbeb;
        }

        option[value="approved"] {
            color: #047857;
            background: #f0fdf4;
        }

        option[value="cancelled"] {
            color: #dc2626;
            background: #fef2f2;
        }

        option[value="completed"] {
            color: #6d28d9;
            background: #faf5ff;
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
                flex-direction: row;
                text-align: left;
                gap: 12px;
                width: 100%;
            }

            .header h2 {
                font-size: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
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

            .header h2 {
                font-size: 20px;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
            }

            .header i {
                align-self: center;
            }

            .form-control {
                padding: 12px 14px;
            }

            .form-actions {
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

            .header h2 {
                font-size: 18px;
            }

            .header i {
                padding: 10px;
                min-width: 40px;
                font-size: 16px;
            }

            .form-control {
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
            .header h2 {
                font-size: 16px;
            }

            .header i {
                padding: 8px;
                min-width: 36px;
                font-size: 14px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, .form-control:focus {
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
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <h2>Edit Janji Temu</h2>
                </div>
                <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>

            <form method="post" action="{{ route('admin.appointments.update',$appointment) }}" class="form-container">
                @csrf @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fa-solid fa-user"></i>
                            Pasien
                        </label>
                        <select class="form-control form-select" name="patient_id" required>
                            <option value="">Pilih Pasien</option>
                            @foreach($patients as $p)
                                <option value="{{ $p->id }}" @selected(old('patient_id',$appointment->patient_id)==$p->id)>
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
                        <select class="form-control form-select" name="doctor_id" required>
                            <option value="">Pilih Dokter</option>
                            @foreach($doctors as $d)
                                <option value="{{ $d->id }}" @selected(old('doctor_id',$appointment->doctor_id)==$d->id)>
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
                        <input class="form-control" type="date" name="date" value="{{ old('date',$appointment->date) }}" required>
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
                        <input class="form-control" type="time" name="time" value="{{ old('time',$appointment->time) }}" required>
                        @error('time')
                            <div class="error-message">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group form-group-full">
                        <label class="form-label">
                            <i class="fa-solid fa-list-check"></i>
                            Status
                        </label>
                        <select class="form-control form-select" name="status">
                            @foreach(['pending'=>'Pending','approved'=>'Approved','cancelled'=>'Cancelled','completed'=>'Completed'] as $k=>$v)
                                <option value="{{ $k }}" @selected(old('status',$appointment->status)==$k)>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <div class="error-message">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-save"></i> Update Janji Temu
                    </button>
                    <a class="btn btn-secondary" href="{{ route('admin.appointments.index') }}">
                        <i class="fa-solid fa-xmark"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
