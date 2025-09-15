<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Pelayanan Kesehatan Terdepan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #60a5fa;
            --light-blue: #dbeafe;
            --extra-light-blue: #eff6ff;
            --text-color: #1f2937;
            --text-light: #6b7280;
            --white: #ffffff;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
            --shadow: 0 20px 50px rgba(37, 99, 235, 0.1);
            --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
        }

        body {
            line-height: 1.6;
            color: var(--text-color);
            overflow-x: hidden;
            background: var(--white);
        }

        /* Enhanced Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.05) 0%, rgba(96, 165, 250, 0.1) 100%);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 200%;
            background: radial-gradient(ellipse, rgba(96, 165, 250, 0.1) 0%, transparent 70%);
            transform: rotate(-15deg);
            z-index: 1;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 60%;
            height: 120%;
            background: radial-gradient(ellipse, rgba(37, 99, 235, 0.08) 0%, transparent 70%);
            transform: rotate(10deg);
            z-index: 1;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-content {
            animation: slideInLeft 1s ease-out;
        }

        .hero-badge {
            background: var(--gradient-light);
            color: var(--primary-color);
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 2rem;
            margin-top: 2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
        }

        .hero-title {
            font-size: 3.8rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
            background: linear-gradient(135deg, var(--text-color) 0%, var(--primary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            line-height: 1.7;
        }

        .hero-cta {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.3);
        }

        .btn-outline {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.1);
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        }

        .btn-large {
            padding: 1.2rem 2.5rem;
            font-size: 1.1rem;
        }

        .hero-image {
            animation: slideInRight 1s ease-out;
            position: relative;
        }

        .hero-visual {
            width: 100%;
            height: 500px;
            background: var(--gradient);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(37, 99, 235, 0.2);
        }

        .hero-visual::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="10" height="10" patternUnits="userSpaceOnUse"><circle cx="5" cy="5" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23dots)"/></svg>');
        }

        .hero-visual i {
            font-size: 6rem;
            color: rgba(255, 255, 255, 0.3);
            z-index: 2;
        }

        .floating-element {
            position: absolute;
            background: white;
            padding: 1.2rem 1.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(37, 99, 235, 0.15);
            animation: float 4s ease-in-out infinite;
            z-index: 3;
        }

        .floating-element-1 {
            top: 15%;
            left: -15%;
            animation-delay: 0s;
        }

        .floating-element-2 {
            bottom: 20%;
            right: -15%;
            animation-delay: 2s;
        }

        .floating-element-3 {
            top: 60%;
            left: -10%;
            animation-delay: 1s;
        }

        .features {
            padding: 8rem 0;
            background: linear-gradient(180deg, var(--white) 0%, var(--extra-light-blue) 100%);
            position: relative;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 200"><path d="M0,100 C300,150 600,50 1200,100 L1200,0 L0,0 Z" fill="white"/></svg>');
            background-size: cover;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .section-badge {
            background: var(--gradient-light);
            color: var(--primary-color);
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: inline-block;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .section-title h2 {
            font-size: 3rem;
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .section-title p {
            font-size: 1.3rem;
            color: var(--text-light);
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            margin-top: 5rem;
        }

        .feature-card {
            background: white;
            padding: 3rem 2.5rem;
            border-radius: 25px;
            box-shadow: 0 15px 50px rgba(37, 99, 235, 0.08);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(96, 165, 250, 0.1);
            position: relative;
            overflow: hidden;
            group: hover;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: var(--gradient);
            transition: left 0.4s ease;
        }

        .feature-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.03) 0%, transparent 70%);
            transform: scale(0);
            transition: transform 0.4s ease;
        }

        .feature-card:hover::before {
            left: 0;
        }

        .feature-card:hover::after {
            transform: scale(1);
        }

        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 80px rgba(37, 99, 235, 0.15);
            border-color: rgba(96, 165, 250, 0.2);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-light);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            color: var(--primary-color);
            font-size: 2rem;
            position: relative;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: var(--gradient);
            color: white;
            transform: scale(1.1);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-color);
            position: relative;
            z-index: 2;
        }

        .feature-card p {
            color: var(--text-light);
            line-height: 1.7;
            font-size: 1.05rem;
            position: relative;
            z-index: 2;
        }

        /* Enhanced Stats Section */
        .stats {
            padding: 6rem 0;
            background: var(--gradient);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stats::before {
            content: '';
            position: absolute;
            top: -20%;
            left: -10%;
            width: 120%;
            height: 140%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hexagons" width="20" height="20" patternUnits="userSpaceOnUse"><polygon points="10,2 18,7 18,13 10,18 2,13 2,7" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/></pattern></defs><rect width="100%" height="100%" fill="url(%23hexagons)"/></svg>');
            animation: slowFloat 20s ease-in-out infinite;
        }

        .stats-content {
            position: relative;
            z-index: 2;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            text-align: center;
        }

        .stat-item {
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        }

        .stat-item .stat-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .stat-item h3 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, white, rgba(255, 255, 255, 0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-item p {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Enhanced Roles Section */
        .roles {
            padding: 8rem 0;
            background: linear-gradient(180deg, var(--extra-light-blue) 0%, white 100%);
            position: relative;
        }

        .roles-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 4rem;
            gap: 1rem;
            flex-wrap: wrap;
            background: white;
            padding: 1rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(37, 99, 235, 0.1);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .tab-btn {
            padding: 1.2rem 2.5rem;
            background: transparent;
            border: none;
            color: var(--text-light);
            border-radius: 15px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .tab-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            transition: left 0.3s ease;
            z-index: 1;
        }

        .tab-btn span {
            position: relative;
            z-index: 2;
        }

        .tab-btn.active::before,
        .tab-btn:hover::before {
            left: 0;
        }

        .tab-btn.active,
        .tab-btn:hover {
            color: white;
            transform: translateY(-2px);
        }

        .tab-content {
            display: none;
            animation: fadeInUp 0.6s ease-out;
        }

        .tab-content.active {
            display: block;
        }

        .role-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .role-feature {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 20px;
            border: 1px solid rgba(96, 165, 250, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.05);
        }

        .role-feature::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient);
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.3s ease;
        }

        .role-feature:hover::before {
            transform: scaleY(1);
        }

        .role-feature:hover {
            transform: translateX(10px);
            box-shadow: 0 20px 60px rgba(37, 99, 235, 0.1);
            border-color: rgba(96, 165, 250, 0.2);
        }

        .role-feature h4 {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .role-feature h4 i {
            font-size: 1.5rem;
            color: var(--primary-color);
            width: 40px;
            height: 40px;
            background: var(--gradient-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .role-feature p {
            color: var(--text-light);
            line-height: 1.6;
            font-size: 1rem;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-25px); }
        }

        @keyframes slowFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-badge {
                margin-top: 6rem;
            }

            .hero-container {
                gap: 3rem;
            }

            .hero-title {
                font-size: 3.2rem;
            }

            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2.5rem;
                padding: 0 1.5rem;
            }

            .hero-title {
                font-size: 2.8rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .hero-cta {
                justify-content: center;
            }

            .section-title h2 {
                font-size: 2.5rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .feature-card {
                padding: 2rem 1.5rem;
            }

            .role-features {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .roles-tabs {
                flex-direction: column;
                align-items: center;
            }

            .tab-btn {
                width: 100%;
                max-width: 200px;
                text-align: center;
            }

            .hero-badge {
                margin-top: 6rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .hero-badge {
                margin-top: 6rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .btn-large {
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-item {
                padding: 1.5rem;
            }

            .stat-item h3 {
                font-size: 2.5rem;
            }

            .feature-card {
                padding: 1.5rem;
            }

            .feature-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }

        .text-gradient {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hover-lift {
            transition: transform 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fas fa-star"></i>
                    Terpercaya & Berkualitas
                </div>
                <h1 class="hero-title">Pelayanan Kesehatan Digital Terdepan</h1>
                <p class="hero-subtitle">
                    Akses layanan medis berkualitas tinggi dengan teknologi modern. 
                    Konsultasi online, booking janji temu, dan manajemen kesehatan dalam satu platform terintegrasi.
                </p>
                <div class="hero-cta">
                    <a href="#" class="btn btn-primary btn-large">
                        <i class="fas fa-user-md"></i>
                        <span>Konsultasi Sekarang</span>
                    </a>
                    <a href="#" class="btn btn-outline btn-large">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Booking Janji Temu</span>
                    </a>
                </div>
            </div>
            
            <div class="hero-image">
                <div class="floating-element floating-element-1">
                    <div style="display: flex; align-items: center; gap: 0.8rem;">
                        <i class="fas fa-stethoscope" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <div>
                            <div style="font-weight: 700; color: var(--text-color); font-size: 0.9rem;">24/7 Emergency</div>
                            <div style="color: var(--text-light); font-size: 0.8rem;">Siaga Setiap Saat</div>
                        </div>
                    </div>
                </div>
                
                <div class="floating-element floating-element-2">
                    <div style="display: flex; align-items: center; gap: 0.8rem;">
                        <i class="fas fa-shield-alt" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <div>
                            <div style="font-weight: 700; color: var(--text-color); font-size: 0.9rem;">Data Terlindungi</div>
                            <div style="color: var(--text-light); font-size: 0.8rem;">100% Aman</div>
                        </div>
                    </div>
                </div>

                <div class="floating-element floating-element-3">
                    <div style="display: flex; align-items: center; gap: 0.8rem;">
                        <i class="fas fa-heart" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        <div>
                            <div style="font-weight: 700; color: var(--text-color); font-size: 0.9rem;">500K+ Pasien</div>
                            <div style="color: var(--text-light); font-size: 0.8rem;">Terpercaya</div>
                        </div>
                    </div>
                </div>
                
                <div class="hero-visual">
                    <i class="fas fa-hospital"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <span class="section-badge">Layanan Unggulan</span>
                <h2>Solusi Kesehatan Modern & Terintegrasi</h2>
                <p>Platform kesehatan digital terdepan yang menggabungkan teknologi canggih dengan pelayanan medis berkualitas tinggi untuk memberikan pengalaman perawatan kesehatan terbaik.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Konsultasi Online 24/7</h3>
                    <p>Chat langsung dengan dokter berpengalaman kapan saja, di mana saja. Dapatkan diagnosis akurat dan resep digital dalam hitungan menit.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <h3>Real-Time Room Monitoring</h3>
                    <p>Pantau ketersediaan ruang rawat inap, ICU, dan ruang perawatan khusus secara real-time dengan sistem update otomatis.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3>Smart Appointment Booking</h3>
                    <p>Sistem booking cerdas yang memungkinkan Anda memilih dokter spesialis, waktu yang tepat, dan mendapat konfirmasi instant.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Live Queue Tracking</h3>
                    <p>Pantau posisi antrian Anda secara real-time dengan notifikasi push saat giliran Anda hampir tiba.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <h3>Digital Health Records</h3>
                    <p>Akses lengkap riwayat kesehatan, hasil laboratorium, dan rekam medis digital yang tersimpan aman dan terorganisir.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <h3>Online Pharmacy & Delivery</h3>
                    <p>Tebus resep online dari farmasi terpercaya dengan sistem pengiriman obat langsung ke rumah Anda.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <h3>Contactless Payment</h3>
                    <p>Bayar tagihan medis dengan mudah menggunakan QR Code, e-wallet, atau berbagai metode pembayaran digital lainnya.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3>Emergency Response System</h3>
                    <p>Akses darurat dengan satu sentuhan yang langsung terhubung ke tim medis emergency 24/7 dengan respon cepat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-content">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>500K+</h3>
                        <p>Pasien Terlayani</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3>200+</h3>
                        <p>Dokter Spesialis</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>98%</h3>
                        <p>Tingkat Kepuasan</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>24/7</h3> <!-- Diperbaiki dari 247/ menjadi 24/7 -->
                        <p>Layanan Darurat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Role-based Features -->
    <section class="roles" id="roles">
        <div class="container">
            <div class="section-title">
                <span class="section-badge">Multi-Platform</span>
                <h2>Fitur Khusus untuk Setiap Peran</h2>
                <p>Platform yang dirancang khusus dengan fitur-fitur canggih untuk memenuhi kebutuhan berbagai jenis pengguna dalam ekosistem kesehatan digital.</p>
            </div>
            
            <div class="roles-tabs">
                <button class="tab-btn active" data-tab="user"><span>👤 Pasien</span></button>
                <button class="tab-btn" data-tab="doctor"><span>👨‍⚕️ Dokter</span></button>
                <button class="tab-btn" data-tab="admin"><span>👨‍💼 Admin</span></button>
                <button class="tab-btn" data-tab="nurse"><span>👩‍⚕️ Perawat</span></button>
            </div>
            
            <div id="user" class="tab-content active">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-comments"></i> Konsultasi Dokter Online</h4>
                        <p>Chat video call langsung dengan dokter spesialis berpengalaman</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-bed"></i> Cek Ketersediaan Ruangan</h4>
                        <p>Monitor real-time ketersediaan ruang perawatan dan fasilitas medis</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-user-plus"></i> Registrasi & Autentikasi</h4>
                        <p>Sistem login aman dengan verifikasi multi-faktor dan enkripsi end-to-end</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-calendar-alt"></i> Booking Janji Temu Cerdas</h4>
                        <p>AI-powered scheduling dengan rekomendasi dokter berdasarkan riwayat medis</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-clock"></i> Live Queue Tracking</h4>
                        <p>Pantau posisi antrian real-time dengan estimasi waktu tunggu akurat</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-history"></i> Digital Medical Records</h4>
                        <p>Akses lengkap riwayat medis dengan AI analysis untuk trend kesehatan</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-pills"></i> Smart Pharmacy</h4>
                        <p>E-prescription dengan drug interaction checker dan home delivery</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-qrcode"></i> Contactless Payment</h4>
                        <p>Pembayaran digital dengan QR code dan integrasi e-wallet</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-exclamation-triangle"></i> Emergency SOS</h4>
                        <p>Tombol darurat dengan GPS tracking dan auto-contact emergency contacts</p>
                    </div>
                </div>
            </div>
            
            <div id="doctor" class="tab-content">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-user-edit"></i> Smart Profile Management</h4>
                        <p>Dashboard dokter dengan AI scheduling dan patient analytics</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-comment-medical"></i> Telemedicine Platform</h4>
                        <p>High-quality video consultation dengan medical tools integration</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-laptop-medical"></i> AI-Assisted Diagnosis</h4>
                        <p>Tools diagnosis digital dengan AI support dan clinical decision support</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-file-medical-alt"></i> Comprehensive Patient Records</h4>
                        <p>360° patient view dengan medical history timeline dan lab integration</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-check-circle"></i> Smart Appointment Management</h4>
                        <p>AI-powered scheduling dengan automatic conflict resolution</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-edit"></i> Real-time Status Updates</h4>
                        <p>Instant patient status updates dengan treatment plan tracking</p>
                    </div>
                </div>
            </div>
            
            <div id="admin" class="tab-content">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-users"></i> Advanced Patient Management</h4>
                        <p>CRM kesehatan dengan predictive analytics dan patient segmentation</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-user-md"></i> Staff Management System</h4>
                        <p>Comprehensive staff dashboard dengan performance analytics dan scheduling</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-door-open"></i> Smart Facility Management</h4>
                        <p>IoT-enabled room monitoring dengan occupancy prediction</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-calendar-week"></i> Intelligent Scheduling</h4>
                        <p>AI-powered appointment optimization dengan resource allocation</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-prescription-bottle"></i> Pharmacy & Inventory</h4>
                        <p>Smart inventory management dengan auto-reorder dan expiry tracking</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-chart-bar"></i> Business Intelligence</h4>
                        <p>Advanced analytics dashboard dengan predictive modeling</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-users-cog"></i> Role-Based Access Control</h4>
                        <p>Granular permission system dengan audit trail dan compliance</p>
                    </div>
                </div>
            </div>
            
            <div id="nurse" class="tab-content">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-calendar-day"></i> Smart Shift Management</h4>
                        <p>AI-optimized scheduling dengan workload balancing</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-heartbeat"></i> Real-time Patient Monitoring</h4>
                        <p>IoT-enabled vital signs monitoring dengan alert system</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-door-closed"></i> Dynamic Room Status</h4>
                        <p>Real-time room status updates dengan maintenance tracking</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-bell"></i> Medication Management</h4>
                        <p>Smart medication reminders dengan barcode verification</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-hands-helping"></i> Clinical Collaboration</h4>
                        <p>Seamless communication dengan multi-disciplinary team</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-ambulance"></i> Emergency Response</h4>
                        <p>Rapid response system dengan GPS tracking dan team coordination</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        @include('components.footer')
    </footer>

    <script>
        // Enhanced Tab functionality
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetTab = btn.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                btn.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
            });
        });

        // Enhanced Intersection Observer for animations
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                }
            });
        }, observerOptions);

        // Observe elements for staggered animation
        document.querySelectorAll('.feature-card, .role-feature, .stat-item').forEach((el, index) => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = `opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s, transform 0.8s cubic-bezier(0.4, 0, 0.2, 1) ${index * 0.1}s`;
            observer.observe(el);
        });

        // Enhanced counter animation for stats with easing - FIXED
        const animateCounters = () => {
            const counters = document.querySelectorAll('.stat-item h3');
            
            counters.forEach((counter, index) => {
                const originalText = counter.textContent;
                
                // Handle special case for "24/7"
                if (originalText.includes('/')) {
                    // For "24/7", we'll just display it directly without animation
                    counter.textContent = originalText;
                    return;
                }
                
                const target = parseInt(originalText.replace(/\D/g, ''));
                const suffix = originalText.replace(/\d/g, '');
                let current = 0;
                const duration = 2000;
                const startTime = performance.now();
                
                const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);
                
                const updateCounter = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const easedProgress = easeOutCubic(progress);
                    
                    current = Math.floor(target * easedProgress);
                    counter.textContent = current + suffix;
                    
                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target + suffix;
                    }
                };
                
                setTimeout(() => {
                    requestAnimationFrame(updateCounter);
                }, index * 200);
            });
        };

        // Stats section observer
        const statsSection = document.querySelector('.stats');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Smooth scroll for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Enhanced floating elements animation
        const floatingElements = document.querySelectorAll('.floating-element');
        floatingElements.forEach((element, index) => {
            element.style.animationDelay = `${index * 0.5}s`;
            element.style.animationDuration = `${4 + index}s`;
        });

        // Loading animation
        window.addEventListener('load', () => {
            document.body.style.opacity = '1';
            
            // Trigger hero animations
            const heroElements = document.querySelectorAll('.hero-content, .hero-image');
            heroElements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateX(0)';
                }, index * 300);
            });
        });

        // Enhanced tab switching with smooth transitions - FIXED (faster animation)
        const tabContentsWrapper = document.querySelector('.roles');
        let isTabSwitching = false;

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (isTabSwitching) return;
                isTabSwitching = true;

                const targetTab = btn.getAttribute('data-tab');
                const currentActiveContent = document.querySelector('.tab-content.active');
                const targetContent = document.getElementById(targetTab);

                // Fade out current content - faster timing
                if (currentActiveContent && currentActiveContent !== targetContent) {
                    currentActiveContent.style.opacity = '0';
                    currentActiveContent.style.transform = 'translateY(10px)';
                    
                    setTimeout(() => {
                        currentActiveContent.classList.remove('active');
                        targetContent.classList.add('active');
                        targetContent.style.opacity = '0';
                        targetContent.style.transform = 'translateY(10px)';
                        
                        // Fade in new content - faster timing
                        setTimeout(() => {
                            targetContent.style.opacity = '1';
                            targetContent.style.transform = 'translateY(0)';
                            isTabSwitching = false;
                        }, 50); // Reduced from 300ms to 150ms total
                    }, 100); // Reduced from 300ms to 100ms
                } else {
                    isTabSwitching = false;
                }

                // Update tab buttons
                tabBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        // Add CSS transitions for tab contents - faster transition
        document.querySelectorAll('.tab-content').forEach(content => {
            content.style.transition = 'opacity 0.2s ease, transform 0.2s ease'; // Reduced from 0.3s to 0.2s
        });
    </script>
</body>
</html>