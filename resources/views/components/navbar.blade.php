{{-- resources/views/components/navbar.blade.php --}}
<style>
  *{margin:0;padding:0;box-sizing:border-box}
    :root{
      --primary-color:#2563eb; --secondary-color:#1e40af; --accent-color:#60a5fa;
      --light-blue:#dbeafe; --extra-light-blue:#eff6ff; --text-color:#1f2937; --text-light:#6b7280; --white:#ffffff;
      --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
      --gradient-light:linear-gradient(135deg,var(--light-blue),var(--extra-light-blue));
      --shadow:0 20px 50px rgba(37,99,235,.1); --shadow-hover:0 30px 70px rgba(37,99,235,.15);
    }

    body{line-height:1.6;color:var(--text-color);background:var(--white);padding-top:80px;}
    a{text-decoration:none;color:inherit}

    /* NAVBAR */
    .navbar{
      position:fixed;
      top:0;
      left:0;
      width:100%;
      background:rgba(255,255,255,.95);
      backdrop-filter:blur(20px);
      -webkit-backdrop-filter:blur(20px);
      box-shadow:0 5px 20px rgba(37,99,235,.1);
      padding:15px 0;
      z-index:1000;
      transition:all .3s ease;
    }
    .navbar.scrolled{
      padding:.8rem 0;
      background:rgba(255,255,255,.98);
      box-shadow:0 10px 30px rgba(37,99,235,.15);
    }
    .navbar-container{
      max-width:1200px;
      margin:0 auto;
      padding:0 2rem;
      display:flex;
      justify-content:space-between;
      align-items:center;
    }
    .navbar-logo{
      display:flex;
      align-items:center;
      gap:1rem;
      text-decoration:none;
    }
    .navbar-logo-icon{
      width:45px;
      height:45px;
      background:var(--gradient);
      border-radius:12px;
      display:flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      font-size:1.3rem;
      box-shadow:0 10px 25px rgba(37,99,235,.2);
    }
    .navbar-logo-text{
      font-size:1.5rem;
      font-weight:800;
      background:linear-gradient(135deg,var(--text-color) 0%,var(--primary-color) 100%);
      -webkit-background-clip:text;
      -webkit-text-fill-color:transparent;
      background-clip:text;
    }
    .navbar-menu{
      display:flex;
      align-items:center;
      gap:2.5rem;
    }
    .navbar-links{
      display:flex;
      gap:2rem;
      list-style:none;
    }
    .navbar-link{
      text-decoration:none;
      color:var(--text-color);
      font-weight:600;
      font-size:1rem;
      transition:all .3s ease;
      position:relative;
      padding:.5rem 0;
    }
    .navbar-link::after{
      content:'';
      position:absolute;
      bottom:0;
      left:0;
      width:0;
      height:3px;
      background:var(--gradient);
      border-radius:3px;
      transition:width .3s ease;
    }
    .navbar-link:hover::after,.navbar-link.active::after{
      width:100%;
    }
    .navbar-link:hover{
      color:var(--primary-color);
    }

    .navbar-auth{
      display:flex;
      gap:1rem;
      align-items:center;
    }
    .navbar-btn{
      padding:.8rem 1.5rem;
      font-size:.9rem;
      font-weight:600;
      border-radius:10px;
      text-decoration:none;
      transition:all .3s ease;
      display:inline-flex;
      align-items:center;
      gap:.5rem;
    }
    .navbar-btn-login{
      color:var(--primary-color);
      border:2px solid var(--primary-color);
      background:transparent;
    }
    .navbar-btn-login:hover{
      background:var(--primary-color);
      color:#fff;
      transform:translateY(-2px);
      box-shadow:0 10px 25px rgba(37,99,235,.2);
    }
    .navbar-btn-register{
      background:var(--gradient);
      color:#fff;
      box-shadow:0 10px 25px rgba(37,99,235,.2);
    }
    .navbar-btn-register:hover{
      transform:translateY(-2px);
      box-shadow:0 15px 35px rgba(37,99,235,.3);
    }

    .navbar-toggle{
      display:none;
      flex-direction:column;
      justify-content:space-between;
      width:30px;
      height:21px;
      cursor:pointer;
    }
    .navbar-toggle span{
      height:3px;
      width:100%;
      background:var(--primary-color);
      border-radius:3px;
      transition:all .3s ease;
    }
    .navbar-toggle.active span:nth-child(1){
      transform:translateY(9px) rotate(45deg);
    }
    .navbar-toggle.active span:nth-child(2){
      opacity:0;
    }
    .navbar-toggle.active span:nth-child(3){
      transform:translateY(-9px) rotate(-45deg);
    }

    /* USER MENU dengan animasi yang ditingkatkan */
    .user-menu{
      position:relative;
    }
    .user-btn{
      display:flex;
      align-items:center;
      gap:.6rem;
      background:#fff;
      border:1px solid #e5e7eb;
      border-radius:12px;
      padding:.45rem .7rem;
      cursor:pointer;
      transition:all 0.3s ease;
    }
    .user-btn:hover{
      box-shadow:0 5px 15px rgba(37,99,235,.1);
      border-color:var(--accent-color);
    }
    .user-avatar{
      width:28px;
      height:28px;
      border-radius:999px;
      object-fit:cover;
      background:#e5e7eb;
      transition:transform 0.3s ease;
    }
    .user-name{
      font-weight:700;
      font-size:.92rem;
      color:var(--text-color);
    }
    .user-role{
      font-size:.75rem;
      color:var(--text-light);
      font-weight:600;
      padding:.1rem .5rem;
      border-radius:999px;
      background:var(--extra-light-blue);
      transition:all 0.3s ease;
    }
    .user-caret{
      color:#64748b;
      font-size:.85rem;
      transition:transform 0.3s ease;
    }

    .user-btn:hover .user-avatar {
      transform: scale(1.1);
    }

    .user-btn:hover .user-role {
      background: var(--light-blue);
      color: var(--secondary-color);
    }

    .user-btn.active .user-caret {
      transform: rotate(180deg);
    }

    /* DROPDOWN dengan animasi yang lebih halus */
    .dropdown{
      position:absolute;
      right:0;
      top:calc(100% + .6rem);
      width:220px;
      background:#fff;
      border:1px solid #e5e7eb;
      border-radius:14px;
      box-shadow:0 20px 50px rgba(2,6,23,.10);
      padding:.5rem;
      opacity:0;
      visibility:hidden;
      transform:translateY(-10px) scale(0.95);
      transition:all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      z-index:1001;
      transform-origin: top right;
    }
    .dropdown.show{
      opacity:1;
      visibility:visible;
      transform:translateY(0) scale(1);
      animation: dropdownAppear 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    @keyframes dropdownAppear {
      0% {
        opacity: 0;
        transform: translateY(-15px) scale(0.95);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .dd-head{
      display:flex;
      align-items:center;
      gap:.6rem;
      padding:.5rem .6rem;
      border-bottom:1px solid #f1f5f9;
      margin-bottom:.25rem;
      animation: fadeIn 0.5s ease forwards;
      opacity: 0;
      transform: translateY(-10px);
    }
    .dd-head .user-avatar{
      width:34px;
      height:34px;
    }
    .dd-item{
      display:flex;
      align-items:center;
      gap:.6rem;
      padding:.6rem .6rem;
      border-radius:10px;
      color:var(--text-color);
      text-decoration:none;
      font-weight:600;
      transition:all 0.2s ease;
      opacity:0;
      transform: translateX(-10px);
      animation: slideInItem 0.4s ease forwards;
    }

    .dd-item:nth-child(2) { animation-delay: 0.05s; }
    .dd-item:nth-child(3) { animation-delay: 0.1s; }
    .dd-item:nth-child(4) { animation-delay: 0.15s; }
    .dd-item:nth-child(5) { animation-delay: 0.2s; }
    .dd-item:nth-child(6) { animation-delay: 0.25s; }
    .dd-item:nth-child(7) { animation-delay: 0.3s; }

    @keyframes slideInItem {
      0% {
        opacity: 0;
        transform: translateX(-10px);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .dd-item:hover{
      background:#f1f5f9;
      transform:translateX(5px) !important;
    }
    .dd-item i{
      color:var(--primary-color);
      transition:transform 0.2s ease;
    }
    .dd-item:hover i{
      transform:scale(1.2);
    }

    /* MOBILE */
    @media (max-width:968px){
      .navbar-toggle{
        display:flex;
      }
      .navbar-menu{
        position:fixed;
        top:72px;
        left:-100%;
        width:100%;
        height:calc(100vh - 72px);
        background:#fff;
        flex-direction:column;
        align-items:center;
        justify-content:flex-start;
        padding:3rem 2rem;
        gap:2.5rem;
        transition:left .4s ease;
        box-shadow:0 10px 30px rgba(0,0,0,.1);
        overflow-y:auto;
      }
      .navbar-menu.active{
        left:0;
      }
      .navbar-links{
        flex-direction:column;
        align-items:center;
        gap:2rem;
        width:100%;
      }
      .navbar-link{
        font-size:1.2rem;
        padding:.8rem 0;
      }
      .navbar-auth{
        flex-direction:column;
        width:100%;
        max-width:300px;
      }
      .navbar-btn{
        width:100%;
        justify-content:center;
        padding:1rem 2rem;
        font-size:1.1rem;
      }

      /* Dropdown untuk mobile */
      .dropdown{
        position:static;
        width:100%;
        box-shadow:none;
        border:1px dashed #e5e7eb;
        margin-top:1rem;
        transform:none;
        display:none;
        opacity: 1;
        visibility: visible;
        animation: none;
      }
      .dropdown.show{
        display:block;
        animation:mobileDropdownAppear 0.4s ease forwards;
      }

      @keyframes mobileDropdownAppear {
        from {
          opacity: 0;
          max-height: 0;
          overflow: hidden;
        }
        to {
          opacity: 1;
          max-height: 500px;
        }
      }

      .dd-item {
        animation: none !important;
        opacity: 1;
        transform: none;
      }
    }
    @media (max-width:480px){
      .navbar-logo-text{
        font-size:1.3rem;
      }
      .navbar-logo-icon{
        width:40px;
        height:40px;
        font-size:1.1rem;
      }
    }

    /* Animasi keyframes */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Container & main content */
    .container{
      max-width:1200px;
      margin:0 auto;
      padding:24px 20px;
    }

    /* Konten contoh */
    .content {
      text-align: center;
      padding: 2rem;
      background: var(--extra-light-blue);
      border-radius: 18px;
      margin-top: 2rem;
    }

    .content h1 {
      color: var(--primary-color);
      margin-bottom: 1rem;
    }

    .content p {
      color: var(--text-light);
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto;
    }
</style>

<nav class="navbar" id="navbar">
  <div class="navbar-container">
    <a href="{{ url('/') }}" class="navbar-logo">
      <div class="navbar-logo-icon"><i class="fas fa-hospital"></i></div>
      <span class="navbar-logo-text">MediCare</span>
    </a>

    <div class="navbar-menu" id="navbar-menu">
      <ul class="navbar-links">
        <li><a href="{{ url('#home') }}" class="navbar-link">Beranda</a></li>
        <li><a href="{{ url('#features') }}" class="navbar-link">Layanan</a></li>
        <li><a href="{{ url('#roles') }}" class="navbar-link">Fitur</a></li>
        <li><a href="{{ url('#contact') }}" class="navbar-link">Kontak</a></li>
      </ul>

      <div class="navbar-auth">
        @guest
          <a href="{{ route('login') }}" class="navbar-btn navbar-btn-login">
            <i class="fas fa-sign-in-alt"></i><span>Masuk</span>
          </a>
          <a href="{{ route('register') }}" class="navbar-btn navbar-btn-register">
            <i class="fas fa-user-plus"></i><span>Daftar</span>
          </a>
        @endguest

        @auth
          @php
            $user = Auth::user();
            $role = $user->role ?? 'user';
            $avatar = $user->avatar_url
              ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name ?? 'User').'&background=2563eb&color=fff';
            $dashboardUrl = $role === 'dokter' ? url('/doctor') : (Route::has('dashboard') ? route('dashboard') : url('/'));
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

              {{-- Dashboard link berdasarkan role --}}
              @if($role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="dd-item">
                  <i class="fa-solid fa-table-columns"></i> <span>Dashboard Admin</span>
                </a>
              @elseif($role === 'doctor')
                <a href="{{ route('doctor.dashboard') }}" class="dd-item">
                  <i class="fa-solid fa-table-columns"></i> <span>Dashboard Dokter</span>
                </a>
              @elseif($role === 'nurse')
                <a href="{{ route('nurse.dashboard') }}" class="dd-item">
                  <i class="fa-solid fa-table-columns"></i> <span>Dashboard Perawat</span>
                </a>
              @else
                <a href="{{ route('dashboard') }}" class="dd-item">
                  <i class="fa-solid fa-table-columns"></i> <span>Dashboard</span>
                </a>
              @endif

              {{-- Profil & Pengaturan berdasarkan role --}}
              @if($role === 'admin' && Route::has('admin.profile.edit'))
                <a href="{{ route('admin.profile.edit') }}" class="dd-item">
                  <i class="fa-solid fa-user-gear"></i> <span>Profil</span>
                </a>
              @elseif($role === 'doctor' && Route::has('doctor.profile.edit'))
                <a href="{{ route('doctor.profile.edit') }}" class="dd-item">
                  <i class="fa-solid fa-user-gear"></i> <span>Profil</span>
                </a>
              @elseif($role === 'nurse' && Route::has('nurse.profile.edit'))
                <a href="{{ route('nurse.profile.edit') }}" class="dd-item">
                  <i class="fa-solid fa-user-gear"></i> <span>Profil</span>
                </a>
              @elseif(Route::has('profile.edit'))
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
        @endauth
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

    // User dropdown dengan animasi yang diperbaiki
    const userMenuBtn = document.getElementById('userMenuBtn');
    const userDropdown = document.getElementById('userDropdown');

    if (userMenuBtn && userDropdown) {
      userMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdown.classList.toggle('show');
        userMenuBtn.classList.toggle('active');
        userMenuBtn.setAttribute('aria-expanded', userDropdown.classList.contains('show'));
      });

      document.addEventListener('click', (e) => {
        if (!userDropdown.contains(e.target) && !userMenuBtn.contains(e.target)) {
          userDropdown.classList.remove('show');
          userMenuBtn.classList.remove('active');
          userMenuBtn.setAttribute('aria-expanded', 'false');
        }
      });

      // Untuk perangkat mobile, tutup dropdown saat item diklik
      const dropdownItems = userDropdown.querySelectorAll('.dd-item');
      dropdownItems.forEach(item => {
        item.addEventListener('click', () => {
          // Hanya tutup di mobile
          if (window.innerWidth <= 968) {
            userDropdown.classList.remove('show');
            userMenuBtn.classList.remove('active');
            userMenuBtn.setAttribute('aria-expanded', 'false');
          }
        });
      });
    }
</script>
