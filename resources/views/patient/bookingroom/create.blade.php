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

        /* Mobile Navigation */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: var(--card-bg);
            border-bottom: 1px solid var(--border);
            padding: 12px 16px;
            z-index: 1000;
            align-items: center;
            gap: 12px;
        }

        .nav-back {
            background: none;
            border: none;
            color: var(--primary);
            font-size: 18px;
            cursor: pointer;
            padding: 4px;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .nav-back:hover {
            background: #f1f5f9;
        }

        .nav-title {
            font-weight: 600;
            font-size: 16px;
            color: var(--text);
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .container {
                max-width: 100%;
                padding: 100px 20px 30px;
            }
            
            .card {
                padding: 28px;
            }
        }

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

            .mobile-nav {
                display: flex;
            }

            .header {
                margin-top: 20px;
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

            .header i {
                padding: 10px;
                min-width: 40px;
                font-size: 16px;
            }

            .form-control {
                padding: 12px 14px;
                font-size: 15px;
            }

            .btn {
                padding: 12px 20px;
                font-size: 14px;
            }

            .booking-info {
                padding: 16px;
            }

            .info-list li {
                font-size: 13px;
            }

            .form-help {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding-top: 70px;
            }
            
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
            
            .header i {
                padding: 8px;
                min-width: 36px;
                font-size: 14px;
            }

            .form-control {
                padding: 10px 12px;
                font-size: 14px;
            }

            textarea.form-control {
                min-height: 100px;
            }

            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .booking-info {
                padding: 14px;
            }

            .info-title {
                font-size: 14px;
            }

            .info-list li {
                font-size: 12px;
                gap: 8px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .button-group {
                margin-top: 28px;
                gap: 10px;
            }
        }

        @media (max-width: 360px) {
            .header h2 {
                font-size: 16px;
            }
            
            .header i {
                padding: 6px;
                min-width: 32px;
                font-size: 12px;
            }
            
            .form-control {
                padding: 8px 10px;
                font-size: 13px;
            }
            
            .btn {
                padding: 8px 12px;
                font-size: 12px;
            }
            
            .booking-info {
                padding: 12px;
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
        .btn:focus, .form-control:focus, .nav-back:focus {
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

        /* Character counter */
        .char-counter {
            text-align: right;
            font-size: 12px;
            color: var(--text-light);
            margin-top: 4px;
        }

        .char-counter.warning {
            color: var(--warning);
        }

        .char-counter.danger {
            color: var(--danger);
        }
    </style>
</head>
<body>
    <!-- Mobile Navigation -->
    <div class="mobile-nav">
        <button class="nav-back" onclick="history.back()">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
        <div class="nav-title">Booking Ruangan</div>
    </div>

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

            <form method="POST" action="{{ route('patient.bookingroom.store') }}" id="bookingForm">
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
                        maxlength="200"
                    />
                    <div class="form-help">
                        Jelaskan kondisi medis yang memerlukan perawatan inap
                    </div>
                    <div class="char-counter" id="conditionCounter">
                        <span id="conditionChars">0</span>/200 karakter
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
                        maxlength="500"
                    >{{ old('notes') }}</textarea>
                    <div class="form-help">
                        Informasi tambahan seperti kebutuhan khusus, alergi, atau permintaan khusus
                    </div>
                    <div class="char-counter" id="notesCounter">
                        <span id="notesChars">0</span>/500 karakter
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
            const form = document.getElementById('bookingForm');
            const inputs = document.querySelectorAll('.form-control');
            const conditionInput = document.getElementById('condition');
            const notesInput = document.getElementById('notes');
            const conditionCounter = document.getElementById('conditionCounter');
            const notesCounter = document.getElementById('notesCounter');
            const conditionChars = document.getElementById('conditionChars');
            const notesChars = document.getElementById('notesChars');

            // Character counter functionality
            function updateCharCounter(input, counter, charsElement, maxLength) {
                const length = input.value.length;
                charsElement.textContent = length;
                
                if (length > maxLength * 0.8) {
                    counter.classList.add('warning');
                    counter.classList.remove('danger');
                } else if (length > maxLength * 0.9) {
                    counter.classList.add('danger');
                    counter.classList.remove('warning');
                } else {
                    counter.classList.remove('warning', 'danger');
                }
            }

            // Initialize character counters
            if (conditionInput) {
                conditionInput.addEventListener('input', function() {
                    updateCharCounter(this, conditionCounter, conditionChars, 200);
                });
                // Trigger initial count
                conditionInput.dispatchEvent(new Event('input'));
            }

            if (notesInput) {
                notesInput.addEventListener('input', function() {
                    updateCharCounter(this, notesCounter, notesChars, 500);
                });
                // Trigger initial count
                notesInput.dispatchEvent(new Event('input'));
            }

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
            if (conditionInput) {
                conditionInput.focus();
            }

            // Adjust form layout for mobile
            function adjustFormLayout() {
                const formGroups = document.querySelectorAll('.form-group');
                formGroups.forEach((group, index) => {
                    group.style.animationDelay = `${index * 0.1}s`;
                });
            }

            adjustFormLayout();
        });

        // Handle back button
        document.querySelector('.nav-back').addEventListener('click', function() {
            window.history.back();
        });
    </script>
</body>
</html>