<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail & Balasan Dukungan - MediCare</title>
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
            background: var(--primary);
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

        .info-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .info-section {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .info-section h3 {
            font-size: 16px;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-section h3 i {
            font-size: 14px;
        }

        .info-item {
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--border);
        }

        .info-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .info-label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-light);
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-label i {
            font-size: 12px;
            color: var(--primary);
        }

        .info-value {
            font-size: 15px;
            color: var(--text);
            line-height: 1.5;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            gap: 6px;
            border: 1px solid transparent;
        }

        .status-Terkirim {
            background-color: #fefce8;
            color: #a16207;
            border-color: #fef9c3;
        }

        .status-Dilihat {
            background-color: #fffbeb;
            color: var(--warning);
            border-color: #fef3c7;
        }

        .status-Diproses {
            background-color: #faf5ff;
            color: var(--completed);
            border-color: #ddd6fe;
        }

        .status-Selesai {
            background-color: #f0fdf4;
            color: var(--success);
            border-color: #bbf7d0;
        }

        .response-section {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 12px;
            padding: 20px;
            margin-top: 24px;
            animation: fadeIn 0.6s ease-out;
        }

        .response-section h3 {
            font-size: 16px;
            font-weight: 600;
            color: #15803d;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .response-section h3 i {
            font-size: 14px;
        }

        .response-content {
            background: white;
            padding: 16px;
            border-radius: 8px;
            border: 1px solid #bbf7d0;
            line-height: 1.6;
            white-space: pre-wrap;
        }

        .response-form {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
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
            gap: 8px;
        }

        .form-label i {
            color: var(--primary);
            font-size: 14px;
        }

        .form-textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            resize: vertical;
            min-height: 140px;
            line-height: 1.5;
            transition: all 0.3s;
            background: white;
        }

        .form-textarea:focus {
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

        .meta-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid var(--border);
            font-size: 13px;
            color: var(--text-light);
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

            .info-section {
                padding: 16px;
            }

            .meta-info {
                flex-direction: column;
                gap: 8px;
                align-items: flex-start;
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

            .btn {
                width: 100%;
                justify-content: center;
            }

            .form-textarea {
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
        .btn:focus, a:focus, .form-textarea:focus {
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
                    <i class="fa-solid fa-circle-info"></i>
                    <h2>Detail Permintaan Dukungan</h2>
                </div>
                <a href="{{ route('doctor.supports.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>

            <div class="info-grid">
                <div class="info-section">
                    <h3><i class="fa-solid fa-info-circle"></i> Informasi Permintaan</h3>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa-solid fa-tag"></i>
                            Subjek Permintaan
                        </div>
                        <div class="info-value">{{ $support->subjek }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa-solid fa-user-nurse"></i>
                            Dari Perawat
                        </div>
                        <div class="info-value">{{ $support->perawat->name ?? 'N/A' }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa-solid fa-user-injured"></i>
                            Pasien Terkait
                        </div>
                        <div class="info-value">{{ $support->patient->name ?? 'N/A' }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa-solid fa-hourglass-half"></i>
                            Status Permintaan
                        </div>
                        <div class="info-value">
                            <span class="status-badge status-{{ str_replace(' ', '', $support->status) }}">
                                <i class="fa-solid fa-circle"></i>
                                {{ $support->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="info-section">
                    <h3><i class="fa-solid fa-file-medical"></i> Deskripsi Permintaan</h3>

                    <div class="info-item">
                        <div class="info-label">
                            <i class="fa-solid fa-align-left"></i>
                            Deskripsi Detail
                        </div>
                        <div class="info-value" style="white-space: pre-wrap; line-height: 1.6;">{{ $support->deskripsi }}</div>
                    </div>
                </div>
            </div>

            @if($support->status === 'Selesai')
                <div class="response-section">
                    <h3><i class="fa-solid fa-comment-medical"></i> Respons Anda</h3>
                    <div class="response-content">{{ $support->respon_dokter }}</div>
                </div>
            @else
                <div class="response-form">
                    <form action="{{ route('doctor.supports.update', $support->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="respon_dokter" class="form-label">
                                <i class="fa-solid fa-reply"></i>
                                Tulis Respons Anda
                            </label>
                            <textarea name="respon_dokter" id="respon_dokter" class="form-textarea"
                                      placeholder="Berikan respons dan saran untuk perawat terkait permintaan dukungan ini..."
                                      required>{{ old('respon_dokter') }}</textarea>
                            @error('respon_dokter')
                                <div class="error-message">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-hint">
                                <i class="fa-solid fa-lightbulb"></i>
                                Respons Anda akan dikirim ke perawat dan status permintaan akan diubah menjadi "Selesai"
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Respons & Selesaikan
                        </button>
                    </form>
                </div>
            @endif

            <div class="meta-info">
                <div>
                    <i class="fa-solid fa-calendar"></i>
                    Dibuat: {{ $support->created_at->format('d M Y H:i') }}
                </div>
                <div>
                    <i class="fa-solid fa-clock"></i>
                    Diperbarui: {{ $support->updated_at->format('d M Y H:i') }}
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to info sections
            const infoSections = document.querySelectorAll('.info-section');
            infoSections.forEach((section, index) => {
                section.style.animationDelay = `${index * 0.2}s`;
                section.style.animation = 'fadeIn 0.6s ease-out';
            });

            // Add real-time character count for textarea
            const textarea = document.getElementById('respon_dokter');
            if (textarea) {
                const charCount = document.createElement('div');
                charCount.className = 'form-hint';
                charCount.innerHTML = '<i class="fa-solid fa-keyboard"></i> Jumlah karakter: <span id="charCount">0</span>';
                textarea.parentNode.appendChild(charCount);

                textarea.addEventListener('input', function() {
                    document.getElementById('charCount').textContent = this.value.length;
                });

                // Trigger initial count
                textarea.dispatchEvent(new Event('input'));
            }

            // Add hover effects to info items
            const infoItems = document.querySelectorAll('.info-item');
            infoItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</body>
</html>
