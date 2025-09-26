<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporkan Kondisi Darurat - MediCare</title>
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
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
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

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
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

        .form-textarea, .form-select {
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

        .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .level-option {
            padding: 8px 12px;
            border-radius: 6px;
            margin: 4px 0;
            font-weight: 500;
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

            .form-textarea, .form-select {
                padding: 12px 14px;
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

        /* Focus states for accessibility */
        .btn:focus, a:focus, .form-textarea:focus, .form-select:focus {
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
                    <i class="fa-solid fa-plus"></i>
                    <h2>Laporkan Kondisi Darurat</h2>
                </div>
                <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>

            <form action="{{ route('patient.emergencies.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="description" class="form-label">
                        <i class="fa-solid fa-comment-medical"></i>
                        Jelaskan kondisi Anda
                    </label>
                    <textarea name="description" id="description" class="form-textarea"
                              placeholder="Contoh: Tiba-tiba merasa nyeri dada hebat, sesak napas, dan keringat dingin. Jelaskan secara detail gejala yang dialami, lokasi nyeri, dan sejak kapan gejala muncul."
                              required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-hint">
                        <i class="fa-solid fa-lightbulb"></i>
                        Semakin detail deskripsi Anda, semakin cepat kami dapat memberikan bantuan yang tepat
                    </div>
                </div>

                <div class="form-group">
                    <label for="level" class="form-label">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Tingkat Kedaruratan
                    </label>
                    <select name="level" id="level" class="form-select" required>
                        <option value="">Pilih tingkat kedaruratan...</option>
                        <option value="low" class="level-low" {{ old('level') == 'low' ? 'selected' : '' }}>
                            Rendah - Tidak mendesak, tetapi membutuhkan saran medis
                        </option>
                        <option value="medium" class="level-medium" {{ old('level') == 'medium' ? 'selected' : '' }}>
                            Sedang - Membutuhkan perhatian dalam beberapa jam ke depan
                        </option>
                        <option value="high" class="level-high" {{ old('level') == 'high' ? 'selected' : '' }}>
                            Tinggi - Mendesak, membutuhkan penanganan segera
                        </option>
                        <option value="critical" class="level-critical" {{ old('level') == 'critical' ? 'selected' : '' }}>
                            Kritis - Mengancam jiwa, membutuhkan pertolongan segera
                        </option>
                    </select>
                    @error('level')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-hint">
                        <i class="fa-solid fa-lightbulb"></i>
                        Pilih tingkat kedaruratan sesuai dengan kondisi yang dialami
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-paper-plane"></i> Kirim Laporan Darurat
                    </button>
                    <a href="{{ route('patient.emergencies.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-list"></i> Lihat Riwayat Laporan
                    </a>
                </div>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to form elements
            const formElements = document.querySelectorAll('.form-group');
            formElements.forEach((element, index) => {
                element.style.animationDelay = `${index * 0.2}s`;
                element.style.animation = 'fadeIn 0.6s ease-out';
            });

            // Add real-time character count for textarea
            const textarea = document.getElementById('description');
            const charCount = document.createElement('div');
            charCount.className = 'form-hint';
            charCount.innerHTML = '<i class="fa-solid fa-keyboard"></i> Jumlah karakter: <span id="charCount">0</span>';
            textarea.parentNode.appendChild(charCount);

            textarea.addEventListener('input', function() {
                document.getElementById('charCount').textContent = this.value.length;
            });

            // Trigger initial count
            textarea.dispatchEvent(new Event('input'));
        });
    </script>
</body>
</html>
