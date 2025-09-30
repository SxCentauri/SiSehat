<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik - MediCare</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 40px;
        }

        /* KPI Grid Styles */
        .kpi-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            margin-bottom: 30px;
        }

        .kpi {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out;
        }

        .kpi:hover {
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

        .kpi .badge-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            color: var(--primary);
            font-size: 20px;
            margin-bottom: 16px;
        }

        .kpi .value {
            font-size: 32px;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 8px;
            color: var(--text);
        }

        .kpi .label {
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 12px;
        }

        .meta {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .chip {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-light);
        }

        /* Grid Layout */
        .grid-2 {
            display: grid;
            gap: 20px;
            grid-template-columns: 1.2fr 0.8fr;
            margin-bottom: 20px;
        }

        .card-soft {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .card-soft:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .section-head {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .section-head i {
            color: var(--primary);
            background: linear-gradient(135deg, #dbeafe, #eff6ff);
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .section-head h3 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
            margin: 0;
        }

        /* Donut Chart */
        .donut-container {
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 24px;
            align-items: center;
        }

        .donut {
            --p: {{ $utilization }};
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: conic-gradient(var(--primary) calc(var(--p) * 1%), var(--border) 0);
            display: grid;
            place-items: center;
            position: relative;
        }

        .donut:after {
            content: "{{ $utilization }}%";
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--card-bg);
            display: grid;
            place-items: center;
            font-weight: 800;
            font-size: 18px;
            color: var(--text);
            box-shadow: inset 0 0 0 1px var(--border);
        }

        .progress {
            height: 10px;
            border-radius: 999px;
            background: var(--border);
            overflow: hidden;
            margin-bottom: 16px;
        }

        .progress > span {
            display: block;
            height: 100%;
            background: var(--gradient);
            border-radius: 999px;
            width: {{ $utilization }}%;
            transition: width 0.5s ease;
        }

        /* User Distribution */
        .user-box {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .user-item {
            background: linear-gradient(180deg, #fafbff, #ffffff);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .user-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .user-item .val {
            font-size: 24px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 4px;
        }

        .user-item .ttl {
            color: var(--text-light);
            font-size: 13px;
            font-weight: 600;
        }

        /* Chart Styles */
        .chart-container {
            background: var(--card-bg);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            margin-top: 20px;
        }

        .chart-wrap {
            height: 300px;
            position: relative;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .kpi-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid-2 {
                grid-template-columns: 1fr;
            }

            .donut-container {
                grid-template-columns: 140px 1fr;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 15px 30px;
            }

            .kpi-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .kpi {
                padding: 20px;
            }

            .kpi .value {
                font-size: 28px;
            }

            .donut-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 20px;
            }

            .donut {
                margin: 0 auto;
            }

            .user-box {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .chart-wrap {
                height: 250px;
            }
        }

        @media (max-width: 640px) {
            body {
                padding-top: 70px;
            }

            .container {
                padding: 0 12px 20px;
            }

            .kpi {
                padding: 18px;
                border-radius: 14px;
            }

            .card-soft {
                padding: 20px;
                border-radius: 14px;
            }

            .section-head h3 {
                font-size: 16px;
            }

            .section-head i {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }

            .chart-wrap {
                height: 220px;
            }
        }

        @media (max-width: 480px) {
            .kpi .badge-icon {
                width: 44px;
                height: 44px;
                font-size: 18px;
            }

            .kpi .value {
                font-size: 24px;
            }

            .meta {
                flex-direction: column;
                gap: 8px;
            }

            .chip {
                width: fit-content;
            }

            .donut {
                width: 120px;
                height: 120px;
            }

            .donut:after {
                width: 85px;
                height: 85px;
                font-size: 16px;
            }
        }

        /* Focus states for accessibility */
        .kpi:focus, .card-soft:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    @extends('layouts.medicare')

    <div class="container">
        <!-- KPI Grid -->
        <div class="kpi-grid">
            <div class="kpi">
                <div class="badge-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div class="value" style="color:var(--danger)">{{ $todayEmergencies }}</div>
                <div class="label">Emergency Hari Ini</div>
                <div class="meta">
                    <span class="chip">Total: {{ $totalEmergencies }}</span>
                </div>
            </div>

            <div class="kpi">
                <div class="badge-icon"><i class="fa-solid fa-door-open"></i></div>
                <div class="value">{{ $totalRooms }}</div>
                <div class="label">Total Ruangan</div>
                <div class="meta">
                    <span class="chip">Kapasitas {{ $sumCapacity }}</span>
                    <span class="chip">Terisi {{ $sumOccupied }}</span>
                </div>
            </div>

            <div class="kpi">
                <div class="badge-icon"><i class="fa-solid fa-calendar-check"></i></div>
                <div class="value">{{ $todayAppointments }}</div>
                <div class="label">Janji Temu Hari Ini</div>
                <div class="meta">
                    <span class="chip">Total: {{ $totalAppointments }}</span>
                </div>
            </div>

            <div class="kpi">
                <div class="badge-icon"><i class="fa-solid fa-users"></i></div>
                <div class="value">{{ $patients + $doctors + $nurses }}</div>
                <div class="label">Total Pengguna</div>
                <div class="meta">
                    <span class="chip">Patient {{ $patients }}</span>
                    <span class="chip">Doctor {{ $doctors }}</span>
                    <span class="chip">Nurse {{ $nurses }}</span>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid-2">
            <!-- Utilisasi Ruangan -->
            <div class="card-soft">
                <div class="section-head">
                    <i class="fa-solid fa-gauge-high"></i>
                    <h3>Utilisasi Ruangan</h3>
                </div>
                <div class="donut-container">
                    <div class="donut"></div>
                    <div>
                        <div class="progress">
                            <span></span>
                        </div>
                        <div class="meta">
                            <span>Tersedia: <b>{{ max(0, $sumCapacity - $sumOccupied) }}</b></span>
                            <span>Terisi: <b>{{ $sumOccupied }}</b></span>
                            <span>Kapasitas: <b>{{ $sumCapacity }}</b></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Distribusi Pengguna -->
            <div class="card-soft">
                <div class="section-head">
                    <i class="fa-solid fa-user-group"></i>
                    <h3>Distribusi Pengguna</h3>
                </div>
                <div class="user-box">
                    <div class="user-item">
                        <div class="val">{{ $patients }}</div>
                        <div class="ttl">Patient</div>
                    </div>
                    <div class="user-item">
                        <div class="val">{{ $doctors }}</div>
                        <div class="ttl">Doctor</div>
                    </div>
                    <div class="user-item">
                        <div class="val">{{ $nurses }}</div>
                        <div class="ttl">Nurse</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tren 7 Hari -->
        <div class="chart-container">
            <div class="section-head">
                <i class="fa-solid fa-chart-line"></i>
                <h3>Tren 7 Hari Terakhir</h3>
            </div>
            <div class="chart-wrap">
                <canvas id="trendChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const labels = @json($labels);
            const appts = @json($appointmentsDaily);
            const emerg = @json($emergenciesDaily);

            const ctx = document.getElementById('trendChart').getContext('2d');

            // Create gradients
            const gradBlue = ctx.createLinearGradient(0, 0, 0, 300);
            gradBlue.addColorStop(0, 'rgba(37, 99, 235, 0.4)');
            gradBlue.addColorStop(1, 'rgba(37, 99, 235, 0.05)');

            const gradRed = ctx.createLinearGradient(0, 0, 0, 300);
            gradRed.addColorStop(0, 'rgba(239, 68, 68, 0.4)');
            gradRed.addColorStop(1, 'rgba(239, 68, 68, 0.05)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Janji Temu',
                            data: appts,
                            tension: 0.4,
                            fill: true,
                            backgroundColor: gradBlue,
                            borderColor: '#2563eb',
                            borderWidth: 2,
                            pointRadius: 4,
                            pointBackgroundColor: '#2563eb',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2
                        },
                        {
                            label: 'Emergency',
                            data: emerg,
                            tension: 0.4,
                            fill: true,
                            backgroundColor: gradRed,
                            borderColor: '#ef4444',
                            borderWidth: 2,
                            pointRadius: 4,
                            pointBackgroundColor: '#ef4444',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            top: 10,
                            right: 10,
                            bottom: 10,
                            left: 10
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(148, 163, 184, 0.1)'
                            },
                            ticks: {
                                font: {
                                    size: 11
                                },
                                color: 'var(--text-light)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 11
                                },
                                color: 'var(--text-light)'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                boxWidth: 12,
                                boxHeight: 12,
                                usePointStyle: true,
                                font: {
                                    size: 12
                                },
                                color: 'var(--text)'
                            }
                        },
                        tooltip: {
                            backgroundColor: 'var(--text)',
                            titleColor: '#fff',
                            bodyColor: '#e5e7eb',
                            padding: 12,
                            displayColors: true,
                            cornerRadius: 8
                        }
                    }
                }
            });

            // Add hover effects to cards
            const cards = document.querySelectorAll('.kpi, .card-soft');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
