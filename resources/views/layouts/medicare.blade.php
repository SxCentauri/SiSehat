<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','MediCare Hospital')</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    /* === THEME TOKENS – disalin dari file2 kamu === */
    *{margin:0;padding:0;box-sizing:border-box}
    :root{
      --primary-color:#2563eb; --secondary-color:#1e40af; --accent-color:#60a5fa;
      --light-blue:#dbeafe; --extra-light-blue:#eff6ff;
      --text-color:#1f2937; --text-light:#6b7280; --white:#ffffff;
      --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
      --gradient-light:linear-gradient(135deg,var(--light-blue),var(--extra-light-blue));
      --shadow:0 20px 50px rgba(37,99,235,.1); --shadow-hover:0 30px 70px rgba(37,99,235,.15)
    }
    body{font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;line-height:1.6;color:var(--text-color);background:var(--white)}
    a{text-decoration:none;color:inherit}

    /* NAVBAR ala MediCare (ikon + menu + tombol) */
    .navbar{position:sticky;top:0;z-index:50;background:var(--white);box-shadow:0 10px 30px rgba(2,6,23,.06)}
    .nav-wrap{max-width:1200px;margin:0 auto;padding:14px 20px;display:flex;align-items:center;justify-content:space-between}
    .brand{display:flex;align-items:center;gap:10px;font-weight:800;color:var(--secondary-color)}
    .brand i{background:var(--extra-light-blue);color:var(--primary-color);padding:10px;border-radius:12px}
    .links{display:flex;gap:22px;align-items:center}
    .links a{color:#0f172a;font-weight:600;opacity:.9}
    .links a:hover{opacity:1}
    .btn{background:var(--white);color:var(--primary-color);border:1.5px solid var(--primary-color);padding:8px 14px;border-radius:12px;font-weight:700}
    .btn.solid{background:var(--gradient);color:#fff;border:none;box-shadow:var(--shadow)}
    .container{max-width:1100px;margin:0 auto;padding:24px}

    /* Kartu & tabel yang dipakai halaman dokter */
    .card{background:#fff;border-radius:18px;box-shadow:var(--shadow);padding:18px}
    .grid{display:grid;gap:18px}
    .grid-2{grid-template-columns:repeat(2,minmax(0,1fr))}
    .grid-3{grid-template-columns:repeat(3,minmax(0,1fr))}
    @media (max-width:900px){.grid-2,.grid-3{grid-template-columns:1fr}}
    .section-title{display:flex;align-items:center;gap:10px;margin-bottom:10px}
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

    /* User pill & dropdown */
    .user-menu{display:inline-block;position:relative}
    .user-menu summary{list-style:none;display:inline-flex;align-items:center;gap:8px;cursor:pointer;
      padding:6px 10px;border-radius:999px;background:#fff;border:1px solid #e5e7eb}
    .user-menu summary::-webkit-details-marker{display:none}
    .user-chip{width:28px;height:28px;border-radius:50%;background:var(--gradient);color:#fff;
      display:grid;place-content:center;font-weight:800}
    .dropdown{position:absolute;right:0;margin-top:8px;background:#fff;border:1px solid #e5e7eb;border-radius:12px;
      box-shadow:0 10px 25px rgba(2,6,23,.12);padding:8px;min-width:240px;z-index:60}
    .dropdown a{display:block;padding:8px 10px;border-radius:8px;color:#334155}
    .dropdown a:hover{background:#f1f5f9}
    .dropdown hr{border:0;border-top:1px solid #e5e7eb;margin:6px 0}
    .logout-btn{width:100%;text-align:left;padding:8px 10px;border:0;background:none;color:#ef4444;font-weight:700;cursor:pointer;border-radius:8px}
    .logout-btn:hover{background:#fef2f2}
  </style>
  @yield('head')
</head>
<body>
  <nav class="navbar">
    <div class="nav-wrap">
      <div class="brand">
        <i class="fa-solid fa-house-chimney-medical"></i>
        <span>MediCare</span>
      </div>

      <div class="links">
        <a href="{{ route('home') }}">Beranda</a>
        <a href="#layanan">Layanan</a>
        <a href="#fitur">Fitur</a>
        <a href="#kontak">Kontak</a>

        @guest
          <a class="btn" href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Masuk</a>
          <a class="btn solid" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Daftar</a>
        @else
          {{-- Link Dashboard sesuai role --}}
          <a href="{{ auth()->user()->role === 'doctor' ? route('doctor.dashboard') : route('dashboard') }}"
             class="btn"
             style="border-color:#e5e7eb;color:#0f172a">
            <i class="fa-solid fa-gauge-high"></i> Dashboard
          </a>

          {{-- User pill + dropdown tanpa JS pakai <details> --}}
          @php
            $u = auth()->user();
            $initials = collect(explode(' ', $u->name ?? 'U'))
                        ->map(fn($w)=>mb_substr($w,0,1))
                        ->take(2)->implode('');
          @endphp
          <details class="user-menu">
            <summary>
              <span class="user-chip">{{ $initials }}</span>
              <span style="font-weight:700">{{ $u->name }}</span>
              <i class="fa-solid fa-chevron-down" style="font-size:.85rem;color:#64748b"></i>
            </summary>
            <div class="dropdown">
              @if(($u->role ?? '') === 'doctor')
                <a href="{{ route('doctor.dashboard') }}"><i class="fa-solid fa-gauge-high"></i> Dashboard Dokter</a>
                <a href="{{ route('doctor.schedules.index') }}"><i class="fa-solid fa-clock"></i> Jadwal Praktek</a>
                <a href="{{ route('doctor.appointments.index') }}"><i class="fa-solid fa-clipboard-list"></i> Booking</a>
                <a href="{{ route('doctor.profile.edit') }}"><i class="fa-solid fa-user-gear"></i> Edit Profil</a>
                <hr>
              @endif
              <a href="{{ route('profile.edit') }}"><i class="fa-solid fa-id-badge"></i> Profil Akun</a>
              <hr>
              <form action="{{ route('logout') }}" method="POST" style="margin:0">
                @csrf
                <button type="submit" class="logout-btn"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</button>
              </form>
            </div>
          </details>
        @endguest
      </div>
    </div>
  </nav>

  <main class="container">
    @yield('content')
  </main>

  <footer class="footer">
    <div class="footer-inner">
      <div>&copy; {{ date('Y') }} MediCare Hospital</div>
      <div>Data Terlindungi • 24/7 Emergency</div>
    </div>
  </footer>
  @yield('scripts')
</body>
</html>
