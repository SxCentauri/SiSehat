<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Daftar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        :root{
            --primary-color:#2563eb;--secondary-color:#1e40af;--accent-color:#60a5fa;
            --light-blue:#dbeafe;--extra-light-blue:#eff6ff;
            --text-color:#1f2937;--text-light:#6b7280;--text-lighter:#9ca3af;
            --white:#ffffff;--gray-50:#f9fafb;--gray-100:#f3f4f6;--gray-200:#e5e7eb;
            --success-color:#10b981;--error-color:#ef4444;
            --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
            --gradient-light:linear-gradient(135deg,var(--light-blue),var(--extra-light-blue));
            --gradient-vibrant:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
            --shadow-sm:0 1px 2px 0 rgba(0,0,0,.05);
            --shadow:0 10px 25px -3px rgba(0,0,0,.1),0 4px 6px -2px rgba(0,0,0,.05);
            --shadow-lg:0 25px 50px -12px rgba(0,0,0,.25);
            --shadow-blue:0 20px 50px rgba(37,99,235,.1);
            --shadow-hover:0 30px 70px rgba(37,99,235,.15);
            --border-radius:16px;--border-radius-lg:20px;
            --transition:all .3s cubic-bezier(.4,0,.2,1)
        }
        body{
            font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;
            background:linear-gradient(135deg,#f0f9ff 0%,#e0f2fe 50%,#f0f9ff 100%);
            min-height:100vh;display:flex;align-items:center;justify-content:center;
            padding:1rem;position:relative;overflow-x:hidden;font-feature-settings:'cv11','ss01'
        }
        body::before{content:'';position:fixed;top:-50%;right:-20%;width:80%;height:200%;
            background:radial-gradient(ellipse,rgba(96,165,250,.08) 0%,transparent 70%);transform:rotate(-15deg);z-index:-2}
        body::after{content:'';position:fixed;bottom:-30%;left:-10%;width:60%;height:120%;
            background:radial-gradient(ellipse,rgba(37,99,235,.06) 0%,transparent 70%);transform:rotate(10deg);z-index:-2}

        /* Navbar */
        .navbar{position:fixed;top:0;left:0;width:100%;background:rgba(255,255,255,.95);
            backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);
            box-shadow:0 5px 20px rgba(37,99,235,.1);padding:1rem 0;z-index:1000;transition:all .3s ease}
        .navbar-container{max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center}
        .navbar-logo{display:flex;align-items:center;gap:1rem;text-decoration:none}
        .navbar-logo-icon{width:45px;height:45px;background:var(--gradient);border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.3rem;box-shadow:0 10px 25px rgba(37,99,235,.2)}
        .navbar-logo-text{font-size:1.5rem;font-weight:800;background:linear-gradient(135deg,var(--text-color) 0%,var(--primary-color) 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .navbar-auth{display:flex;gap:1rem;align-items:center}
        .navbar-btn{padding:.8rem 1.5rem;font-size:.9rem;font-weight:600;border-radius:10px;text-decoration:none;transition:all .3s ease;display:inline-flex;align-items:center;gap:.5rem}
        .navbar-btn-login{color:var(--primary-color);border:2px solid var(--primary-color);background:transparent}
        .navbar-btn-login:hover{background:var(--primary-color);color:#fff;transform:translateY(-2px);box-shadow:0 10px 25px rgba(37,99,235,.2)}
        .navbar-btn-register{background:var(--gradient);color:#fff;box-shadow:0 10px 25px rgba(37,99,235,.2)}
        .navbar-btn-register:hover{transform:translateY(-2px);box-shadow:0 15px 35px rgba(37,99,235,.3)}

        .bg-shape{position:fixed;border-radius:50%;background:linear-gradient(45deg,rgba(96,165,250,.05),rgba(147,197,253,.03));animation:float 20s ease-in-out infinite;z-index:-1}
        .bg-shape-1{top:10%;left:10%;width:300px;height:300px;animation-delay:0s}
        .bg-shape-2{top:60%;right:15%;width:200px;height:200px;animation-delay:-5s}

        /* Card biru & layout */
        .register-container{display:flex;width:100%;max-width:1200px;min-height:700px;background:#fff;border-radius:var(--border-radius-lg);overflow:hidden;box-shadow:var(--shadow-lg);animation:slideUp .8s cubic-bezier(.4,0,.2,1);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.2);margin-top:7rem}
        .register-left{flex:1;background:var(--gradient);color:#fff;padding:3.5rem;display:flex;flex-direction:column;justify-content:center;position:relative;overflow:hidden}
        .register-left::before{content:'';position:absolute;inset:0;background-image:
            radial-gradient(circle at 20% 20%,rgba(255,255,255,.1) 0%,transparent 50%),
            radial-gradient(circle at 80% 80%,rgba(255,255,255,.1) 0%,transparent 50%),
            radial-gradient(circle at 40% 60%,rgba(255,255,255,.05) 0%,transparent 50%);z-index:1}
        .register-left-content{position:relative;z-index:2}
        .register-logo{display:flex;align-items:center;gap:1rem;margin-bottom:3rem;animation:fadeInLeft .8s ease-out .2s both}
        .register-logo-icon{width:60px;height:60px;background:rgba(255,255,255,.15);border-radius:var(--border-radius);display:flex;align-items:center;justify-content:center;font-size:1.8rem;color:#fff;backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.2);transition:var(--transition)}
        .register-logo-text{font-size:2rem;font-weight:800;letter-spacing:-.025em}
        .register-left h2{font-size:clamp(2rem,4vw,2.75rem);font-weight:800;margin-bottom:1.5rem;line-height:1.1;letter-spacing:-.025em;animation:fadeInLeft .8s ease-out .4s both}
        .register-left p{font-size:1.125rem;line-height:1.7;margin-bottom:2.5rem;opacity:.9;font-weight:400;animation:fadeInLeft .8s ease-out .6s both}
        .register-features{display:flex;flex-direction:column;gap:1.25rem;margin-top:2rem}
        .register-feature{display:flex;align-items:center;gap:1rem;font-size:1rem;animation:fadeInLeft .6s ease-out both;transition:var(--transition)}
        .register-feature:nth-child(1){animation-delay:.8s}.register-feature:nth-child(2){animation-delay:1s}.register-feature:nth-child(3){animation-delay:1.2s}.register-feature:nth-child(4){animation-delay:1.4s}
        .register-feature i{width:32px;height:32px;background:rgba(255,255,255,.15);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1rem;backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.1);transition:var(--transition)}

        .register-right{flex:1.2;padding:3.5rem;display:flex;flex-direction:column;justify-content:center;background:#fff;overflow-y:auto}
        .register-header{text-align:center;margin-bottom:2.5rem;animation:fadeInRight .8s ease-out .3s both}
        .register-header h1{font-size:clamp(1.875rem,4vw,2.25rem);font-weight:800;color:var(--text-color);margin-bottom:.5rem;letter-spacing:-.025em}
        .register-header p{color:var(--text-light);font-size:1.125rem;font-weight:400}
        .text-gradient{background:var(--gradient);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}

        .register-form{width:100%;animation:fadeInRight .8s ease-out .5s both}
        .form-row{display:flex;gap:1.5rem;margin-bottom:1.875rem}
        .form-group{flex:1;position:relative}
        .form-label{display:block;font-weight:600;margin-bottom:.625rem;color:var(--text-color);font-size:.9375rem;letter-spacing:-.0125em}
        .input-with-icon{position:relative}
        .input-icon{position:absolute;left:1rem;top:50%;transform:translateY(-50%);color:var(--text-lighter);font-size:1.125rem;transition:var(--transition);z-index:2}
        .form-input{width:100%;padding:1rem 3.25rem 1rem 3rem;border:2px solid var(--gray-200);border-radius:14px;font-size:1rem;transition:var(--transition);background:#fff;color:var(--text-color);font-weight:400;position:relative}
        .form-input:focus{outline:none;border-color:var(--primary-color);box-shadow:0 0 0 4px rgba(37,99,235,.1)}
        .form-input:focus+.input-icon,.form-input:not(:placeholder-shown)+.input-icon{color:var(--primary-color)}
        .password-toggle{position:absolute;right:1rem;top:50%;transform:translateY(-50%)!important;color:var(--text-lighter);cursor:pointer;font-size:1.125rem;transition:var(--transition);z-index:2;padding:.25rem;border-radius:6px}
        .form-options{display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem;font-size:.9375rem;gap:1rem}
        .terms-agreement{display:flex;align-items:flex-start;gap:.625rem;cursor:pointer;transition:var(--transition)}
        .terms-agreement input{margin-top:.25rem;width:18px;height:18px;accent-color:var(--primary-color);cursor:pointer}
        .terms-agreement a{color:var(--primary-color);text-decoration:none;font-weight:600}
        .register-btn{width:100%;padding:1rem 1.5rem;background:var(--gradient);color:#fff;border:none;border-radius:14px;font-size:1.0625rem;font-weight:600;cursor:pointer;transition:var(--transition);box-shadow:0 10px 25px rgba(37,99,235,.2);display:flex;align-items:center;justify-content:center;gap:.625rem;position:relative;overflow:hidden}
        .register-btn::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,.2),transparent);transition:left .5s ease}
        .register-btn:hover::before{left:100%}
        .register-divider{display:flex;align-items:center;margin:2rem 0;color:var(--text-lighter)}
        .register-divider::before,.register-divider::after{content:'';flex:1;height:1px;background:linear-gradient(to right,transparent,var(--gray-200),transparent)}
        .register-divider span{padding:0 1.25rem;font-size:.875rem;font-weight:500;background:#fff}
        .social-register{display:flex;gap:1rem;margin-bottom:2rem}
        .social-btn{flex:1;padding:.875rem 1rem;border:2px solid var(--gray-200);border-radius:12px;background:#fff;display:flex;align-items:center;justify-content:center;gap:.625rem;font-weight:600;cursor:pointer;transition:var(--transition);position:relative;overflow:hidden}
        .social-btn.google{color:#db4437}.social-btn.facebook{color:#4267B2}
        .login-link{text-align:center;margin-top:2rem;color:var(--text-light);font-size:1rem;animation:fadeInRight .8s ease-out .7s both}

        .error-message{color:var(--error-color);font-size:.875rem;margin-top:.5rem;font-weight:500}
        .alert{padding:.75rem 1rem;border-radius:12px;margin-bottom:1rem;font-weight:600}
        .alert-danger{background:#fee2e2;color:#991b1b;border:1px solid #fecaca}
        .alert-success{background:#dcfce7;color:#065f46;border:1px solid #86efac}

        @keyframes slideUp{from{opacity:0;transform:translateY(30px) scale(.95)}to{opacity:1;transform:translateY(0) scale(1)}}
        @keyframes fadeInLeft{from{opacity:0;transform:translateX(-20px)}to{opacity:1;transform:translateX(0)}}
        @keyframes fadeInRight{from{opacity:0;transform:translateX(20px)}to{opacity:1;transform:translateX(0)}}
        @keyframes float{0%,100%{transform:translateY(0) rotate(0)}33%{transform:translateY(-15px) rotate(1deg)}66%{transform:translateY(-5px) rotate(-1deg)}}
        .loading{position:relative}
        .loading::after{content:'';position:absolute;top:50%;left:50%;width:20px;height:20px;margin:-10px 0 0 -10px;border:2px solid transparent;border-top:2px solid currentColor;border-radius:50%;animation:spin 1s linear infinite}
        @keyframes spin{to{transform:rotate(360deg)}}

        @media (max-width:1024px){.register-container{max-width:1000px;min-height:650px}.register-left,.register-right{padding:3rem}}
        @media (max-width:900px){
            body{padding:.75rem}.register-container{flex-direction:column;max-width:550px;min-height:auto}
            .register-left{padding:2.5rem;text-align:center;min-height:350px}
            .register-right{padding:2.5rem}.register-left h2{font-size:2rem}.register-logo{justify-content:center;margin-bottom:2rem}
            .register-features{align-items:center;gap:1rem}
        }
        @media (max-width:768px){.form-row{flex-direction:column;gap:1rem}}
        @media (max-width:640px){
            body{padding:.5rem}.register-container{border-radius:var(--border-radius)}
            .register-left,.register-right{padding:2rem}.register-left h2{font-size:1.75rem;margin-bottom:1rem}
            .register-left p{font-size:1rem;margin-bottom:2rem}.register-header h1{font-size:1.75rem}.register-header{margin-bottom:2rem}
            .social-register{flex-direction:column}.form-options{flex-direction:column;align-items:stretch;gap:1rem}
        }
        @media (max-width:480px){
            .register-left,.register-right{padding:1.5rem}
            .form-input{padding:.875rem 3rem .875rem 2.75rem}.password-toggle{right:.875rem}
            .register-features{gap:.875rem}.register-feature{font-size:.9375rem}
        }
    </style>
</head>
<body>
    {{-- Navbar (biarkan tombol login/daftar tampil di halaman register) --}}
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-logo">
                <div class="navbar-logo-icon"><i class="fas fa-hospital"></i></div>
                <span class="navbar-logo-text">MediCare</span>
            </a>
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

    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>

    <div class="register-container">
        <div class="register-left">
            <div class="register-left-content">
                <div class="register-logo">
                    <div class="register-logo-icon"><i class="fas fa-hospital"></i></div>
                    <div class="register-logo-text">MediCare</div>
                </div>
                <h2>Bergabunglah Dengan Kami</h2>
                <p>Daftarkan diri Anda untuk mendapatkan akses ke layanan kesehatan digital terdepan dan mulai perjalanan kesehatan Anda dengan dukungan penuh dari para profesional.</p>

                <div class="register-features">
                    <div class="register-feature"><i class="fas fa-calendar-plus"></i><span>Booking janji temu online</span></div>
                    <div class="register-feature"><i class="fas fa-prescription"></i><span>Resep digital dan pengingat obat</span></div>
                    <div class="register-feature"><i class="fas fa-chart-line"></i><span>Pantau perkembangan kesehatan</span></div>
                    <div class="register-feature"><i class="fas fa-comments"></i><span>Konsultasi dokter 24/7</span></div>
                </div>
            </div>
        </div>

        <div class="register-right">
            <div class="register-header">
                <h1>Buat <span class="text-gradient">Akun</span></h1>
                <p>Isi informasi berikut untuk membuat akun baru</p>
            </div>

            {{-- Alert error/sukses dari backend (Breeze) --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin:0;padding-left:1rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            {{-- ✅ FORM Laravel: POST ke route('register') --}}
            <form class="register-form" id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf

                {{-- hidden "name" untuk backend, diisi gabungan Nama Depan + Belakang saat submit --}}
                <input type="hidden" name="name" id="fullName" value="{{ old('name') }}">

                <div class="form-row">
                    <div class="form-group">
                        <label for="firstName" class="form-label">Nama Depan</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-user"></i>
                            <input type="text" id="firstName" class="form-input" placeholder="Nama depan" autocomplete="given-name" value="{{ old('firstName') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lastName" class="form-label">Nama Belakang</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-user"></i>
                            <input type="text" id="lastName" class="form-input" placeholder="Nama belakang" autocomplete="family-name" value="{{ old('lastName') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-envelope"></i>
                        <input type="email" id="email" name="email" class="form-input" placeholder="nama@contoh.com" required autocomplete="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-lock"></i>
                            <input type="password" id="password" name="password" class="form-input" placeholder="Buat kata sandi" required autocomplete="new-password" minlength="8">
                            <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirmPassword" class="form-label">Konfirmasi Kata Sandi</label>
                        <div class="input-with-icon">
                            <i class="input-icon fas fa-lock"></i>
                            <input type="password" id="confirmPassword" name="password_confirmation" class="form-input" placeholder="Konfirmasi kata sandi" required autocomplete="new-password" minlength="8">
                            <button type="button" class="password-toggle" id="confirmPasswordToggle" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="form-label">Nomor Telepon</label>
                    <div class="input-with-icon">
                        <i class="input-icon fas fa-phone"></i>
                        <input type="tel" id="phone" class="form-input" placeholder="+62 812-3456-7890" autocomplete="tel" value="{{ old('phone') }}">
                    </div>
                </div>

                <div class="form-options">
                    <label class="terms-agreement">
                        <input type="checkbox" id="terms" required>
                        <span>Saya menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a></span>
                    </label>
                </div>

                <button type="submit" class="register-btn" id="registerBtn">
                    <i class="fas fa-user-plus"></i><span>Daftar Sekarang</span>
                </button>
            </form>

            <div class="register-divider"><span>Atau daftar dengan</span></div>

            <div class="social-register">
                <button class="social-btn google" type="button"><i class="fab fa-google"></i><span>Google</span></button>
                <button class="social-btn facebook" type="button"><i class="fab fa-facebook-f"></i><span>Facebook</span></button>
            </div>

            <div class="login-link">
                Sudah punya akun?
                <a href="{{ route('login') }}" id="loginLink">Masuk Sekarang</a>
            </div>
        </div>
    </div>

<script>
(function () {
  const form   = document.getElementById('registerForm');
  const first  = document.getElementById('firstName');
  const last   = document.getElementById('lastName');
  const full   = document.getElementById('fullName');
  const terms  = document.getElementById('terms');
  const btn    = document.getElementById('registerBtn');

  // Toggle eyes (tanpa mengubah desain/card)
  const togglePw = (inputId, toggleId) => {
    const input = document.getElementById(inputId);
    const tgl   = document.getElementById(toggleId);
    if (!input || !tgl) return;
    tgl.addEventListener('click', () => {
      input.type = input.type === 'password' ? 'text' : 'password';
      const icon = tgl.querySelector('i');
      icon.classList.toggle('fa-eye');
      icon.classList.toggle('fa-eye-slash');
    });
  };
  togglePw('password','passwordToggle');
  togglePw('confirmPassword','confirmPasswordToggle');

  // ⛳ Submit ke Laravel (tanpa preventDefault)
  form.addEventListener('submit', (e) => {
    // validasi ringan untuk terms
    if (!terms.checked) {
      e.preventDefault();
      alert('Harap setujui Syarat & Ketentuan terlebih dahulu.');
      return;
    }
    // gabungkan nama depan + belakang ke field "name" (dipakai backend)
    const f = (first?.value || '').trim();
    const l = (last?.value  || '').trim();
    full.value = (f + ' ' + l).trim() || 'Pengguna';

    // UX kecil: tombol loading (tidak mencegah submit)
    btn.classList.add('loading');
    btn.disabled = true;
  });
})();
</script>
</body>
</html>
