<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
            --text-lighter: #9ca3af;
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --success-color: #10b981;
            --error-color: #ef4444;
            --gradient: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --gradient-light: linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
            --gradient-vibrant: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            --shadow-blue: 0 20px 50px rgba(37, 99, 235, 0.1);
            --shadow-hover: 0 30px 70px rgba(37, 99, 235, 0.15);
            --border-radius: 16px;
            --border-radius-lg: 20px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0f9ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow-x: hidden;
            font-feature-settings: 'cv11', 'ss01';
            font-optical-sizing: auto;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 200%;
            background: radial-gradient(ellipse, rgba(96, 165, 250, 0.08) 0%, transparent 70%);
            transform: rotate(-15deg);
            z-index: -2;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -30%;
            left: -10%;
            width: 60%;
            height: 120%;
            background: radial-gradient(ellipse, rgba(37, 99, 235, 0.06) 0%, transparent 70%);
            transform: rotate(10deg);
            z-index: -2;
        }

        /* Animated background shapes */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(96, 165, 250, 0.05), rgba(147, 197, 253, 0.03));
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        }

        .bg-shape-1 {
            top: 10%;
            left: 10%;
            width: 300px;
            height: 300px;
            animation-delay: 0s;
        }

        .bg-shape-2 {
            top: 60%;
            right: 15%;
            width: 200px;
            height: 200px;
            animation-delay: -5s;
        }

        .login-container {
            display: flex;
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            background: var(--white);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            animation: slideUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 7rem;
        }

        .login-left {
            flex: 1.1;
            background: var(--gradient);
            color: white;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            z-index: 1;
        }

        .login-left-content {
            position: relative;
            z-index: 2;
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 3rem;
            animation: fadeInLeft 0.8s ease-out 0.2s both;
        }

        .login-logo-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .login-logo-icon:hover {
            transform: scale(1.05);
            background: rgba(255, 255, 255, 0.2);
        }

        .login-logo-text {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .login-left h2 {
            font-size: clamp(2rem, 4vw, 2.75rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -0.025em;
            animation: fadeInLeft 0.8s ease-out 0.4s both;
        }

        .login-left p {
            font-size: 1.125rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            font-weight: 400;
            animation: fadeInLeft 0.8s ease-out 0.6s both;
        }

        .login-features {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
            margin-top: 2rem;
        }

        .login-feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 1rem;
            animation: fadeInLeft 0.6s ease-out both;
            transition: var(--transition);
        }

        .login-feature:nth-child(1) { animation-delay: 0.8s; }
        .login-feature:nth-child(2) { animation-delay: 1s; }
        .login-feature:nth-child(3) { animation-delay: 1.2s; }
        .login-feature:nth-child(4) { animation-delay: 1.4s; }

        .login-feature:hover {
            transform: translateX(5px);
        }

        .login-feature i {
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .login-feature:hover i {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .login-right {
            flex: 1;
            padding: 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--white);
        }

        .login-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInRight 0.8s ease-out 0.3s both;
        }

        .login-header h1 {
            font-size: clamp(1.875rem, 4vw, 2.25rem);
            font-weight: 800;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            letter-spacing: -0.025em;
        }

        .login-header p {
            color: var(--text-light);
            font-size: 1.125rem;
            font-weight: 400;
        }

        .text-gradient {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .login-form {
            width: 100%;
            animation: fadeInRight 0.8s ease-out 0.5s both;
        }

        .form-group {
            margin-bottom: 1.875rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.625rem;
            color: var(--text-color);
            font-size: 0.9375rem;
            letter-spacing: -0.0125em;
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-lighter);
            font-size: 1.125rem;
            transition: var(--transition);
            z-index: 2;
        }

        .form-input {
            width: 100%;
            padding: 1rem 3.25rem 1rem 3rem;
            border: 2px solid var(--gray-200);
            border-radius: 14px;
            font-size: 1rem;
            transition: var(--transition);
            background: var(--white);
            color: var(--text-color);
            font-weight: 400;
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            transform: translateY(-1px);
        }

        .form-input:focus + .input-icon,
        .form-input:not(:placeholder-shown) + .input-icon {
            color: var(--primary-color);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-lighter);
            cursor: pointer;
            font-size: 1.125rem;
            transition: var(--transition);
            z-index: 2;
            padding: 0.25rem;
            border-radius: 6px;
        }

        .password-toggle:hover {
            color: var(--primary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            font-size: 0.9375rem;
            gap: 1rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
            cursor: pointer;
        }

        .remember-me:hover {
            color: var(--primary-color);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .forgot-password:hover {
            color: var(--secondary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        .login-btn {
            width: 100%;
            padding: 1rem 1.5rem;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 1.0625rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: var(--text-lighter);
        }

        .login-divider::before,
        .login-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--gray-200), transparent);
        }

        .login-divider span {
            padding: 0 1.25rem;
            font-size: 0.875rem;
            font-weight: 500;
            background: var(--white);
        }

        .social-login {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .social-btn {
            flex: 1;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            background: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .social-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(0, 0, 0, 0.02) 100%);
            opacity: 0;
            transition: var(--transition);
        }

        .social-btn:hover::before {
            opacity: 1;
        }

        .social-btn.google {
            color: #db4437;
        }

        .social-btn.facebook {
            color: #4267B2;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
            border-color: var(--gray-300);
        }

        .register-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-light);
            font-size: 1rem;
            animation: fadeInRight 0.8s ease-out 0.7s both;
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            margin-left: 0.25rem;
            transition: var(--transition);
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .register-link a:hover {
            color: var(--secondary-color);
            background: rgba(37, 99, 235, 0.05);
        }

        /* Floating Elements */
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            padding: 1rem;
            border-radius: var(--border-radius);
            animation: float 8s ease-in-out infinite;
            z-index: 3;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .floating-1 {
            top: 15%;
            right: 8%;
            animation-delay: 0s;
        }

        .floating-2 {
            bottom: 25%;
            left: 8%;
            animation-delay: 4s;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg); 
            }
            33% { 
                transform: translateY(-15px) rotate(1deg); 
            }
            66% { 
                transform: translateY(-5px) rotate(-1deg); 
            }
        }

        /* Loading state */
        .loading {
            position: relative;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .login-container {
                max-width: 900px;
                min-height: 600px;
            }
            
            .login-left, .login-right {
                padding: 3rem;
            }
        }

        @media (max-width: 900px) {
            body {
                padding: 0.75rem;
            }
            
            .login-container {
                flex-direction: column;
                max-width: 500px;
                min-height: auto;
            }
            
            .login-left {
                padding: 2.5rem;
                text-align: center;
                min-height: 400px;
            }
            
            .login-right {
                padding: 2.5rem;
            }
            
            .login-left h2 {
                font-size: 2rem;
            }
            
            .login-logo {
                justify-content: center;
                margin-bottom: 2rem;
            }
            
            .login-features {
                align-items: center;
                gap: 1rem;
            }
            
            .floating-element {
                display: none;
            }
        }

        @media (max-width: 640px) {
            body {
                padding: 0.5rem;
            }
            
            .login-container {
                border-radius: var(--border-radius);
            }
            
            .login-left, .login-right {
                padding: 2rem;
            }
            
            .login-left h2 {
                font-size: 1.75rem;
                margin-bottom: 1rem;
            }
            
            .login-left p {
                font-size: 1rem;
                margin-bottom: 2rem;
            }
            
            .login-header h1 {
                font-size: 1.75rem;
            }
            
            .login-header {
                margin-bottom: 2rem;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .form-options {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }
            
            .remember-me {
                justify-content: center;
            }
            
            .forgot-password {
                text-align: center;
            }
            
            .bg-shape {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .login-left, .login-right {
                padding: 1.5rem;
            }
            
            .form-input {
                padding: 0.875rem 3rem 0.875rem 2.75rem;
            }
            
            .input-icon {
                left: 0.875rem;
            }
            
            .password-toggle {
                right: 0.875rem;
            }
            
            .login-features {
                gap: 0.875rem;
            }
            
            .login-feature {
                font-size: 0.9375rem;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            :root {
                --shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.4);
            }
            
            .form-input {
                border-width: 2px;
            }
            
            .social-btn {
                border-width: 2px;
            }
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Print styles */
        @media print {
            body {
                background: white;
            }
            
            .login-container {
                box-shadow: none;
                border: 1px solid #ccc;
            }
            
            .login-left {
                background: #f5f5f5 !important;
                color: #333 !important;
            }
            
            .floating-element,
            .bg-shape {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>
    
    <div class="login-container">
        <div class="login-left">
            <div class="floating-element floating-1">
                <i class="fas fa-shield-alt fa-2x"></i>
            </div>
            
            <div class="login-left-content">
                <div class="login-logo">
                    <div class="login-logo-icon">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <div class="login-logo-text">MediCare</div>
                </div>
                
                <h2>Selamat Datang Kembali</h2>
                <p>Masuk ke akun Anda untuk mengakses layanan kesehatan digital terdepan dan melanjutkan perjalanan kesehatan Anda dengan mudah.</p>
                
                <div class="login-features">
                    <div class="login-feature">
                        <i class="fas fa-user-md"></i>
                        <span>Konsultasi dokter 24/7</span>
                    </div>
                    <div class="login-feature">
                        <i class="fas fa-calendar-check"></i>
                        <span>Kelola janji temu mudah</span>
                    </div>
                    <div class="login-feature">
                        <i class="fas fa-file-medical"></i>
                        <span>Rekam medis terintegrasi</span>
                    </div>
                    <div class="login-feature">
                        <i class="fas fa-bell"></i>
                        <span>Notifikasi kesehatan personal</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="login-right">
            <div class="login-header">
                <h1>Masuk ke <span class="text-gradient">Akun</span></h1>
                <p>Silakan masukkan detail login Anda untuk melanjutkan</p>
            </div>
            
            <form class="login-form" id="loginForm">
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-envelope"></i>
                        <input 
                            type="email" 
                            id="email" 
                            class="form-input" 
                            placeholder="nama@contoh.com" 
                            required
                            autocomplete="email"
                        >
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-lock"></i>
                        <input 
                            type="password" 
                            id="password" 
                            class="form-input" 
                            placeholder="Masukkan kata sandi" 
                            required
                            autocomplete="current-password"
                        >
                        <span class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    <a href="#" class="forgot-password">Lupa kata sandi?</a>
                </div>
                
                <button type="submit" class="login-btn" id="loginBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Masuk</span>
                </button>
            </form>
            
            <div class="login-divider">
                <span>Atau lanjutkan dengan</span>
            </div>
            
            <div class="social-login">
                <button class="social-btn google" type="button">
                    <i class="fab fa-google"></i>
                    <span>Google</span>
                </button>
                <button class="social-btn facebook" type="button">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </button>
            </div>
            
            <div class="register-link">
                Belum punya akun?<a href="#" id="registerLink">Daftar Sekarang</a>
            </div>
        </div>
    </div>

    <script>
        // Enhanced form interactions
        class LoginForm {
            constructor() {
                this.form = document.getElementById('loginForm');
                this.emailInput = document.getElementById('email');
                this.passwordInput = document.getElementById('password');
                this.passwordToggle = document.getElementById('passwordToggle');
                this.loginBtn = document.getElementById('loginBtn');
                this.rememberCheckbox = document.getElementById('remember');
                
                this.init();
            }
            
            init() {
                this.setupPasswordToggle();
                this.setupFormValidation();
                this.setupFormSubmission();
                this.setupInputAnimations();
                this.setupSocialLogin();
            }
            
            setupPasswordToggle() {
                this.passwordToggle.addEventListener('click', () => {
                    const isPassword = this.passwordInput.type === 'password';
                    this.passwordInput.type = isPassword ? 'text' : 'password';
                    
                    const icon = this.passwordToggle.querySelector('i');
                    icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
                    
                    // Add smooth transition
                    this.passwordToggle.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.passwordToggle.style.transform = 'scale(1)';
                    }, 150);
                });
            }
            
            setupInputAnimations() {
                const inputs = [this.emailInput, this.passwordInput];
                
                inputs.forEach(input => {
                    input.addEventListener('focus', () => {
                        input.parentElement.style.transform = 'translateY(-2px)';
                    });
                    
                    input.addEventListener('blur', () => {
                        input.parentElement.style.transform = 'translateY(0)';
                    });
                    
                    // Real-time validation feedback
                    input.addEventListener('input', () => {
                        this.validateInput(input);
                    });
                });
            }
            
            validateInput(input) {
                const isValid = input.checkValidity();
                const inputContainer = input.parentElement;
                
                if (input.value.length > 0) {
                    if (isValid) {
                        input.style.borderColor = '#10b981';
                        input.style.boxShadow = '0 0 0 4px rgba(16, 185, 129, 0.1)';
                    } else {
                        input.style.borderColor = '#ef4444';
                        input.style.boxShadow = '0 0 0 4px rgba(239, 68, 68, 0.1)';
                    }
                } else {
                    input.style.borderColor = '';
                    input.style.boxShadow = '';
                }
            }
            
            setupFormValidation() {
                // Email validation with better UX
                this.emailInput.addEventListener('blur', () => {
                    if (this.emailInput.value && !this.emailInput.checkValidity()) {
                        this.showToast('Silakan masukkan alamat email yang valid', 'error');
                    }
                });
                
                // Password strength indicator (basic)
                this.passwordInput.addEventListener('input', () => {
                    const password = this.passwordInput.value;
                    if (password.length > 0 && password.length < 6) {
                        this.passwordInput.style.borderColor = '#f59e0b';
                        this.passwordInput.style.boxShadow = '0 0 0 4px rgba(245, 158, 11, 0.1)';
                    }
                });
            }
            
            setupFormSubmission() {
                this.form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    await this.handleSubmit();
                });
            }
            
            setupSocialLogin() {
                const socialBtns = document.querySelectorAll('.social-btn');
                socialBtns.forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const platform = btn.classList.contains('google') ? 'Google' : 'Facebook';
                        this.handleSocialLogin(platform);
                    });
                });
            }
            
            async handleSubmit() {
                if (!this.form.checkValidity()) {
                    this.showToast('Mohon lengkapi semua field yang diperlukan', 'error');
                    return;
                }
                
                const email = this.emailInput.value;
                const password = this.passwordInput.value;
                const remember = this.rememberCheckbox.checked;
                
                // Show loading state
                this.setLoadingState(true);
                
                try {
                    // Simulate API call
                    await this.simulateLogin(email, password, remember);
                    
                    this.showToast('Login berhasil! Mengalihkan...', 'success');
                    
                    // Simulate redirect after success
                    setTimeout(() => {
                        // window.location.href = '/dashboard';
                        console.log('Redirect to dashboard');
                    }, 1500);
                    
                } catch (error) {
                    this.showToast('Login gagal. Periksa email dan password Anda.', 'error');
                } finally {
                    this.setLoadingState(false);
                }
            }
            
            simulateLogin(email, password, remember) {
                return new Promise((resolve, reject) => {
                    setTimeout(() => {
                        // Simple validation simulation
                        if (email.includes('@') && password.length >= 6) {
                            resolve({ success: true });
                        } else {
                            reject(new Error('Invalid credentials'));
                        }
                    }, 2000);
                });
            }
            
            handleSocialLogin(platform) {
                this.showToast(`Mengalihkan ke ${platform}...`, 'info');
                // Here you would integrate with actual OAuth
                console.log(`Social login with ${platform}`);
            }
            
            setLoadingState(loading) {
                const btnText = this.loginBtn.querySelector('span');
                const btnIcon = this.loginBtn.querySelector('i');
                
                if (loading) {
                    this.loginBtn.disabled = true;
                    this.loginBtn.style.opacity = '0.8';
                    btnIcon.className = 'fas fa-spinner fa-spin';
                    btnText.textContent = 'Memproses...';
                } else {
                    this.loginBtn.disabled = false;
                    this.loginBtn.style.opacity = '1';
                    btnIcon.className = 'fas fa-sign-in-alt';
                    btnText.textContent = 'Masuk';
                }
            }
            
            showToast(message, type = 'info') {
                // Create toast notification
                const toast = document.createElement('div');
                toast.className = `toast toast-${type}`;
                toast.innerHTML = `
                    <div class="toast-content">
                        <i class="fas ${this.getToastIcon(type)}"></i>
                        <span>${message}</span>
                    </div>
                `;
                
                // Add toast styles
                toast.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: ${this.getToastColor(type)};
                    color: white;
                    padding: 1rem 1.5rem;
                    border-radius: 12px;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                    z-index: 1000;
                    transform: translateX(400px);
                    transition: transform 0.3s ease;
                    max-width: 300px;
                `;
                
                document.body.appendChild(toast);
                
                // Animate in
                requestAnimationFrame(() => {
                    toast.style.transform = 'translateX(0)';
                });
                
                // Auto remove
                setTimeout(() => {
                    toast.style.transform = 'translateX(400px)';
                    setTimeout(() => {
                        document.body.removeChild(toast);
                    }, 300);
                }, 4000);
            }
            
            getToastIcon(type) {
                const icons = {
                    success: 'fa-check-circle',
                    error: 'fa-exclamation-circle',
                    info: 'fa-info-circle',
                    warning: 'fa-exclamation-triangle'
                };
                return icons[type] || icons.info;
            }
            
            getToastColor(type) {
                const colors = {
                    success: '#10b981',
                    error: '#ef4444',
                    info: '#3b82f6',
                    warning: '#f59e0b'
                };
                return colors[type] || colors.info;
            }
        }
        
        // Enhanced animations and interactions
        class AnimationController {
            constructor() {
                this.init();
            }
            
            init() {
                this.setupIntersectionObserver();
                this.setupParallaxEffect();
                this.setupMouseTracker();
            }
            
            setupIntersectionObserver() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.animationPlayState = 'running';
                        }
                    });
                }, { threshold: 0.1 });
                
                document.querySelectorAll('.login-feature, .login-form').forEach(el => {
                    observer.observe(el);
                });
            }
            
            setupParallaxEffect() {
                const shapes = document.querySelectorAll('.bg-shape');
                
                document.addEventListener('mousemove', (e) => {
                    const mouseX = e.clientX / window.innerWidth;
                    const mouseY = e.clientY / window.innerHeight;
                    
                    shapes.forEach((shape, index) => {
                        const speed = (index + 1) * 0.5;
                        const x = (mouseX - 0.5) * speed * 20;
                        const y = (mouseY - 0.5) * speed * 20;
                        
                        shape.style.transform = `translate(${x}px, ${y}px)`;
                    });
                });
            }
            
            setupMouseTracker() {
                const loginContainer = document.querySelector('.login-container');
                
                loginContainer.addEventListener('mousemove', (e) => {
                    const rect = loginContainer.getBoundingClientRect();
                    const x = ((e.clientX - rect.left) / rect.width - 0.5) * 2;
                    const y = ((e.clientY - rect.top) / rect.height - 0.5) * 2;
                    
                    loginContainer.style.transform = `
                        perspective(1000px) 
                        rotateY(${x * 2}deg) 
                        rotateX(${y * 2}deg)
                        translateZ(0)
                    `;
                });
                
                loginContainer.addEventListener('mouseleave', () => {
                    loginContainer.style.transform = 'perspective(1000px) rotateY(0deg) rotateX(0deg) translateZ(0)';
                });
            }
        }
        
        // Keyboard navigation enhancement
        class KeyboardNavigation {
            constructor() {
                this.setupKeyboardShortcuts();
            }
            
            setupKeyboardShortcuts() {
                document.addEventListener('keydown', (e) => {
                    // Enter to submit form
                    if (e.key === 'Enter' && !e.shiftKey) {
                        const activeElement = document.activeElement;
                        if (activeElement.tagName === 'INPUT') {
                            e.preventDefault();
                            document.getElementById('loginForm').dispatchEvent(new Event('submit'));
                        }
                    }
                    
                    // Escape to clear form
                    if (e.key === 'Escape') {
                        document.getElementById('email').value = '';
                        document.getElementById('password').value = '';
                        document.getElementById('email').focus();
                    }
                });
            }
        }
        
        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new LoginForm();
            new AnimationController();
            new KeyboardNavigation();
            
            // Add some extra interactive elements
            const registerLink = document.getElementById('registerLink');
            registerLink.addEventListener('click', (e) => {
                e.preventDefault();
                // Here you would navigate to register page
                console.log('Navigate to register');
            });
            
            // Add focus trap for accessibility
            const focusableElements = document.querySelectorAll(
                'input, button, a, [tabindex]:not([tabindex="-1"])'
            );
            
            const firstElement = focusableElements[0];
            const lastElement = focusableElements[focusableElements.length - 1];
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Tab') {
                    if (e.shiftKey && document.activeElement === firstElement) {
                        e.preventDefault();
                        lastElement.focus();
                    } else if (!e.shiftKey && document.activeElement === lastElement) {
                        e.preventDefault();
                        firstElement.focus();
                    }
                }
            });
        });
        
        // Service Worker registration for PWA capabilities (optional)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('SW registered: ', registration);
                    })
                    .catch(registrationError => {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
    </script>
</body>
</html>