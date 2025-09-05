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

        /* Navbar Styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.1);
            padding: 1rem 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.8rem 0;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.15);
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-decoration: none;
        }

        .navbar-logo-icon {
            width: 45px;
            height: 45px;
            background: var(--gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .navbar-logo-text {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--text-color) 0%, var(--primary-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-menu {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .navbar-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .navbar-link {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            padding: 0.5rem 0;
        }

        .navbar-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--gradient);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .navbar-link:hover::after,
        .navbar-link.active::after {
            width: 100%;
        }

        .navbar-link:hover {
            color: var(--primary-color);
        }

        .navbar-auth {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .navbar-btn {
            padding: 0.8rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-btn-login {
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            background: transparent;
        }

        .navbar-btn-login:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .navbar-btn-register {
            background: var(--gradient);
            color: white;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .navbar-btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(37, 99, 235, 0.3);
        }

        .navbar-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
        }

        .navbar-toggle span {
            height: 3px;
            width: 100%;
            background: var(--primary-color);
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        /* Mobile Navbar */
        @media (max-width: 968px) {
            .navbar-toggle {
                display: flex;
            }

            .navbar-menu {
                position: fixed;
                top: 72px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 72px);
                background: white;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                padding: 3rem 2rem;
                gap: 2.5rem;
                transition: left 0.4s ease;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                overflow-y: auto;
            }

            .navbar-menu.active {
                left: 0;
            }

            .navbar-links {
                flex-direction: column;
                align-items: center;
                gap: 2rem;
                width: 100%;
            }

            .navbar-link {
                font-size: 1.2rem;
                padding: 0.8rem 0;
            }

            .navbar-auth {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
            }

            .navbar-btn {
                width: 100%;
                justify-content: center;
                padding: 1rem 2rem;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .navbar-logo-text {
                font-size: 1.3rem;
            }

            .navbar-logo-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
        }

        /* Toggle animation */
        .navbar-toggle.active span:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }

        .navbar-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggle.active span:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }
    </style>
<body>
    
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="#home" class="navbar-logo">
                <div class="navbar-logo-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <span class="navbar-logo-text">MediCare</span>
            </a>

            <div class="navbar-menu" id="navbar-menu">
                <ul class="navbar-links">
                    <li><a href="#home" class="navbar-link">Beranda</a></li>
                    <li><a href="#features" class="navbar-link">Layanan</a></li>
                    <li><a href="#roles" class="navbar-link">Fitur</a></li>
                    <li><a href="#contact" class="navbar-link">Kontak</a></li>
                </ul>

                <div class="navbar-auth">
                    <a href="/login" class="navbar-btn navbar-btn-login">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </a>
                    <a href="/register" class="navbar-btn navbar-btn-register">
                        <i class="fas fa-user-plus"></i>
                        <span>Daftar</span>
                    </a>
                </div>
            </div>

            <div class="navbar-toggle" id="navbar-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <script>
        // Navbar functionality
        const navbar = document.getElementById('navbar');
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbarMenu = document.getElementById('navbar-menu');
        const navbarLinks = document.querySelectorAll('.navbar-link');

        // Toggle mobile menu
        navbarToggle.addEventListener('click', () => {
            navbarMenu.classList.toggle('active');
            navbarToggle.classList.toggle('active');
        });

        // Close mobile menu when clicking on a link
        navbarLinks.forEach(link => {
            link.addEventListener('click', () => {
                navbarMenu.classList.remove('active');
                navbarToggle.classList.remove('active');
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Active link highlighting based on scroll position
        const sections = document.querySelectorAll('section');
        
        window.addEventListener('scroll', () => {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                
                if (window.scrollY >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navbarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').substring(1) === current) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>