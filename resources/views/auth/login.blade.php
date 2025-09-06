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
            --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
            --gradient-light:linear-gradient(135deg,var(--light-blue),var(--extra-light-blue));
            --gradient-vibrant:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
            --shadow-sm:0 1px 2px 0 rgba(0,0,0,.05);
            --shadow:0 10px 25px -3px rgba(0,0,0,.1),0 4px 6px -2px rgba(0,0,0,.05);
            --shadow-lg:0 25px 50px -12px rgba(0,0,0,.25);
            --shadow-blue:0 20px 50px rgba(37,99,235,.1);
            --shadow-hover:0 30px 70px rgba(37,99,235,.15);
            --border-radius:16px; --border-radius-lg:20px;
            --transition:all .3s cubic-bezier(.4,0,.2,1);
        }

        body{
            font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;
            background:linear-gradient(135deg,#f0f9ff 0%,#e0f2fe 50%,#f0f9ff 100%);
            min-height:100vh; display:flex; align-items:center; justify-content:center;
            padding:1rem; position:relative; overflow-x:hidden;
            font-feature-settings:'cv11','ss01'; font-optical-sizing:auto;
        }
        body::before{
            content:''; position:fixed; top:-50%; right:-20%; width:80%; height:200%;
            background:radial-gradient(ellipse,rgba(96,165,250,.08) 0%,transparent 70%);
            transform:rotate(-15deg); z-index:-2;
        }
        body::after{
            content:''; position:fixed; bottom:-30%; left:-10%; width:60%; height:120%;
            background:radial-gradient(ellipse,rgba(37,99,235,.06) 0%,transparent 70%);
            transform:rotate(10deg); z-index:-2;
        }

        /* ====== CARD WRAPPER ====== */
        .login-container{
            display:flex; width:100%; max-width:1100px; min-height:650px;
            background:var(--white); border-radius:var(--border-radius-lg);
            overflow:hidden; box-shadow:var(--shadow-lg);
            animation:slideUp .8s cubic-bezier(.4,0,.2,1);
            backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,.2);
            margin-top:7rem;
        }
        .login-left{
            flex:1.1; background:var(--gradient); color:#fff; padding:3.5rem;
            display:flex; flex-direction:column; justify-content:center; position:relative; overflow:hidden;
        }
        .login-left::before{
            content:''; position:absolute; inset:0;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(255,255,255,.05) 0%, transparent 50%);
            z-index:1;
        }
        .login-left-content{ position:relative; z-index:2; }
        .login-logo{ display:flex; align-items:center; gap:1rem; margin-bottom:3rem; animation:fadeInLeft .8s ease-out .2s both; }
        .login-logo-icon{
            width:60px; height:60px; background:rgba(255,255,255,.15); border-radius:var(--border-radius);
            display:flex; align-items:center; justify-content:center; font-size:1.8rem; color:#fff;
            backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,.2); transition:var(--transition);
        }
        .login-logo-text{ font-size:2rem; font-weight:800; letter-spacing:-.025em; }
        .login-left h2{ font-size:clamp(2rem,4vw,2.75rem); font-weight:800; margin-bottom:1.5rem; line-height:1.1; letter-spacing:-.025em; animation:fadeInLeft .8s ease-out .4s both; }
        .login-left p{ font-size:1.125rem; line-height:1.7; margin-bottom:2.5rem; opacity:.9; font-weight:400; animation:fadeInLeft .8s ease-out .6s both; }

        /* ==== BLUE CARDS (dipertahankan seperti awal) ==== */
        .login-features{ display:flex; flex-direction:column; gap:1.25rem; margin-top:2rem; }
        .login-feature{ display:flex; align-items:center; gap:1rem; font-size:1rem; animation:fadeInLeft .6s ease-out both; transition:var(--transition); }
        .login-feature:nth-child(1){ animation-delay:.8s } .login-feature:nth-child(2){ animation-delay:1s }
        .login-feature:nth-child(3){ animation-delay:1.2s } .login-feature:nth-child(4){ animation-delay:1.4s }
        .login-feature i{
            width:32px; height:32px; background:rgba(255,255,255,.15); border-radius:10px;
            display:flex; align-items:center; justify-content:center; font-size:1rem;
            backdrop-filter:blur(10px); border:1px solid rgba(255,255,255,.1); transition:var(--transition);
        }
        .login-feature:hover{ transform:translateX(5px); }
        .login-feature:hover i{ background:rgba(255,255,255,.2); transform:scale(1.1); }

        .login-right{ flex:1; padding:3.5rem; display:flex; flex-direction:column; justify-content:center; background:#fff; }
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
        }
        .form-input:focus{ outline:none; border-color:var(--primary-color); box-shadow:0 0 0 4px rgba(37,99,235,.1); transform:translateY(-1px); }
        .form-input:focus + .input-icon, .form-input:not(:placeholder-shown) + .input-icon{ color:var(--primary-color); }
        .password-toggle{
            position:absolute; right:1rem; top:50%; transform:translateY(-50%) !important;
            color:var(--text-lighter); cursor:pointer; font-size:1.125rem; transition:var(--transition); z-index:2; padding:.25rem; border-radius:6px;
            background:transparent; border:0;
        }
        .password-toggle:hover{ color:var(--primary-color); background:rgba(37,99,235,.05); }

        .form-options{ display:flex; justify-content:space-between; align-items:center; margin-bottom:2rem; font-size:.9375rem; gap:1rem; }
        .remember-me{ display:flex; align-items:center; gap:.625rem; cursor:pointer; transition:var(--transition); }
        .remember-me input{ width:18px; height:18px; accent-color:var(--primary-color); cursor:pointer; }
        .remember-me:hover{ color:var(--primary-color); background:rgba(37,99,235,.05); }
        .forgot-password{ color:var(--primary-color); text-decoration:none; font-weight:600; transition:var(--transition); padding:.25rem .5rem; border-radius:6px; }
        .forgot-password:hover{ color:var(--secondary-color); background:rgba(37,99,235,.05); }

        .login-btn{
            width:100%; padding:1rem 1.5rem; background:var(--gradient); color:#fff; border:none; border-radius:14px;
            font-size:1.0625rem; font-weight:600; cursor:pointer; transition:var(--transition);
            box-shadow:0 10px 25px rgba(37,99,235,.2); display:flex; align-items:center; justify-content:center; gap:.625rem;
            position:relative; overflow:hidden;
        }
        .login-btn::before{ content:''; position:absolute; inset:0; left:-100%; background:linear-gradient(90deg,transparent,rgba(255,255,255,.2),transparent); transition:left .5s ease; }
        .login-btn:hover::before{ left:100%; }
        .login-btn:hover{ transform:translateY(-2px); box-shadow:0 20px 40px rgba(37,99,235,.3); }
        .login-btn.loading{ pointer-events:none; }
        .login-btn.loading::after{
            content:''; width:18px; height:18px; border:2px solid transparent; border-top:2px solid #fff; border-radius:50%; margin-left:8px; animation:spin 1s linear infinite;
        }

        .login-divider{ display:flex; align-items:center; margin:2rem 0; color:var(--text-lighter); }
        .login-divider::before, .login-divider::after{ content:''; flex:1; height:1px; background:linear-gradient(to right,transparent,var(--gray-200),transparent); }
        .login-divider span{ padding:0 1.25rem; font-size:.875rem; font-weight:500; background:#fff; }

        .social-login{ display:flex; gap:1rem; margin-bottom:2rem; }
        .social-btn{
            flex:1; padding:.875rem 1rem; border:2px solid var(--gray-200); border-radius:12px; background:#fff;
            display:flex; align-items:center; justify-content:center; gap:.625rem; font-weight:600; cursor:pointer; transition:var(--transition); position:relative; overflow:hidden;
        }
        .social-btn:hover{ transform:translateY(-2px); box-shadow:var(--shadow); border-color:#e5e7eb; }
        .social-btn.google{ color:#db4437; } .social-btn.facebook{ color:#4267B2; }

        .register-link{ text-align:center; margin-top:2rem; color:var(--text-light); font-size:1rem; animation:fadeInRight .8s ease-out .7s both; }
        .register-link a{ color:var(--primary-color); font-weight:600; text-decoration:none; margin-left:.25rem; transition:var(--transition); padding:.25rem .5rem; border-radius:6px; }
        .register-link a:hover{ color:var(--secondary-color); background:rgba(37,99,235,.05); }

        .bg-shape{ position:fixed; border-radius:50%; background:linear-gradient(45deg,rgba(96,165,250,.05),rgba(147,197,253,.03)); animation:float 20s ease-in-out infinite; z-index:-1; }
        .bg-shape-1{ top:10%; left:10%; width:300px; height:300px; animation-delay:0s; }
        .bg-shape-2{ top:60%; right:15%; width:200px; height:200px; animation-delay:-5s; }

        /* Animations */
        @keyframes slideUp{ from{opacity:0; transform:translateY(30px) scale(.95)} to{opacity:1; transform:translateY(0) scale(1)} }
        @keyframes fadeInLeft{ from{opacity:0; transform:translateX(-20px)} to{opacity:1; transform:translateX(0)} }
        @keyframes fadeInRight{ from{opacity:0; transform:translateX(20px)} to{opacity:1; transform:translateX(0)} }
        @keyframes float{ 0%,100%{ transform:translateY(0) rotate(0)} 33%{ transform:translateY(-15px) rotate(1deg)} 66%{ transform:translateY(-5px) rotate(-1deg)} }
        @keyframes spin{ to{ transform:rotate(360deg) } }

        /* Responsive */
        @media (max-width:1024px){
            .login-container{ max-width:900px; min-height:600px }
            .login-left,.login-right{ padding:3rem }
        }
        @media (max-width:900px){
            body{ padding:.75rem }
            .login-container{ flex-direction:column; max-width:500px; min-height:auto }
            .login-left{ padding:2.5rem; text-align:center; min-height:400px }
            .login-right{ padding:2.5rem }
            .login-logo{ justify-content:center; margin-bottom:2rem }
            .login-features{ align-items:center; gap:1rem }
        }
        @media (max-width:640px){
            body{ padding:.5rem }
            .login-container{ border-radius:var(--border-radius) }
            .login-left,.login-right{ padding:2rem }
            .login-left h2{ font-size:1.75rem; margin-bottom:1rem }
            .login-left p{ font-size:1rem; margin-bottom:2rem }
            .login-header h1{ font-size:1.75rem }
            .login-header{ margin-bottom:2rem }
            .social-login{ flex-direction:column }
            .form-options{ flex-direction:column; align-items:stretch; gap:1rem }
            .bg-shape{ display:none }
        }
        @media (max-width:480px){
            .login-left,.login-right{ padding:1.5rem }
            .form-input{ padding:.875rem 3rem .875rem 2.75rem }
            .input-icon{ left:.875rem }
            .password-toggle{ right:.875rem }
            .login-features{ gap:.875rem }
            .login-feature{ font-size:.9375rem }
        }
    </style>
</head>
<body>

    {{-- ✅ Navbar pakai komponen agar tombol Masuk/Daftar otomatis jadi menu user saat sudah login --}}
    @include('components.navbar')

    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>

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
                <div style="color:#ef4444; margin:-10px 0 18px 0;">
                    <ul style="padding-left:18px;">
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
        passwordToggle.addEventListener('click', () => {
            const show = passwordInput.type === 'password';
            passwordInput.type = show ? 'text' : 'password';
            passwordToggle.querySelector('i').className = show ? 'fas fa-eye-slash' : 'fas fa-eye';
            passwordToggle.style.transform = 'scale(.95)';
            setTimeout(()=> passwordToggle.style.transform = 'scale(1)', 120);
        });

        // UX loading saat submit (tanpa preventDefault — biar POST ke Laravel)
        const form = document.getElementById('loginForm');
        const btn  = document.getElementById('loginBtn');
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
    </script>
</body>
</html>
