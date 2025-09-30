<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --accent-color: #3b82f6;
            --gradient: linear-gradient(135deg, #3b82f6, #1d4ed8);
        }

        /* Footer Styling - Posisi Presisi */
        .footer {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            color: white;
            position: relative;
            overflow: hidden;
            margin-top: auto;
            width: 100%;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="%23f8fafc"/></svg>') no-repeat center;
            background-size: cover;
        }

        .footer-content-wrapper {
            padding: 8rem 0 4rem;
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
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

        .footer-side-content {
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        .footer-social {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid rgba(96, 165, 250, 0.1);
            backdrop-filter: blur(20px);
        }

        .footer-social h4 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
            font-weight: 700;
            text-align: center;
        }

        .social-links {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .social-link {
            width: 100%;
            height: 55px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(96, 165, 250, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #cbd5e1;
            font-size: 1.4rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(20px);
            text-decoration: none;
        }

        .social-link:hover {
            background: var(--gradient);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(37, 99, 235, 0.3);
            border-color: transparent;
        }

        .footer-newsletter {
            background: rgba(255, 255, 255, 0.05);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid rgba(96, 165, 250, 0.1);
            backdrop-filter: blur(20px);
        }

        .footer-newsletter h4 {
            color: white;
            font-size: 1.3rem;
            margin-bottom: 1.2rem;
            font-weight: 700;
            text-align: center;
        }

        .footer-newsletter p {
            color: #cbd5e1;
            margin-bottom: 2rem;
            font-size: 1rem;
            line-height: 1.6;
            text-align: center;
        }

        .newsletter-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .newsletter-input {
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
            grid-column: 1 / -1;
        }

        .footer-bottom-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .footer-bottom p {
            color: #94a3b8;
            font-size: 1rem;
            margin: 0;
            text-align: center;
        }

        .footer-bottom-links {
            display: flex;
            gap: 2.5rem;
            flex-wrap: wrap;
            justify-content: center;
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

        /* Responsive Design */
        @media (max-width: 968px) {
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .footer-side-content {
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .footer-content-wrapper {
                padding: 6rem 1.5rem 3rem;
            }

            .footer-logo {
                flex-direction: column;
                text-align: center;
            }

            .social-links {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-bottom-links {
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .footer-newsletter,
            .footer-social {
                padding: 1.5rem;
            }

            .footer-contact-item {
                padding: 0.8rem 1rem;
            }

            .social-links {
                grid-template-columns: 1fr;
            }

            .social-link {
                height: 50px;
                font-size: 1.2rem;
            }

            .footer-bottom-links {
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Footer dengan posisi yang presisi -->
    <footer class="footer" id="contact">
        <div class="footer-wave"></div>

        <div class="footer-content-wrapper">
            <div class="footer-grid">
                <!-- Kolom Kiri: Brand, Deskripsi, Kontak -->
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
                            <span>+62 8952 9615 638</span>
                        </div>
                        <div class="footer-contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@medicare.hospital</span>
                        </div>
                        <div class="footer-contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Basuki Rahmat, Padang Jati, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222</span>
                        </div>
                        <div class="footer-contact-item">
                            <i class="fas fa-globe"></i>
                            <span>www.medicare.hospital</span>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Sosial Media dan Newsletter -->
                <div class="footer-side-content">
                    <div class="footer-social">
                        <h4>Ikuti Kami</h4>
                        <div class="social-links">
                            <a href="#" class="social-link" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-link" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-link" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-link" title="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="social-link" title="TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>

                    <div class="footer-newsletter">
                        <h4>Newsletter & Updates</h4>
                        <p>Dapatkan informasi terbaru tentang layanan kesehatan, tips kesehatan, dan promosi eksklusif langsung di inbox Anda.</p>
                        <div class="newsletter-form">
                            <input type="email" class="newsletter-input" placeholder="Masukkan alamat email Anda">
                            <button class="newsletter-btn">Subscribe</button>
                        </div>
                    </div>
                </div>

                <!-- Footer Bottom yang membentang penuh -->
                <div class="footer-bottom">
                    <div class="footer-bottom-content">
                        <p>&copy; 2025 MediCare Hospital. All rights reserved. Built with ❤️ for better healthcare in Indonesia.</p>
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
        </div>
    </footer>

    <script>
    // Enhanced Newsletter functionality
    (function() {
        const newsletterForm = document.querySelector('.newsletter-form');
        if (!newsletterForm) return;

        const newsletterInput = document.querySelector('.newsletter-input');
        const newsletterBtn = document.querySelector('.newsletter-btn');

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
