<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','MediCare Hospital')</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    :root{
      --primary-color:#2563eb; --secondary-color:#1e40af; --accent-color:#60a5fa;
      --light-blue:#dbeafe; --extra-light-blue:#eff6ff; --text-color:#1f2937; --text-light:#6b7280; --white:#ffffff;
      --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
      --gradient-light:linear-gradient(135deg,var(--light-blue),var(--extra-light-blue));
      --shadow:0 20px 50px rgba(37,99,235,.1); --shadow-hover:0 30px 70px rgba(37,99,235,.15);
    }

    /* NAVBAR (dari kode pertama) */
    .navbar{position:fixed;top:0;left:0;width:100%;background:rgba(255,255,255,.95);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);
            box-shadow:0 5px 20px rgba(37,99,235,.1);padding:15px 0;z-index:1000;transition:all .3s ease}
    .navbar.scrolled{padding:.8rem 0;background:rgba(255,255,255,.98);box-shadow:0 10px 30px rgba(37,99,235,.15)}
    .navbar-container{max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center}
    .navbar-logo{display:flex;align-items:center;gap:1rem;text-decoration:none}
    .navbar-logo-icon{width:45px;height:45px;background:var(--gradient);border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.3rem;box-shadow:0 10px 25px rgba(37,99,235,.2)}
    .navbar-logo-text{font-size:1.5rem;font-weight:800;background:linear-gradient(135deg,var(--text-color) 0%,var(--primary-color) 100%);
                      -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
    .navbar-menu{display:flex;align-items:center;gap:2.5rem}
    .navbar-links{display:flex;gap:2rem;list-style:none}
    .navbar-link{text-decoration:none;color:var(--text-color);font-weight:600;font-size:1rem;transition:all .3s ease;position:relative;padding:.5rem 0}
    .navbar-link::after{content:'';position:absolute;bottom:0;left:0;width:0;height:3px;background:var(--gradient);border-radius:3px;transition:width .3s ease}
    .navbar-link:hover::after,.navbar-link.active::after{width:100%}
    .navbar-link:hover{color:var(--primary-color)}

    .navbar-auth{display:flex;gap:1rem;align-items:center}
    .navbar-btn{padding:.8rem 1.5rem;font-size:.9rem;font-weight:600;border-radius:10px;text-decoration:none;transition:all .3s ease;display:inline-flex;align-items:center;gap:.5rem}
    .navbar-btn-login{color:var(--primary-color);border:2px solid var(--primary-color);background:transparent}
    .navbar-btn-login:hover{background:var(--primary-color);color:#fff;transform:translateY(-2px);box-shadow:0 10px 25px rgba(37,99,235,.2)}
    .navbar-btn-register{background:var(--gradient);color:#fff;box-shadow:0 10px 25px rgba(37,99,235,.2)}
    .navbar-btn-register:hover{transform:translateY(-2px);box-shadow:0 15px 35px rgba(37,99,235,.3)}

    .navbar-toggle{display:none;flex-direction:column;justify-content:space-between;width:30px;height:21px;cursor:pointer}
    .navbar-toggle span{height:3px;width:100%;background:var(--primary-color);border-radius:3px;transition:all .3s ease}
    .navbar-toggle.active span:nth-child(1){transform:translateY(9px) rotate(45deg)}
    .navbar-toggle.active span:nth-child(2){opacity:0}
    .navbar-toggle.active span:nth-child(3){transform:translateY(-9px) rotate(-45deg)}

    /* USER MENU (saat login) */
    .user-menu{position:relative}
    .user-btn{display:flex;align-items:center;gap:.6rem;background:#fff;border:1px solid #e5e7eb;border-radius:12px;padding:.45rem .7rem;cursor:pointer}
    .user-avatar{width:28px;height:28px;border-radius:999px;object-fit:cover;background:#e5e7eb}
    .user-name{font-weight:700;font-size:.92rem;color:var(--text-color)}
    .user-role{font-size:.75rem;color:var(--text-light);font-weight:600;padding:.1rem .5rem;border-radius:999px;background:var(--extra-light-blue)}
    .user-caret{color:#64748b;font-size:.85rem}

    .dropdown{position:absolute;right:0;top:calc(100% + .6rem);width:220px;background:#fff;border:1px solid #e5e7eb;border-radius:14px;
              box-shadow:0 20px 50px rgba(2,6,23,.10);padding:.5rem;display:none; }
    .dropdown.show{display:block}
    .dd-head{display:flex;align-items:center;gap:.6rem;padding:.5rem .6rem;border-bottom:1px solid #f1f5f9;margin-bottom:.25rem}
    .dd-head .user-avatar{width:34px;height:34px}
    .dd-item{display:flex;align-items:center;gap:.6rem;padding:.6rem .6rem;border-radius:10px;color:var(--text-color);text-decoration:none;font-weight:600}
    .dd-item:hover{background:#f8fafc}
    .dd-item i{color:var(--primary-color)}

    /* MOBILE */
    @media (max-width:968px){
      .navbar-toggle{display:flex}
      .navbar-menu{position:fixed;top:72px;left:-100%;width:100%;height:calc(100vh - 72px);background:#fff;flex-direction:column;align-items:center;
                   justify-content:flex-start;padding:3rem 2rem;gap:2.5rem;transition:left .4s ease;box-shadow:0 10px 30px rgba(0,0,0,.1);overflow-y:auto}
      .navbar-menu.active{left:0}
      .navbar-links{flex-direction:column;align-items:center;gap:2rem;width:100%}
      .navbar-link{font-size:1.2rem;padding:.8rem 0}
      .navbar-auth{flex-direction:column;width:100%;max-width:300px}
      .navbar-btn{width:100%;justify-content:center;padding:1rem 2rem;font-size:1.1rem}
      .dropdown{position:static;width:100%;box-shadow:none;border:1px dashed #e5e7eb}
    }
    @media (max-width:480px){
      .navbar-logo-text{font-size:1.3rem}
      .navbar-logo-icon{width:40px;height:40px;font-size:1.1rem}
    }

    /* STYLE UTAMA (dari kode kedua) */
    body{line-height:1.6;color:var(--text-color);background:var(--white);padding-top:80px}
    a{text-decoration:none;color:inherit}

    /* Container & main content */
    .container{max-width:1200px;margin:0 auto;padding:24px 20px}
    
    /* Kartu & tabel yang dipakai halaman dokter */
    .card{background:#fff;border-radius:18px;box-shadow:var(--shadow);padding:18px;margin-bottom:20px}
    .grid{display:grid;gap:18px}
    .grid-2{grid-template-columns:repeat(2,minmax(0,1fr))}
    .grid-3{grid-template-columns:repeat(3,minmax(0,1fr))}
    @media (max-width:900px){.grid-2,.grid-3{grid-template-columns:1fr}}
    .section-title{display:flex;align-items:center;gap:10px;margin-bottom:10px;font-size:1.25rem;font-weight:700}
    .section-title i{color:var(--primary-color)}
    .table{width:100%;border-collapse:separate;border-spacing:0 10px}
    .table th{text-align:left;font-size:12px;color:#475569;padding:6px 10px}
    .table td{background:#fff;padding:12px 10px;border-top:1px solid #e5e7eb;border-bottom:1px solid #e5e7eb}
    .table tr td:first-child{border-left:1px solid #e5e7eb;border-top-left-radius:12px;border-bottom-left-radius:12px}
    .table tr td:last-child{border-right:1px solid #e5e7eb;border-top-right-radius:12px;border-bottom-right-radius:12px}

    input[type="text"],input[type="time"],input[type="date"],input[type="email"],input[type="password"],
    input[type="file"],select,textarea{width:100%;background:#fff;border:1px solid #e5e7eb;padding:10px 12px;border-radius:12px;outline:none}
    label{font-size:13px;color:#334155;font-weight:600}
    .field{display:grid;gap:6px;margin-bottom:12px}
    .actions{display:flex;gap:10px;flex-wrap:wrap;align-items:center}
    .flash{padding:10px 12px;background:#dcfce7;color:#065f46;border:1px solid #86efac;border-radius:12px;margin-bottom:12px;font-weight:600}
    .badge{display:inline-block;padding:4px 10px;border-radius:999px;font-size:12px;background:var(--light-blue);color:var(--secondary-color)}

    /* chat bubble */
    .chat-box{height:340px;overflow:auto;padding:12px;border:1px dashed #cbd5e1;border-radius:14px;background:#f8fafc}
    .msg{margin-bottom:10px;display:flex;gap:8px}
    .msg .bubble{padding:10px 12px;border-radius:12px;max-width:70%;box-shadow:0 4px 16px rgba(2,6,23,.06)}
    .msg.doctor{justify-content:flex-end}
    .msg.doctor .bubble{background:var(--primary-color);color:#fff;border-top-right-radius:4px}
    .msg.patient .bubble{background:#fff;border:1px solid #e5e7eb;border-top-left-radius:4px}

    /* FOOTER */
    .footer{margin-top:48px;background:linear-gradient(135deg,#0f172a 0%,#1e293b 50%,#334155 100%);color:#fff;padding:22px 0}
    .footer-inner{max-width:1200px;margin:0 auto;padding:0 20px;display:flex;justify-content:space-between;align-items:center;gap:12px}

    @media (max-width:768px) {
      .footer-inner { flex-direction: column; text-align: center; }
    }
  </style>
  @yield('head')
</head>
<body>
  <!-- NAVBAR (dari kode pertama dengan konten kode kedua) -->
  <nav class="navbar" id="navbar">
    <div class="navbar-container">
      <a href="{{ url('/') }}" class="navbar-logo">
        <div class="navbar-logo-icon"><i class="fas fa-hospital"></i></div>
        <span class="navbar-logo-text">MediCare</span>
      </a>

      <div class="navbar-menu" id="navbar-menu">
        <div class="navbar-auth">
          @guest
            <a href="{{ route('login') }}" class="navbar-btn navbar-btn-login">
              <i class="fas fa-sign-in-alt"></i><span>Masuk</span>
            </a>
            <a href="{{ route('register') }}" class="navbar-btn navbar-btn-register">
              <i class="fas fa-user-plus"></i><span>Daftar</span>
            </a>
          @else
            @php
              $user = Auth::user();
              $role = $user->role ?? 'user';
              $avatar = $user->avatar_url ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name ?? 'User').'&background=2563eb&color=fff';
              $dashboardUrl = $role === 'doctor' ? route('doctor.dashboard') : (Route::has('dashboard') ? route('dashboard') : url('/'));
            @endphp

            <div class="user-menu" id="userMenu">
              <button type="button" class="user-btn" id="userMenuBtn" aria-haspopup="true" aria-expanded="false">
                <img class="user-avatar" src="{{ $avatar }}" alt="Avatar">
                <span class="user-name">{{ $user->name ?? 'Pengguna' }}</span>
                <span class="user-role">{{ ucfirst($role) }}</span>
                <i class="fa-solid fa-chevron-down user-caret"></i>
              </button>

              <div class="dropdown" id="userDropdown" role="menu">
                <div class="dd-head">
                  <img class="user-avatar" src="{{ $avatar }}" alt="Avatar">
                  <div>
                    <div class="user-name">{{ $user->name ?? 'Pengguna' }}</div>
                    <div class="user-role">{{ ucfirst($role) }}</div>
                  </div>
                </div>

                <a href="{{ $dashboardUrl }}" class="dd-item">
                  <i class="fa-solid fa-table-columns"></i> <span>Dashboard</span>
                </a>

                @if($role === 'doctor')
                  <a href="{{ route('doctor.schedules.index') }}" class="dd-item">
                    <i class="fa-solid fa-clock"></i> <span>Jadwal Praktek</a>
                  </a>
                  <a href="{{ route('doctor.appointments.index') }}" class="dd-item">
                    <i class="fa-solid fa-clipboard-list"></i> <span>Booking</span>
                  </a>
                @endif

                @if (Route::has('profile.edit'))
                  <a href="{{ route('profile.edit') }}" class="dd-item">
                    <i class="fa-solid fa-user-gear"></i> <span>Profil</span>
                  </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dd-item" style="width:100%;background:none;border:none;text-align:left;cursor:pointer; font-size: 18px;">
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Keluar</span>
                  </button>
                </form>
              </div>
            </div>
          @endguest
        </div>
      </div>

      <div class="navbar-toggle" id="navbar-toggle" aria-label="Toggle menu">
        <span></span><span></span><span></span>
      </div>
    </div>
  </nav>

  <script>
    // Toggle mobile menu
    const navbar = document.getElementById('navbar');
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    const navbarLinks = document.querySelectorAll('.navbar-link');

    if (navbarToggle) {
      navbarToggle.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
        navbarToggle.classList.toggle('active');
      });
    }

    navbarLinks.forEach(link => {
      link.addEventListener('click', () => {
        navbarMenu.classList.remove('active');
        navbarToggle.classList.remove('active');
      });
    });

    // Scroll effect
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) navbar.classList.add('scrolled');
      else navbar.classList.remove('scrolled');
    });

    // Active link highlight
    const sections = document.querySelectorAll('section[id]');
    window.addEventListener('scroll', () => {
      let current = '';
      sections.forEach(sec => {
        const top = sec.offsetTop, h = sec.clientHeight;
        if (window.scrollY >= (top - 100)) current = sec.getAttribute('id');
      });
      navbarLinks.forEach(a => {
        a.classList.remove('active');
        if (a.getAttribute('href') === `#${current}`)
          a.classList.add('active');
      });
    });

    // User dropdown
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userDropdown = document.getElementById('userDropdown');

    if (userMenuBtn && userDropdown) {
      userMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdown.classList.toggle('show');
        userMenuBtn.setAttribute('aria-expanded', userDropdown.classList.contains('show'));
      });
      document.addEventListener('click', (e) => {
        if (!userDropdown.contains(e.target) && !userMenuBtn.contains(e.target)) {
          userDropdown.classList.remove('show');
          userMenuBtn.setAttribute('aria-expanded', 'false');
        }
      });
    }
  </script>
  @yield('scripts')
</body>
</html>