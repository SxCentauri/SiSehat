 <style>
        :root {
            --primary-color: #00a8cc;
            --secondary-color: #007bff;
            --text-color: #333;
            --gradient: linear-gradient(135deg, #00a8cc 0%, #007bff 100%);
            --shadow: 0 10px 30px rgba(0, 168, 204, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            padding-top: 80px;
            color: var(--text-color);
            line-height: 1.6;
            background-color: #f8f9fa;
        }

        /* Navbar Styles - PERBAIKAN */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(0, 168, 204, 0.1);
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            box-shadow: var(--shadow);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-color);
            text-decoration: none;
            z-index: 1001;
        }

        .logo i {
            margin-right: 0.5rem;
            font-size: 2rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-menu a:hover {
            color: var(--primary-color);
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--gradient);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-auth {
            display: flex;
            gap: 1rem;
        }

        .nav-auth a:hover {
            color: white;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            box-shadow: var(--shadow);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 168, 204, 0.2);
            color: black;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: black;
            transform: translateY(-2px);
        }

        /* Menghilangkan garis bawah pada tombol */
        .nav-auth .btn::after {
            display: none !important;
        }

        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 0.5rem;
            z-index: 1001;
        }

        .mobile-menu-toggle span {
            width: 25px;
            height: 3px;
            background: var(--primary-color);
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 3px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 70%;
                height: 100vh;
                background: white;
                flex-direction: column;
                padding: 6rem 2rem 2rem;
                transition: right 0.4s ease;
                box-shadow: var(--shadow);
                justify-content: flex-start;
                gap: 2rem;
                overflow-y: auto;
            }

            .nav-menu.active {
                right: 0;
            }

            .nav-auth {
                margin-top: 2rem;
                flex-direction: column;
                width: 100%;
                align-items: center;
            }

            .mobile-menu-toggle {
                display: flex;
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                width: 80%;
            }
        }

        @media (max-width: 480px) {
            .nav-container {
                padding: 0 1rem;
            }
            
            .nav-menu {
                width: 85%;
            }
            
            .logo {
                font-size: 1.5rem;
            }
            
            .logo i {
                font-size: 1.7rem;
            }
        }
    </style>
<body>
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="/" class="logo">
                <i class="fas fa-heartbeat"></i>
                Si Sehat
            </a>
            
            <div class="mobile-menu-toggle" id="mobile-menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <ul class="nav-menu" id="nav-menu">
                <li><a href="/">Beranda</a></li>
                <li><a href="#features">Layanan</a></li>
                <li><a href="#roles">Fitur</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
                <div class="nav-auth">
                    <a href="#" class="btn btn-outline">Masuk</a>
                    <a href="#" class="btn btn-primary">Daftar</a>
                </div>
            </ul>
        </div>
    </nav>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const navMenu = document.getElementById('nav-menu');
        const body = document.body;

        mobileMenuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            
            // Animate hamburger
            const spans = mobileMenuToggle.querySelectorAll('span');
            if (navMenu.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
                body.style.overflow = 'hidden';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
                body.style.overflow = 'auto';
            }
        });

        // Close mobile menu when clicking on links
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                const spans = mobileMenuToggle.querySelectorAll('span');
                spans.forEach(span => {
                    span.style.transform = 'none';
                    span.style.opacity = '1';
                });
                body.style.overflow = 'auto';
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (navMenu.classList.contains('active') && 
                !navMenu.contains(e.target) && 
                !mobileMenuToggle.contains(e.target)) {
                navMenu.classList.remove('active');
                const spans = mobileMenuToggle.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
                body.style.overflow = 'auto';
            }
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    const navbarHeight = document.getElementById('navbar').offsetHeight;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (navMenu.classList.contains('active')) {
                        navMenu.classList.remove('active');
                        const spans = mobileMenuToggle.querySelectorAll('span');
                        spans.forEach(span => {
                            span.style.transform = 'none';
                            span.style.opacity = '1';
                        });
                        body.style.overflow = 'auto';
                    }
                }
            });
        });
    </script>