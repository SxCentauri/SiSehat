<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }

        :root{
            --primary-color:#2563eb; --secondary-color:#1e40af; --accent-color:#60a5fa;
            --light-blue:#dbeafe; --extra-light-blue:#eff6ff;
            --text-color:#1f2937; --text-light:#6b7280; --text-lighter:#9ca3af;
            --white:#ffffff; --gray-50:#f9fafb; --gray-100:#f3f4f6; --gray-200:#e5e7eb;
            --success-color:#10b981; --error-color:#ef4444;
            --gradient:linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            --gradient-light:linear-gradient(135deg, var(--light-blue), var(--extra-light-blue));
            --gradient-vibrant:linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            --gradient-glass:linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            --shadow-sm:0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
            --shadow:0 4px 6px -1px rgba(0,0,0,.1), 0 2px 4px -1px rgba(0,0,0,.06);
            --shadow-md:0 10px 15px -3px rgba(0,0,0,.1), 0 4px 6px -2px rgba(0,0,0,.05);
            --shadow-lg:0 20px 25px -5px rgba(0,0,0,.1), 0 10px 10px -5px rgba(0,0,0,.04);
            --shadow-xl:0 25px 50px -12px rgba(0,0,0,.25);
            --shadow-blue:0 10px 30px rgba(37,99,235,.15);
            --shadow-hover:0 15px 40px rgba(37,99,235,.2);
            --border-radius:12px; --border-radius-lg:16px; --border-radius-xl:20px;
            --transition:all .3s cubic-bezier(.4,0,.2,1);
        }

        body{
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0f9ff 100%);
            min-height:100vh; display:flex; align-items:center; justify-content:center;
            padding:1rem; position:relative; overflow-x:hidden;
        }
        body::before{
            content:''; position:fixed; top:-50%; right:-20%; width:80%; height:200%;
            background:radial-gradient(ellipse, rgba(96,165,250,.1) 0%, transparent 70%);
            transform:rotate(-15deg); z-index:-2;
        }
        body::after{
            content:''; position:fixed; bottom:-30%; left:-10%; width:60%; height:120%;
            background:radial-gradient(ellipse, rgba(37,99,235,.08) 0%, transparent 70%);
            transform:rotate(10deg); z-index:-2;
        }

        /* ====== NAVBAR ====== */
        .navbar{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: var(--white);
            box-shadow: var(--shadow-sm);
            padding: 15px 0;
            z-index: 1000;
            transition: var(--transition);
        }
        .navbar-container{
            max-width:1200px; margin:0 auto; padding:0 2rem; display:flex;
            justify-content:space-between; align-items:center;
        }
        .navbar-logo{
            display:flex; align-items:center; gap:1rem; text-decoration:none;
        }
        .navbar-logo-icon{
            width:45px; height:45px; background:var(--gradient); border-radius:12px;
            display:flex; align-items:center; justify-content:center; color:#fff;
            font-size:1.3rem; box-shadow:var(--shadow-blue);
            transition: var(--transition);
        }
        .navbar-logo:hover .navbar-logo-icon {
            transform: scale(1.05);
            box-shadow: var(--shadow-hover);
        }
        .navbar-logo-text{
            font-size:1.5rem; font-weight:800;
            background:linear-gradient(135deg, var(--text-color) 0%, var(--primary-color) 100%);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text;
        }

        /* Navbar Toggle Button (Mobile) */
        .navbar-toggle {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 21px;
            cursor: pointer;
            z-index: 1001;
            position: relative;
        }

        .navbar-toggle span {
            height: 3px;
            width: 100%;
            background:var(--primary-color);
            border-radius: 3px;
            transition: var(--transition);
            transform-origin: center;
        }

        .navbar-toggle.active span:nth-child(1) {
            transform: translateY(9px) rotate(45deg);
        }
        .navbar-toggle.active span:nth-child(2) {
            opacity: 0;
        }
        .navbar-toggle.active span:nth-child(3) {
            transform: translateY(-9px) rotate(-45deg);
        }

        .navbar-auth{
            display:flex; gap:1rem; align-items:center;
        }
        .navbar-btn{
            padding: .65rem 1.5rem; font-size:.9rem; font-weight:600; border-radius:10px;
            text-decoration:none; transition:all .3s ease;
            display:inline-flex; align-items:center; gap:.5rem;
        }
        .navbar-btn-login{
            color:var(--primary-color); border:2px solid var(--primary-color);
            background:transparent;
        }
        .navbar-btn-login:hover{
            background:var(--primary-color); color:#fff; transform:translateY(-2px);
            box-shadow:var(--shadow-blue);
        }
        .navbar-btn-register{
            background:var(--gradient); color:#fff;
            box-shadow:var(--shadow-blue);
        }
        .navbar-btn-register:hover{
            transform:translateY(-2px); box-shadow:var(--shadow-hover);
        }

        /* Mobile Menu (Full Width - Tanpa Blur) */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100vh;
            background: var(--white);
            z-index: 999;
            transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            box-shadow: var(--shadow-lg);
        }

        .mobile-menu.active {
            left: 0;
        }

        .mobile-menu .navbar-btn {
            width: 80%;
            max-width: 280px;
            justify-content: center;
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }

        .mobile-menu-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gray-100);
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .mobile-menu-close:hover {
            background: var(--gray-200);
            transform: rotate(90deg);
        }

        .mobile-menu-close i {
            font-size: 1.2rem;
            color: var(--text-color);
        }

        /* ====== CARD WRAPPER ====== */
        .login-container{
            display:flex; width:100%; max-width:1100px; min-height:650px;
            background:var(--white); border-radius:var(--border-radius-xl);
            overflow:hidden; box-shadow:var(--shadow-xl);
            animation:slideUp .8s cubic-bezier(.4,0,.2,1);
            margin-top:7rem;
        }
        .login-left{
            flex:1.1; background:var(--gradient-vibrant); color:#fff; padding:3.5rem;
            display:flex; flex-direction:column; justify-content:center; position:relative; overflow:hidden;
        }
        .login-left::before{
            content:''; position:absolute; inset:0;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(255,255,255,.08) 0%, transparent 50%);
            z-index:1;
        }
        .login-left-content{ position:relative; z-index:2; }
        .login-logo{ display:flex; align-items:center; gap:1rem; margin-bottom:3rem; animation:fadeInLeft .8s ease-out .2s both; }
        .login-logo-icon{
            width:60px; height:60px; background:rgba(255,255,255,.15); border-radius:var(--border-radius);
            display:flex; align-items:center; justify-content:center; font-size:1.8rem; color:#fff;
            border:1px solid rgba(255,255,255,.2); transition:var(--transition);
        }
        .login-logo:hover .login-logo-icon {
            transform: scale(1.05);
            background: rgba(255,255,255,.2);
        }
        .login-logo-text{ font-size:2rem; font-weight:800; letter-spacing:-.025em; }
        .login-left h2{ font-size:clamp(2rem,4vw,2.75rem); font-weight:800; margin-bottom:1.5rem; line-height:1.1; letter-spacing:-.025em; animation:fadeInLeft .8s ease-out .4s both; }
        .login-left p{ font-size:1.125rem; line-height:1.7; margin-bottom:2.5rem; opacity:.9; font-weight:400; animation:fadeInLeft .8s ease-out .6s both; }

        /* ==== FEATURES ==== */
        .login-features{ display:flex; flex-direction:column; gap:1.25rem; margin-top:2rem; }
        .login-feature{
            display:flex; align-items:center; gap:1rem; font-size:1rem;
            animation:fadeInLeft .6s ease-out both; transition:var(--transition);
            padding: 0.75rem; border-radius: var(--border-radius);
        }
        .login-feature:nth-child(1){ animation-delay:.8s }
        .login-feature:nth-child(2){ animation-delay:1s }
        .login-feature:nth-child(3){ animation-delay:1.2s }
        .login-feature:nth-child(4){ animation-delay:1.4s }
        .login-feature:hover{
            transform:translateX(5px);
            background: rgba(255, 255, 255, 0.1);
        }
        .login-feature i{
            width:32px; height:32px; background:rgba(255,255,255,.15); border-radius:10px;
            display:flex; align-items:center; justify-content:center; font-size:1rem;
            border:1px solid rgba(255,255,255,.1); transition:var(--transition);
        }
        .login-feature:hover i{
            background:rgba(255,255,255,.2);
            transform:scale(1.1);
        }

        .login-right{
            flex:1; padding:3.5rem; display:flex; flex-direction:column; justify-content:center;
            background:#fff; position: relative;
        }
        .login-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient);
        }
        .login-header{ text-align:center; margin-bottom:3rem; animation:fadeInRight .8s ease-out .3s both; }
        .login-header h1{ font-size:clamp(1.875rem,4vw,2.25rem); font-weight:800; color:var(--text-color); margin-bottom:.5rem; letter-spacing:-.025em; }
        .login-header p{ color:var(--text-light); font-size:1.125rem; font-weight:400; }
        .text-gradient{ background:var(--gradient); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }

        .login-form{ width:100%; max-width:520px; margin:0 auto; animation:fadeInRight .8s ease-out .5s both; }
        .form-group{ margin-bottom:1.875rem; position:relative; }
        .form-label{ display:block; font-weight:600; margin-bottom:.625rem; color:var(--text-color); font-size:.9375rem; letter-spacing:-.0125em; }
        .input-with-icon{ position:relative; }
        .input-icon{ position:absolute; left:1rem; top:50%; transform:translateY(-50%); color:var(--text-lighter); font-size:1.125rem; transition:var(--transition); z-index:2; }
        .form-input{
            width:100%; padding:1rem 3.25rem 1rem 3rem; border:2px solid var(--gray-200);
            border-radius:14px; font-size:1rem; transition:var(--transition); background:#fff; color:var(--text-color);
            box-shadow: var(--shadow-sm);
        }
        .form-input:focus{
            outline:none; border-color:var(--primary-color);
            box-shadow: 0 0 0 4px rgba(37,99,235,.1), var(--shadow-sm);
            transform:translateY(-2px);
        }
        .form-input:focus + .input-icon, .form-input:not(:placeholder-shown) + .input-icon{ color:var(--primary-color); }
        .password-toggle{
            position:absolute; right:1rem; top:50%; transform:translateY(-50%) !important;
            color:var(--text-lighter); cursor:pointer; font-size:1.125rem; transition:var(--transition); z-index:2; padding:.25rem; border-radius:6px;
            background:transparent; border:0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .password-toggle:hover{ color:var(--primary-color); background:rgba(37,99,235,.05); }

        .form-options{ display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; font-size:.9375rem; gap:1rem; }
        .remember-me{ display:flex; align-items:center; gap:.625rem; cursor:pointer; transition:var(--transition); padding: 0.25rem 0.5rem; border-radius: 6px; }
        .remember-me input{ width:18px; height:18px; accent-color:var(--primary-color); cursor:pointer; }
        .remember-me:hover{ color:var(--primary-color); background:rgba(37,99,235,.05); }
        .forgot-password{ color:var(--primary-color); text-decoration:none; font-weight:600; transition:var(--transition); padding:.25rem .5rem; border-radius:6px; }
        .forgot-password:hover{ color:var(--secondary-color); background:rgba(37,99,235,.05); }

        .login-btn{
            width:100%; padding:1rem 1.5rem; background:var(--gradient); color:#fff; border:none; border-radius:14px;
            font-size:1.0625rem; font-weight:600; cursor:pointer; transition:var(--transition);
            box-shadow: var(--shadow-blue); display:flex; align-items:center; justify-content:center; gap:.625rem;
            position:relative; overflow:hidden;
        }
        .login-btn::before{
            content:''; position:absolute; inset:0; left:-100%;
            background:linear-gradient(90deg, transparent, rgba(255,255,255,.3), transparent);
            transition:left .7s ease;
        }
        .login-btn:hover::before{ left:100%; }
        .login-btn:hover{
            transform:translateY(-3px);
            box-shadow: var(--shadow-hover);
        }
        .login-btn:active {
            transform: translateY(-1px);
        }
        .login-btn.loading{ pointer-events:none; }
        .login-btn.loading::after{
            content:''; width:18px; height:18px; border:2px solid transparent; border-top:2px solid #fff; border-radius:50%; margin-left:8px; animation:spin 1s linear infinite;
        }

        .login-divider{ display:flex; align-items:center; margin:2rem 0; color:var(--text-lighter); }
        .login-divider::before, .login-divider::after{ content:''; flex:1; height:1px; background:linear-gradient(to right, transparent, var(--gray-200), transparent); }
        .login-divider span{ padding:0 1.25rem; font-size:.875rem; font-weight:500; background:#fff; }

        .social-login{ display:flex; gap:1rem; margin-bottom:2rem; }
        .social-btn{
            flex:1; padding:.875rem 1rem; border:2px solid var(--gray-200); border-radius:12px; background:#fff;
            display:flex; align-items:center; justify-content:center; gap:.625rem; font-weight:600; cursor:pointer; transition:var(--transition); position:relative; overflow:hidden;
            box-shadow: var(--shadow-sm);
        }
        .social-btn:hover{
            transform:translateY(-2px);
            box-shadow: var(--shadow);
            border-color: var(--primary-color);
        }
        .social-btn.google{ color:#db4437; }
        .social-btn.facebook{ color:#4267B2; }

        .register-link{ text-align:center; margin-top:2rem; color:var(--text-light); font-size:1rem; animation:fadeInRight .8s ease-out .7s both; }
        .register-link a{ color:var(--primary-color); font-weight:600; text-decoration:none; margin-left:.25rem; transition:var(--transition); padding:.25rem .5rem; border-radius:6px; }
        .register-link a:hover{ color:var(--secondary-color); background:rgba(37,99,235,.05); }

        .error-message {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--error-color);
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--error-color);
            animation: shake 0.5s ease-in-out;
        }
        .error-message ul {
            padding-left: 1.25rem;
            margin: 0.5rem 0 0 0;
        }

        .bg-shape{
            position:fixed; border-radius:50%;
            background: linear-gradient(45deg, rgba(96,165,250,.1), rgba(147,197,253,.05));
            animation: float 20s ease-in-out infinite; z-index:-1;
            filter: blur(40px);
            opacity: 0.6;
        }
        .bg-shape-1{ top:10%; left:10%; width:300px; height:300px; animation-delay:0s; }
        .bg-shape-2{ top:60%; right:15%; width:200px; height:200px; animation-delay:-5s; }
        .bg-shape-3 { bottom: 15%; left: 20%; width: 150px; height: 150px; animation-delay: -10s; }

        /* Animations */
        @keyframes slideUp{
            from{ opacity:0; transform:translateY(30px) scale(.95) }
            to{ opacity:1; transform:translateY(0) scale(1) }
        }
        @keyframes fadeInLeft{
            from{ opacity:0; transform:translateX(-20px) }
            to{ opacity:1; transform:translateX(0) }
        }
        @keyframes fadeInRight{
            from{ opacity:0; transform:translateX(20px) }
            to{ opacity:1; transform:translateX(0) }
        }
        @keyframes float{
            0%, 100%{ transform:translateY(0) rotate(0) scale(1); }
            33%{ transform:translateY(-20px) rotate(2deg) scale(1.05); }
            66%{ transform:translateY(-10px) rotate(-2deg) scale(0.95); }
        }
        @keyframes spin{ to{ transform:rotate(360deg) } }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .login-container {
                max-width: 900px;
            }
            .login-left, .login-right {
                padding: 2.5rem;
            }
        }

        @media (max-width: 968px){
            .navbar-toggle {
                display: flex;
            }
            .navbar-auth {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                min-height: auto;
                margin-top: 6rem;
                max-width: 500px;
            }
            .login-left, .login-right {
                padding: 2.5rem 2rem;
            }
            .login-left {
                border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
            }
            .login-right {
                border-radius: 0 0 var(--border-radius-xl) var(--border-radius-xl);
            }
            .social-login {
                flex-direction: column;
            }
        }

        @media (max-width: 480px){
            .navbar-logo-text {
                font-size: 1.3rem;
            }
            .navbar-logo-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
            .login-left, .login-right {
                padding: 2rem 1.5rem;
            }
            .login-logo {
                margin-bottom: 2rem;
            }
            .login-header {
                margin-bottom: 2rem;
            }
            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
            .bg-shape {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR dengan menu seperti di gambar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-logo">
                <div class="navbar-logo-icon"><i class="fas fa-hospital"></i></div>
                <span class="navbar-logo-text">MediCare</span>
            </a>
            <div class="navbar-toggle" id="navbarToggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="navbar-auth">
                <a href="{{ route('login') }}" class="navbar-btn navbar-btn-login">
                    <i class="fas fa-sign-in-alt"></i><span>Masuk</span>
                </a>
                <a href="{{ route('register') }}" class="navbar-btn navbar-btn-register">
                    <i class="fas fa-user-plus"></i><span>Daftar</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu (Full Width - Tanpa Blur) -->
    <div class="mobile-menu" id="mobileMenu">
        <button class="mobile-menu-close" id="mobileMenuClose">
            <i class="fas fa-times"></i>
        </button>
        <a href="{{ route('login') }}" class="navbar-btn navbar-btn-login">
            <i class="fas fa-sign-in-alt"></i><span>Masuk</span>
        </a>
        <a href="{{ route('register') }}" class="navbar-btn navbar-btn-register">
            <i class="fas fa-user-plus"></i><span>Daftar</span>
        </a>
    </div>

    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>

    <div class="login-container">
        <!-- KIRI: Kartu-kartu biru (dipertahankan) -->
        <div class="login-left">
            <div class="login-left-content">
                <div class="login-logo">
                    <div class="login-logo-icon"><i class="fas fa-hospital"></i></div>
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

        <!-- KANAN: Form Login (Laravel native) -->
        <div class="login-right">
            <div class="login-header">
                <h1>Masuk ke <span class="text-gradient">Akun</span></h1>
                <p>Silakan masukkan detail login Anda untuk melanjutkan</p>
            </div>

            {{-- ⚠️ Tampilkan error validasi dari backend --}}
            @if ($errors->any())
                <div class="error-message">
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="login-form" id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-envelope"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="nama@contoh.com"
                            required
                            autocomplete="email"
                            value="{{ old('email') }}"
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
                            name="password"
                            class="form-input"
                            placeholder="Masukkan kata sandi"
                            required
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Lupa kata sandi?</a>
                    @endif
                </div>

                <button type="submit" class="login-btn" id="loginBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Masuk</span>
                </button>
            </form>

            <div class="login-divider"><span>Atau lanjutkan dengan</span></div>

            <div class="social-login">
                <button class="social-btn google" type="button">
                    <i class="fab fa-google"></i><span>Google</span>
                </button>
                <button class="social-btn facebook" type="button">
                    <i class="fab fa-facebook-f"></i><span>Facebook</span>
                </button>
            </div>

            <div class="register-link">
                Belum punya akun?
                <a href="{{ route('register') }}" id="registerLink">Daftar Sekarang</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordInput  = document.getElementById('password');
        if (passwordToggle && passwordInput) {
            passwordToggle.addEventListener('click', () => {
                const show = passwordInput.type === 'password';
                passwordInput.type = show ? 'text' : 'password';
                passwordToggle.querySelector('i').className = show ? 'fas fa-eye-slash' : 'fas fa-eye';
                passwordToggle.style.transform = 'scale(.95)';
                setTimeout(() => passwordToggle.style.transform = 'scale(1)', 120);
            });
        }

        // UX loading saat submit (tanpa preventDefault — biar POST ke Laravel)
        const form = document.getElementById('loginForm');
        const btn  = document.getElementById('loginBtn');
        if (form && btn) {
            form.addEventListener('submit', () => {
                btn.classList.add('loading');
                btn.disabled = true;

                // optional UX: simpan email jika remember dicentang
                const remember = document.getElementById('remember');
                const email    = document.getElementById('email');
                try {
                    if (remember.checked) localStorage.setItem('rememberedEmail', email.value);
                    else localStorage.removeItem('rememberedEmail');
                } catch(e){}
            });
        }

        // Prefill email dari localStorage jika ada
        (function() {
            try {
                const remembered = localStorage.getItem('rememberedEmail');
                if (remembered) {
                    document.getElementById('email').value = remembered;
                    const remember = document.getElementById('remember');
                    if (remember) remember.checked = true;
                }
            } catch(e){}
        })();

        // Mobile menu toggle (full width tanpa blur)
        const navbarToggle = document.getElementById('navbarToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuClose = document.getElementById('mobileMenuClose');

        // Fungsi untuk menutup menu mobile
        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            navbarToggle.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Fungsi untuk membuka menu mobile
        function openMobileMenu() {
            mobileMenu.classList.add('active');
            navbarToggle.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        if (navbarToggle && mobileMenu && mobileMenuClose) {
            // Buka menu
            navbarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                if (mobileMenu.classList.contains('active')) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });

            // Tutup menu dengan tombol close
            mobileMenuClose.addEventListener('click', () => {
                closeMobileMenu();
            });

            // Tutup menu saat mengklik di luar
            document.addEventListener('click', (e) => {
                if (mobileMenu.classList.contains('active') &&
                    !mobileMenu.contains(e.target) &&
                    !navbarToggle.contains(e.target)) {
                    closeMobileMenu();
                }
            });

            // Tutup menu dengan tombol ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                    closeMobileMenu();
                }
            });
        }
    </script>
</body>
</html>
