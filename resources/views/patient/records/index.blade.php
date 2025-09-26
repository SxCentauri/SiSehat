<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Medis - MediCare</title>
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
            max-width: 1200px;
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
            margin-bottom: 20px;
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

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 1px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        .btn-sm {
            padding: 10px 16px;
            font-size: 13px;
        }

        .record-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .record-info {
            flex: 1;
        }

        .record-diagnosis {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .record-diagnosis i {
            color: var(--primary);
            font-size: 14px;
        }

        .record-date {
            font-size: 14px;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .record-date i {
            font-size: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--text-light);
        }

        .empty-state i {
            font-size: 64px;
            margin-bottom: 16px;
            color: #d1d5db;
        }

        .empty-state h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: var(--text);
        }

        .empty-state p {
            font-size: 14px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 24px;
            gap: 8px;
            flex-wrap: wrap;
        }

        .pagination a, .pagination span {
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 14px;
        }

        .pagination a {
            color: var(--primary);
            border: 1px solid var(--border);
        }

        .pagination a:hover {
            background-color: #eff6ff;
            border-color: var(--primary);
        }

        .pagination .current {
            background: var(--gradient);
            color: white;
            border: 1px solid var(--primary);
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

            .header-actions {
                width: 100%;
                justify-content: flex-start;
            }

            .record-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
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

            .header-actions {
                flex-direction: column;
                width: 100%;
            }

            .record-diagnosis {
                font-size: 15px;
            }

            .empty-state {
                padding: 40px 15px;
            }

            .empty-state i {
                font-size: 48px;
            }
        }

        @media (max-width: 480px) {
            .pagination a, .pagination span {
                padding: 6px 12px;
                font-size: 13px;
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

        /* Focus states for accessibility */
        .btn:focus, a:focus {
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
                    <i class="fa-solid fa-file-medical"></i>
                    <h2>Riwayat Medis</h2>
                </div>
                <div class="header-actions">
                    <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>

            @if($records->isEmpty())
                <div class="empty-state">
                    <i class="fa-solid fa-file-medical"></i>
                    <h3>Belum ada catatan medis</h3>
                    <p>Riwayat medis Anda akan muncul di sini setelah konsultasi dengan dokter</p>
                </div>
            @else
                <ul style="list-style:none;padding:0;margin:0;">
                    @foreach($records as $r)
                        <li class="card">
                            <div class="record-item">
                                <div class="record-info">
                                    <div class="record-diagnosis">
                                        <i class="fa-solid fa-stethoscope"></i>
                                        <span>{{ $r->diagnosis ?? 'Diagnosis belum tersedia' }}</span>
                                    </div>
                                    <div class="record-date">
                                        <i class="fa-solid fa-calendar"></i>
                                        <span>{{ $r->created_at->format('d M Y H:i') }}</span>
                                    </div>
                                </div>
                                <a class="btn btn-outline btn-sm" href="{{ route('patient.records.show', $r) }}">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>

                @if(method_exists($records,'links'))
                    <div class="pagination">
                        {{ $records->links() }}
                    </div>
                @endif
            @endif
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Add hover effects to record items
            const recordItems = document.querySelectorAll('.record-item');
            recordItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</body>
</html>
