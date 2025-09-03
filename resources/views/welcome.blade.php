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
            --primary-color: #00a8cc;
            --secondary-color: #0077be;
            --accent-color: #4fd1c7;
            --text-color: #333;
            --light-bg: #f8fafc;
            --white: #ffffff;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --shadow: 0 10px 30px rgba(0, 168, 204, 0.1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            overflow-x: hidden;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, rgba(0, 168, 204, 0.95), rgba(0, 119, 190, 0.95)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 70%, rgba(79, 209, 199, 0.3) 0%, transparent 50%);
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

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-cta {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-large {
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }

        .btn-white {
            background: white;
            color: var(--primary-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .hero-image {
            animation: slideInRight 1s ease-out;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .floating-card {
            position: absolute;
            background: white;
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            animation: float 3s ease-in-out infinite;
        }

        .floating-card-1 {
            top: 10%;
            left: -10%;
            animation-delay: 0s;
        }

        .floating-card-2 {
            bottom: 20%;
            right: -10%;
            animation-delay: 1s;
        }

        /* Features Section */
        .features {
            padding: 6rem 0;
            background: var(--light-bg);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 4rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 168, 204, 0.1);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .feature-card:hover::before {
            transform: translateX(0);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 168, 204, 0.15);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-color);
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Role-based Features */
        .roles {
            padding: 6rem 0;
            background: white;
        }

        .roles-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 1rem 2rem;
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .tab-btn.active, .tab-btn:hover {
            background: var(--gradient);
            color: white;
            transform: translateY(-2px);
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.5s ease-in;
        }

        .tab-content.active {
            display: block;
        }

        .role-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .role-feature {
            background: var(--light-bg);
            padding: 1.5rem;
            border-radius: 15px;
            border-left: 4px solid var(--primary-color);
            transition: all 0.3s ease;
        }

        .role-feature:hover {
            background: white;
            box-shadow: var(--shadow);
            transform: translateX(5px);
        }

        /* Stats Section */
        .stats {
            padding: 4rem 0;
            background: var(--gradient);
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .stat-item p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Footer */
        .footer {
            background: #1a1a1a;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--accent-color);
        }

        .footer-section p, .footer-section li {
            color: #ccc;
            line-height: 1.6;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--accent-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #333;
            color: #999;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .role-features {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .btn-large {
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Pelayanan Kesehatan Digital Terdepan</h1>
                <p class="hero-subtitle">
                    Akses layanan medis berkualitas tinggi dengan teknologi modern. 
                    Konsultasi online, booking janji temu, dan manajemen kesehatan dalam satu platform.
                </p>
                <div class="hero-cta">
                    <a href="#" class="btn btn-white btn-large">
                        <i class="fas fa-user-md"></i>
                        Konsultasi Sekarang
                    </a>
                    <a href="#" class="btn btn-primary btn-large">
                        <i class="fas fa-calendar-alt"></i>
                        Booking Janji Temu
                    </a>
                </div>
            </div>
            
            <div class="hero-image">
                <div class="floating-card floating-card-1">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-stethoscope" style="color: var(--primary-color);"></i>
                        <span style="font-size: 0.9rem; font-weight: 600;">24/7 Emergency</span>
                    </div>
                </div>
                
                <div class="floating-card floating-card-2">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-shield-alt" style="color: var(--accent-color);"></i>
                        <span style="font-size: 0.9rem; font-weight: 600;">Data Aman</span>
                    </div>
                </div>
                
                <!-- Placeholder for hero image -->
                <div style="width: 100%; height: 400px; background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05)); border-radius: 20px; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem;">
                    <i class="fas fa-hospital" style="font-size: 4rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Layanan Unggulan Kami</h2>
                <p>Solusi kesehatan terintegrasi untuk semua kebutuhan medis Anda</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Konsultasi Online</h3>
                    <p>Chat langsung dengan dokter berpengalaman kapan saja, di mana saja. Dapatkan diagnosis dan resep secara digital.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <h3>Cek Ketersediaan Ruangan</h3>
                    <p>Lihat real-time ketersediaan kamar rawat inap, ICU, dan ruang perawatan lainnya.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h3>Booking Janji Temu</h3>
                    <p>Jadwalkan appointment dengan mudah. Pilih dokter, waktu, dan dapatkan konfirmasi instant.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Tracking Antrian</h3>
                    <p>Pantau posisi antrian Anda secara real-time dan dapatkan notifikasi saat giliran tiba.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-file-medical"></i>
                    </div>
                    <h3>Riwayat Medis Digital</h3>
                    <p>Akses lengkap riwayat kesehatan, hasil lab, dan rekam medis Anda dalam satu tempat.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-pills"></i>
                    </div>
                    <h3>Farmasi Online</h3>
                    <p>Tebus resep online dan dapatkan obat dikirim langsung ke rumah Anda.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <h3>Pembayaran Digital</h3>
                    <p>Bayar tagihan medis dengan mudah menggunakan QR Code dan berbagai metode pembayaran.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3>Tombol Emergency</h3>
                    <p>Akses cepat ke layanan darurat dengan satu sentuhan. Tim medis siap 24/7.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <h3>50+</h3>
                    <p>Dokter Spesialis</p>
                </div>
                <div class="stat-item">
                    <h3>1000+</h3>
                    <p>Pasien Terlayani</p>
                </div>
                <div class="stat-item">
                    <h3>24/7</h3>
                    <p>Layanan Darurat</p>
                </div>
                <div class="stat-item">
                    <h3>98%</h3>
                    <p>Tingkat Kepuasan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Role-based Features -->
    <section class="roles" id="roles">
        <div class="container">
            <div class="section-title">
                <h2>Fitur untuk Setiap Peran</h2>
                <p>Platform yang dirancang khusus untuk kebutuhan berbagai pengguna</p>
            </div>
            
            <div class="roles-tabs">
                <button class="tab-btn active" data-tab="user">Pasien</button>
                <button class="tab-btn" data-tab="doctor">Dokter</button>
                <button class="tab-btn" data-tab="admin">Admin</button>
                <button class="tab-btn" data-tab="nurse">Perawat</button>
            </div>
            
            <div id="user" class="tab-content active">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-comments"></i> Chat Dokter</h4>
                        <p>Konsultasi langsung dengan dokter spesialis</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-bed"></i> Cek Ruangan</h4>
                        <p>Lihat ketersediaan ruang perawatan real-time</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-user-plus"></i> Registrasi & Login</h4>
                        <p>Akses mudah dan aman ke platform</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-calendar-alt"></i> Booking Janji Temu</h4>
                        <p>Jadwalkan pertemuan dengan dokter favorit</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-clock"></i> Tracking Antrian</h4>
                        <p>Pantau posisi antrian secara real-time</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-history"></i> Riwayat Medis</h4>
                        <p>Akses lengkap rekam medis digital</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-pills"></i> Tebus Obat Online</h4>
                        <p>Order obat dan kirim ke rumah</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-qrcode"></i> Pembayaran QR</h4>
                        <p>Bayar tagihan dengan scan QR Code</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-exclamation-triangle"></i> Tombol Emergency</h4>
                        <p>Akses cepat layanan darurat 24/7</p>
                    </div>
                </div>
            </div>
            
            <div id="doctor" class="tab-content">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-user-edit"></i> Kelola Profil</h4>
                        <p>Atur jadwal praktek dan informasi profil</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-comment-medical"></i> Chat Pasien</h4>
                        <p>Konsultasi online dengan pasien</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-laptop-medical"></i> Diagnosa Digital</h4>
                        <p>Tools digital untuk diagnosis medis</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-file-medical-alt"></i> Riwayat Pasien</h4>
                        <p>Akses rekam medis lengkap pasien</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-check-circle"></i> Approve Booking</h4>
                        <p>Setujui atau tolak permintaan janji temu</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-edit"></i> Update Status</h4>
                        <p>Update kondisi dan rencana perawatan</p>
                    </div>
                </div>
            </div>
            
            <div id="admin" class="tab-content">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-users"></i> Kelola Data Pasien</h4>
                        <p>Manajemen database pasien dan informasi medis</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-user-md"></i> Kelola Dokter & Perawat</h4>
                        <p>Administrasi staff medis dan jadwal kerja</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-door-open"></i> Kelola Ruangan</h4>
                        <p>Monitor dan atur ketersediaan ruang perawatan</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-calendar-week"></i> Kelola Janji Temu</h4>
                        <p>Koordinasi jadwal dan antrian pasien</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-prescription-bottle"></i> Kelola Obat & Resep</h4>
                        <p>Inventory farmasi dan manajemen resep</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-chart-bar"></i> Dashboard Statistik</h4>
                        <p>Analytics dan reporting komprehensif</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-users-cog"></i> Role Management</h4>
                        <p>Atur hak akses dan permission pengguna</p>
                    </div>
                </div>
            </div>
            
            <div id="nurse" class="tab-content">
                <div class="role-features">
                    <div class="role-feature">
                        <h4><i class="fas fa-calendar-day"></i> Jadwal & Tugas</h4>
                        <p>Lihat jadwal kerja dan tugas harian</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-heartbeat"></i> Monitor Pasien</h4>
                        <p>Pantau kondisi pasien rawat inap</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-door-closed"></i> Update Status Ruangan</h4>
                        <p>Update ketersediaan dan kondisi ruang</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-bell"></i> Reminder Obat</h4>
                        <p>Notifikasi jadwal pemberian obat pasien</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-hands-helping"></i> Support Dokter</h4>
                        <p>Asisten dalam tindakan medis</p>
                    </div>
                    <div class="role-feature">
                        <h4><i class="fas fa-ambulance"></i> Emergency Response</h4>
                        <p>Tim respon cepat situasi darurat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>MediCare Hospital</h3>
                    <p>Pelayanan kesehatan terdepan dengan teknologi modern untuk memberikan perawatan terbaik bagi semua pasien.</p>
                    <div style="margin-top: 1rem;">
                        <i class="fas fa-phone"></i> +62 21 1234 5678<br>
                        <i class="fas fa-envelope"></i> info@medicare.id<br>
                        <i class="fas fa-map-marker-alt"></i> Jl. Sehat No. 123, Jakarta
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="#">Konsultasi Online</a></li>
                        <li><a href="#">Emergency 24/7</a></li>
                        <li><a href="#">Rawat Jalan</a></li>
                        <li><a href="#">Rawat Inap</a></li>
                        <li><a href="#">Medical Check Up</a></li>
                        <li><a href="#">Farmasi Online</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Spesialisasi</h3>
                    <ul>
                        <li><a href="#">Kardiologi</a></li>
                        <li><a href="#">Neurologi</a></li>
                        <li><a href="#">Orthopedi</a></li>
                        <li><a href="#">Pediatri</a></li>
                        <li><a href="#">Kandungan</a></li>
                        <li><a href="#">Mata</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2024 MediCare Hospital. All rights reserved. Built with ❤️ for better healthcare.</p>
            </div>
        </div>
    </footer>

    <script>
        // Tab functionality
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

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.feature-card, .role-feature, .stat-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });

        // Counter animation for stats
        const animateCounters = () => {
            const counters = document.querySelectorAll('.stat-item h3');
            
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/\D/g, ''));
                const suffix = counter.textContent.replace(/\d/g, '');
                let current = 0;
                const increment = target / 50;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.floor(current) + suffix;
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target + suffix;
                    }
                };
                
                updateCounter();
            });
        };

        // Trigger counter animation when stats section is visible
        const statsSection = document.querySelector('.stats');
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        });

        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Add loading animation
        window.addEventListener('load', () => {
            document.body.style.opacity = '1';
        });
    </script>
</body>
</html>