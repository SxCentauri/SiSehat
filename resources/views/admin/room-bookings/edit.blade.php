<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking - MediCare</title>
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
            background: #dbeafe;
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
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 13px;
            white-space: nowrap;
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

        .btn-primary {
            background: var(--gradient);
            color: #fff;
            box-shadow: 0 4px 6px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(37, 99, 235, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text);
            font-size: 14px;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background: white;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .form-control:hover, .form-select:hover {
            border-color: #cbd5e1;
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .error-message {
            display: block;
            margin-top: 6px;
            color: var(--danger);
            font-size: 12px;
            font-weight: 500;
        }

        .help-text {
            display: block;
            margin-top: 6px;
            color: var(--text-light);
            font-size: 12px;
            font-style: italic;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .actions .btn {
            padding: 12px 24px;
            font-size: 14px;
        }

        /* Form layout improvements */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
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
                align-items: center;
                gap: 16px;
                text-align: center;
            }

            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 12px;
                width: 100%;
            }

            .header h1 {
                font-size: 22px;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
            }

            .header-actions .btn {
                width: auto;
                min-width: 200px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .actions {
                flex-direction: column;
            }

            .actions .btn {
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

            .header i {
                padding: 10px;
                min-width: 40px;
                font-size: 16px;
            }

            .form-control, .form-select, .btn {
                padding: 10px 14px;
                font-size: 13px;
            }
        }

        @media (max-width: 480px) {
            .card {
                padding: 16px;
                border-radius: 12px;
            }

            .header h1 {
                font-size: 18px;
            }

            .header i {
                padding: 8px;
                min-width: 36px;
                font-size: 14px;
            }

            .form-group {
                margin-bottom: 16px;
            }

            .header-actions .btn {
                width: 100%;
                min-width: auto;
                justify-content: center;
            }
        }

        @media (max-width: 360px) {
            .header-content {
                gap: 8px;
            }

            .header h1 {
                font-size: 16px;
            }

            .btn {
                padding: 8px 12px;
                font-size: 12px;
            }
        }

        /* Focus states for accessibility */
        .btn:focus, .form-control:focus, .form-select:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    @extends('layouts.medicare')

    <div class="container">
        <div class="card">
            <!-- Header Section -->
            <div class="header">
                <div class="header-content">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <h1>Edit Booking</h1>
                </div>
                <div class="header-actions">
                    <a href="{{ route('admin.room-bookings.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>

            <!-- Form Section -->
            <form method="post" action="{{ route('admin.room-bookings.update',$room_booking) }}">
                @csrf @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Ruangan</label>
                        <select class="form-select" name="room_id" required>
                            @foreach($rooms as $r)
                                <option value="{{ $r->id }}" @selected(old('room_id',$room_booking->room_id)==$r->id)>
                                    {{ $r->code ?? $r->name }} - {{ $r->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('room_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" required>
                            @foreach(['pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected','completed'=>'Completed'] as $k=>$v)
                                <option value="{{ $k }}" @selected(old('status',$room_booking->status)==$k)>{{ $v }}</option>
                            @endforeach
                        </select>
                        @error('status') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Pasien</label>
                        <select class="form-select" name="patient_id" required>
                            @foreach($patients as $p)
                                <option value="{{ $p->id }}" @selected(old('patient_id',$room_booking->patient_id)==$p->id)>{{ $p->name }}</option>
                            @endforeach
                        </select>
                        @error('patient_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Perawat</label>
                        <select class="form-select" name="nurse_id">
                            <option value="">- Tidak ada -</option>
                            @foreach($nurses as $n)
                                <option value="{{ $n->id }}" @selected(old('nurse_id',$room_booking->nurse_id)==$n->id)>{{ $n->name }}</option>
                            @endforeach
                        </select>
                        <span class="help-text">Opsional - pilih perawat yang bertugas</span>
                        @error('nurse_id') <span class="error-message">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Kondisi Pasien</label>
                    <input class="form-control" name="condition" value="{{ old('condition',$room_booking->condition) }}" placeholder="Deskripsi kondisi pasien saat ini" required>
                    @error('condition') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Catatan Tambahan</label>
                    <textarea class="form-control" name="notes" placeholder="Tambahkan catatan khusus tentang booking ini...">{{ old('notes',$room_booking->notes) }}</textarea>
                    @error('notes') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <div class="actions">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-save"></i> Update Booking
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to form elements
            const formControls = document.querySelectorAll('.form-control, .form-select');
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });

                control.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Add hover effects to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Auto-capitalize first letter of condition
            const conditionInput = document.querySelector('input[name="condition"]');
            if (conditionInput) {
                conditionInput.addEventListener('input', function() {
                    if (this.value.length === 1) {
                        this.value = this.value.toUpperCase();
                    }
                });
            }
        });
    </script>
</body>
</html>
