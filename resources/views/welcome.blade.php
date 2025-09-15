<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Pelayanan Kesehatan Terdepan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/welcome.css">
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
