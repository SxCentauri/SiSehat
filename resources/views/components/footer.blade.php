<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            overflow-x: hidden;
            background: var(--white);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .footer {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(96, 165, 250, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(37, 99, 235, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .footer-wave {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 120px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="white"/></svg>') no-repeat center;
            background-size: cover;
        }

        .footer-content-wrapper {
            padding: 8rem 0 4rem;
            position: relative;
            z-index: 2;
        }

        .footer-main {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 4rem;
            margin-bottom: 4rem;
        }

        .footer-brand {
            position: relative;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .footer-logo-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.3);
        }

        .footer-logo h3 {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent-color), white);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-brand p {
            color: #cbd5e1;
            line-height: 1.8;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
        }

        .footer-contact-info {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            margin-bottom: 3rem;
        }

        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            border: 1px solid rgba(96, 165, 250, 0.1);
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
        }

        .footer-contact-item:hover {
            background: rgba(96, 165, 250, 0.1);
            border-color: rgba(96, 165, 250, 0.3);
            transform: translateX(8px);
        }

        .footer-contact-item i {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-color);
            font-size: 1.2rem;
            background: rgba(96, 165, 250, 0.1);
            border-radius: 8px;
        }

        .footer-section h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            color: white;
            position: relative;
            padding-bottom: 0.8rem;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--gradient);
            border-radius: 3px;
        }

        .footer-section ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .footer-section a {
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.6rem 0;
            font-weight: 500;
            font-size: 1rem;
        }

        .footer-section a::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--accent-color);
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .footer-section a:hover::before {
            opacity: 1;
        }

        .footer-section a:hover {
            color: var(--accent-color);
            transform: translateX(10px);
        }

        .footer-social {
            margin-top: 3rem;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .social-link {
            width: 55px;
            height: 55px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(96, 165, 250, 0.2);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e1;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
        }

        .social-link:hover {
            background: var(--gradient);
            color: white;
            transform: translateY(-8px) scale(1.1);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.3);
            border-color: transparent;
        }

        .footer-newsletter {
            background: rgba(255, 255, 255, 0.05);
            padding: 2.5rem;
            border-radius: 25px;
            border: 1px solid rgba(96, 165, 250, 0.1);
            backdrop-filter: blur(20px);
            margin-top: 3rem;
        }

        .footer-newsletter h4 {
            color: white;
            font-size: 1.3rem;
            margin-bottom: 1.2rem;
            font-weight: 700;
        }

        .footer-newsletter p {
            color: #cbd5e1;
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
        }

        .newsletter-input {
            flex: 1;
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            backdrop-filter: blur(20px);
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-btn {
            padding: 1rem 2rem;
            background: var(--gradient);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .newsletter-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.4);
        }

        .footer-bottom {
            padding: 3rem 0;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .footer-bottom p {
            color: #94a3b8;
            font-size: 1rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 2.5rem;
        }

        .footer-bottom-links a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: var(--accent-color);
        }

        @media (max-width: 1024px) {
            .footer-main {
                grid-template-columns: 1fr 1fr;
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .footer-main {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }

            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
                gap: 1rem;
            }

            .newsletter-form {
                flex-direction: column;
                gap: 0.8rem;
            }

            .social-links {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .footer-contact-item {
                padding: 0.8rem 1rem;
            }

            .footer-newsletter {
                padding: 2rem 1.5rem;
            }

            .footer-bottom-links {
                flex-direction: column;
                gap: 0.8rem;
            }
        }
</style>
</head>
<body>
    <footer class="footer" id="contact">
        <div class="footer-wave"></div>
        
        <div class="container">
            <div class="footer-content-wrapper">
                <div class="footer-main">
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <div class="footer-logo-icon">
                                <i class="fas fa-hospital"></i>
                            </div>
                            <h3>MediCare Hospital</h3>
                        </div>
                        <p>Pelayanan kesehatan terdepan dengan teknologi modern untuk memberikan perawatan terbaik bagi semua pasien. Komitmen kami adalah menjadi partner kesehatan terpercaya untuk setiap keluarga Indonesia dengan inovasi digital yang mengutamakan kualitas dan keamanan.</p>
                        
                        <div class="footer-contact-info">
                            <div class="footer-contact-item">
                                <i class="fas fa-phone"></i>
                                <span>+62 21 1234 5678</span>
                            </div>
                            <div class="footer-contact-item">
                                <i class="fas fa-envelope"></i>
                                <span>info@medicare.hospital</span>
                            </div>
                            <div class="footer-contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Jl. Sehat Sejahtera No. 123, Jakarta Pusat 10110</span>
                            </div>
                            <div class="footer-contact-item">
                                <i class="fas fa-globe"></i>
                                <span>www.medicare.hospital</span>
                            </div>
                        </div>

                        <div class="footer-social">
                            <h4 style="color: white; margin-bottom: 1.5rem; font-size: 1.2rem; font-weight: 700;">Ikuti Kami</h4>
                            <div class="social-links">
                                <a href="#" class="social-link hover-lift" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link hover-lift" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link hover-lift" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link hover-lift" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link hover-lift" title="YouTube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a href="#" class="social-link hover-lift" title="TikTok">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            </div>
                        </div>

                        <div class="footer-newsletter">
                            <h4>Newsletter & Updates</h4>
                            <p>Dapatkan informasi terbaru tentang layanan kesehatan, tips kesehatan, dan promosi eksklusif langsung di inbox Anda.</p>
                            <div class="newsletter-form">
                                <input type="email" class="newsletter-input" placeholder="Masukkan alamat email Anda">
                                <button class="newsletter-btn hover-lift">Subscribe</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="footer-section">
                        <h3>Layanan Unggulan</h3>
                        <ul>
                            <li><a href="#">Konsultasi Online 24/7</a></li>
                            <li><a href="#">Emergency Care</a></li>
                            <li><a href="#">Rawat Jalan Spesialis</a></li>
                            <li><a href="#">Rawat Inap Premium</a></li>
                            <li><a href="#">Medical Check Up</a></li>
                            <li><a href="#">Farmasi Online</a></li>
                            <li><a href="#">Laboratorium & Radiologi</a></li>
                            <li><a href="#">Home Care Services</a></li>
                            <li><a href="#">Rehabilitation Center</a></li>
                            <li><a href="#">Mental Health Care</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-section">
                        <h3>Spesialisasi Medis</h3>
                        <ul>
                            <li><a href="#">Kardiologi & Jantung</a></li>
                            <li><a href="#">Neurologi & Saraf</a></li>
                            <li><a href="#">Orthopedi & Tulang</a></li>
                            <li><a href="#">Pediatri & Anak</a></li>
                            <li><a href="#">Obstetri & Kandungan</a></li>
                            <li><a href="#">Ophthalmologi & Mata</a></li>
                            <li><a href="#">THT & Kepala Leher</a></li>
                            <li><a href="#">Dermatologi & Kulit</a></li>
                            <li><a href="#">Psikiatri & Kesehatan Mental</a></li>
                            <li><a href="#">Onkologi & Kanker</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-section">
                        <h3>Informasi & Bantuan</h3>
                        <ul>
                            <li><a href="#">Tentang MediCare</a></li>
                            <li><a href="#">Tim Dokter & Staff</a></li>
                            <li><a href="#">Karir & Lowongan</a></li>
                            <li><a href="#">Berita & Artikel Kesehatan</a></li>
                            <li><a href="#">FAQ & Panduan</a></li>
                            <li><a href="#">Hubungi Customer Service</a></li>
                            <li><a href="#">Kebijakan Privasi</a></li>
                            <li><a href="#">Syarat & Ketentuan</a></li>
                            <li><a href="#">Sertifikasi & Akreditasi</a></li>
                            <li><a href="#">Program Asuransi</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p>&copy; 2024 MediCare Hospital. All rights reserved. Built with ❤️ for better healthcare in Indonesia.</p>
                    <div class="footer-bottom-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Cookie Policy</a>
                        <a href="#">Accessibility Statement</a>
                        <a href="#">Site Map</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
    // Enhanced Newsletter functionality - hanya untuk footer
    (function() {
        // Cek jika elemen newsletter ada di halaman ini
        const newsletterForm = document.querySelector('footer .newsletter-form');
        if (!newsletterForm) return;
        
        const newsletterInput = document.querySelector('footer .newsletter-input');
        const newsletterBtn = document.querySelector('footer .newsletter-btn');

        newsletterBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const email = newsletterInput.value.trim();
            
            if (email && email.includes('@') && email.includes('.')) {
                newsletterBtn.innerHTML = '<i class="fas fa-check"></i> Berhasil!';
                newsletterBtn.style.background = 'linear-gradient(135deg, #10b981, #059669)';
                newsletterInput.value = '';
                newsletterInput.style.borderColor = '#10b981';
                
                setTimeout(() => {
                    newsletterBtn.innerHTML = 'Subscribe';
                    newsletterBtn.style.background = '';
                    newsletterInput.style.borderColor = '';
                }, 3000);
            } else {
                newsletterInput.style.borderColor = '#ef4444';
                newsletterInput.style.animation = 'shake 0.5s ease-in-out';
                
                setTimeout(() => {
                    newsletterInput.style.borderColor = '';
                    newsletterInput.style.animation = '';
                }, 2000);
            }
        });

        // Smooth scroll hanya untuk link yang ada di footer
        document.querySelectorAll('footer a[href^="#"]').forEach(anchor => {
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

        // Add shake animation for form validation
        if (!document.querySelector('#footer-shake-animation')) {
            const style = document.createElement('style');
            style.id = 'footer-shake-animation';
            style.textContent = `
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    25% { transform: translateX(-5px); }
                    75% { transform: translateX(5px); }
                }
            `;
            document.head.appendChild(style);
        }
    })();
</script>
</body>
</html>