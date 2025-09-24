<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ruangan - MediCare</title>
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
            max-width: 800px;
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

        .header h2 {
            font-size: 24px;
            font-weight: 700;
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

        .label-required::after {
            content: " *";
            color: var(--danger);
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s;
            background-color: var(--card-bg);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.5;
        }

        .form-help {
            margin-top: 6px;
            font-size: 13px;
            color: var(--text-light);
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
            background: #e5e7eb;
        }

        .booking-info {
            background: #f0f9ff;
            border: 1px solid #bae6fd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .info-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--primary);
        }

        .info-title i {
            font-size: 18px;
        }

        .info-list {
            list-style: none;
            padding-left: 0;
        }

        .info-list li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .info-list li i {
            color: var(--success);
            margin-top: 2px;
            flex-shrink: 0;
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

            .header h2 {
                font-size: 22px;
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

            .header h2 {
                font-size: 20px;
            }

            .form-control {
                padding: 12px 14px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 14px;
            }

            .booking-info {
                padding: 16px;
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
        .btn:focus, .form-control:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Error states */
        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-control.error {
            border-color: var(--danger);
        }
    </style>
</head>
<body>
    @include('layouts.medicare')
    <div class="container">
        <div class="card">
            <div class="header">
                <i class="fa-solid fa-bed"></i>
                <h2>Booking Ruangan Rawat Inap</h2>
            </div>

            <div class="booking-info">
                <div class="info-title">
                    <i class="fa-solid fa-circle-info"></i>
                    <span>Informasi Penting</span>
                </div>
                <ul class="info-list">
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <span>Pastikan kondisi pasien memerlukan perawatan inap</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <span>Permintaan akan diproses dalam 1-2 jam kerja</span>
                    </li>
                    <li>
                        <i class="fa-solid fa-check"></i>
                        <span>Status booking dapat dilihat di halaman riwayat</span>
                    </li>
                </ul>
            </div>

            <form method="POST" action="{{ route('patient.bookingroom.store') }}">
                @csrf

                <!-- Kondisi Pasien -->
                <div class="form-group">
                    <label for="condition" class="label-required">Kondisi Pasien</label>
                    <input
                        id="condition"
                        class="form-control"
                        type="text"
                        name="condition"
                        value="{{ old('condition') }}"
                        required
                        autofocus
                        placeholder="Contoh: Demam tinggi, pasca operasi, dll."
                    />
                    <div class="form-help">
                        Jelaskan kondisi medis yang memerlukan perawatan inap
                    </div>
                    @error('condition')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Catatan Tambahan -->
                <div class="form-group">
                    <label for="notes">Catatan Tambahan</label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="4"
                        class="form-control"
                        placeholder="Tambahkan informasi lain yang diperlukan (opsional)"
                    >{{ old('notes') }}</textarea>
                    <div class="form-help">
                        Informasi tambahan seperti kebutuhan khusus, alergi, atau permintaan khusus
                    </div>
                    @error('notes')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Permintaan
                    </button>
                    <a href="{{ route('patient.bookingroom.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Riwayat
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = document.querySelectorAll('.form-control');

            // Validasi real-time
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (!this.value && this.hasAttribute('required')) {
                        this.classList.add('error');
                    } else {
                        this.classList.remove('error');
                    }
                });

                input.addEventListener('input', function() {
                    if (this.value) {
                        this.classList.remove('error');
                    }
                });
            });

            // Validasi sebelum submit
            form.addEventListener('submit', function(e) {
                let valid = true;
                inputs.forEach(input => {
                    if (input.hasAttribute('required') && !input.value.trim()) {
                        input.classList.add('error');
                        valid = false;
                    }
                });

                if (!valid) {
                    e.preventDefault();
                    // Scroll ke input pertama yang error
                    const firstError = document.querySelector('.form-control.error');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                }
            });

            // Auto-focus pada input pertama
            const firstInput = document.querySelector('.form-control');
            if (firstInput) {
                firstInput.focus();
            }
        });
    </script>
</body>
</html>
