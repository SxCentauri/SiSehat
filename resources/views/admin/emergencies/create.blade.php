<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Emergency - MediCare (Admin)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            color: var(--danger);
            background: #fee2e2;
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

        .form-textarea, .form-select, .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background: white;
        }

        .form-textarea {
            resize: vertical;
            min-height: 140px;
            line-height: 1.5;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 16px;
        }

        .form-textarea:focus, .form-select:focus, .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .grid {
            display: grid;
            gap: 16px;
        }

        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
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

        .form-hint {
            color: var(--text-light);
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-hint i {
            font-size: 12px;
            color: var(--primary);
        }

        .level-low {
            color: #15803d;
            background-color: #f0fdf4;
        }

        .level-medium {
            color: #d97706;
            background-color: #fffbeb;
        }

        .level-high {
            color: #dc2626;
            background-color: #fef2f2;
        }

        .level-critical {
            color: #be123c;
            background-color: #fdf2f8;
            font-weight: 600;
        }

        .level-option {
            padding: 8px 12px;
            border-radius: 6px;
            margin: 4px 0;
            font-weight: 500;
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

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .grid-2, .grid-3 {
                grid-template-columns: 1fr;
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

            .form-textarea, .form-select, .form-input {
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

            .form-textarea, .form-select, .form-input {
                padding: 10px 12px;
                font-size: 13px;
            }

            .form-label, .form-hint, .error-message {
                font-size: 12px;
            }

            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .form-group {
                margin-bottom: 18px;
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

            .form-textarea {
                min-height: 120px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, a:focus, .form-textarea:focus, .form-select:focus, .form-input:focus {
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
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h2>Tambah Emergency</h2>
            </div>
            <a href="{{ route('admin.emergencies.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>

        @if ($errors->any())
            <div class="form-hint" style="color:#7c2d12;background:#fff7ed;border:1px solid #fed7aa;padding:10px 12px;border-radius:10px">
                <i class="fa-solid fa-circle-exclamation" style="color:#b45309"></i> Periksa kembali inputan di bawah.
            </div>
        @endif

        <form method="POST" action="{{ route('admin.emergencies.store') }}">
            @csrf

            {{-- Pasien + Status --}}
            <div class="grid grid-2" style="margin-top:18px">
                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-user"></i> Pasien</label>
                    <select name="patient_id" class="form-select" required>
                        <option value="">— Pilih Pasien —</option>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}" @selected(old('patient_id')==$p->id)>{{ $p->name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
    <label class="form-label"><i class="fa-solid fa-list-check"></i> Status</label>
    @php
        // Untuk form edit, gunakan status yang ada. Untuk form create, default-nya 'pending'.
        $currentStatus = old('status', $emergency->status ?? 'pending');
    @endphp

    <select name="status" class="form-select" required>
        <option value="pending" @selected($currentStatus === 'pending')>Pending</option>
        <option value="approved" @selected($currentStatus === 'approved')>Approved</option>
        <option value="completed" @selected($currentStatus === 'completed')>Completed</option>
        <option value="rejected" @selected($currentStatus === 'rejected')>Rejected</option>
        <option value="cancelled" @selected($currentStatus === 'cancelled')>Cancelled</option>
    </select>

    <div class="form-hint"><i class="fa-solid fa-lightbulb"></i> Gunakan <em>In Progress</em> saat penanganan sedang berjalan.</div>
    @error('status')
        <div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>
    @enderror
</div>
            </div>

            {{-- Deskripsi --}}
            <div class="form-group" style="margin-top:2px">
                <label class="form-label"><i class="fa-solid fa-comment-medical"></i> Deskripsi Kejadian</label>
                <textarea name="description" class="form-textarea" placeholder="Jelaskan detail kondisi/kejadian darurat." required>{{ old('description') }}</textarea>
                @error('description')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
            </div>

            {{-- Level (opsi sama seperti pasien) --}}
            <div class="form-group">
                <label class="form-label"><i class="fa-solid fa-triangle-exclamation"></i> Tingkat Kedaruratan</label>
                <select name="level" class="form-select">
                    <option value="">Pilih tingkat kedaruratan…</option>
                    <option value="low"      class="level-low"      @selected(old('level')==='low')>Rendah — butuh saran medis</option>
                    <option value="medium"   class="level-medium"   @selected(old('level')==='medium')>Sedang — perlu perhatian beberapa jam</option>
                    <option value="high"     class="level-high"     @selected(old('level')==='high')>Tinggi — penanganan segera</option>
                    <option value="critical" class="level-critical" @selected(old('level')==='critical')>Kritis — mengancam jiwa</option>
                </select>
                @error('level')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
            </div>

            {{-- Penugasan (opsional) --}}
            <div class="grid grid-3">
                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-user-doctor"></i> Dokter (opsional)</label>
                    <select name="assigned_doctor_id" class="form-select">
                        <option value="">—</option>
                        @foreach($doctors as $d)
                            <option value="{{ $d->id }}" @selected(old('assigned_doctor_id')==$d->id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                    @error('assigned_doctor_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-user-nurse"></i> Perawat (opsional)</label>
                    <select name="handled_by_nurse_id" class="form-select">
                        <option value="">—</option>
                        @foreach($nurses as $n)
                            <option value="{{ $n->id }}" @selected(old('handled_by_nurse_id')==$n->id)>{{ $n->name }}</option>
                        @endforeach
                    </select>
                    @error('handled_by_nurse_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-bed"></i> Ruangan (opsional)</label>
                    <select name="assigned_room_id" class="form-select">
                        <option value="">—</option>
                        @foreach($availableRooms as $r)
                            <option value="{{ $r->id }}" @selected(old('assigned_room_id')==$r->id)>{{ $r->name }} @if(isset($r->capacity,$r->occupied)) (Tersedia: {{ max($r->capacity - $r->occupied, 0) }}/{{ $r->capacity }}) @endif</option>
                        @endforeach
                    </select>
                    @error('assigned_room_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Aksi --}}
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Emergency
                </button>
                <a href="{{ route('admin.emergencies.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i> Batal
                </a>
            </div>
        </form>
    </div>
</main>
</body>
</html>
