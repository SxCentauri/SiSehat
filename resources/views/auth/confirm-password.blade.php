{{-- resources/views/auth/confirm-password.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Konfirmasi Password — MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root{--primary:#2563eb;--secondary:#1e40af;--text:#1f2937;--light:#6b7280;--white:#fff;--g:linear-gradient(135deg,var(--primary),var(--secondary));--shadow-lg:0 25px 50px -12px rgba(0,0,0,.25)}
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;background:linear-gradient(135deg,#f0f9ff 0%,#e0f2fe 50%,#f0f9ff 100%);min-height:100vh}
    .wrap{max-width:1100px;margin:7rem auto 3rem;display:flex;border-radius:20px;overflow:hidden;background:#fff;box-shadow:var(--shadow-lg)}
    .left{flex:1.1;background:var(--g);color:#fff;padding:3rem}
    .brand{display:flex;gap:1rem;align-items:center;margin-bottom:2rem}
    .icon{width:56px;height:56px;border-radius:16px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;border:1px solid rgba(255,255,255,.25)}
    .left h2{font-size:2.2rem;font-weight:800;margin:.5rem 0 1rem}
    .left p{opacity:.95}
    .right{flex:1;padding:3rem}
    .hdr{text-align:center;margin-bottom:2rem}
    .hdr h1{font-size:1.9rem;font-weight:800;color:var(--text)}
    .hdr p{color:var(--light)}
    .group{margin-bottom:1.1rem}
    label{display:block;margin-bottom:.5rem;font-weight:600;color:var(--text)}
    .in{width:100%;padding:1rem;border:2px solid #e5e7eb;border-radius:14px}
    .in:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 4px rgba(37,99,235,.1)}
    .btn{width:100%;padding:1rem 1.25rem;border:none;border-radius:14px;color:#fff;background:var(--g);font-weight:700;cursor:pointer;box-shadow:0 10px 25px rgba(37,99,235,.2)}
    .errors{margin-bottom:1rem}
    .errors li{color:#b91c1c;margin-left:1.25rem}
    @media(max-width:900px){.wrap{flex-direction:column;max-width:500px;margin-top:6.5rem}.left{min-height:360px}}
  </style>
</head>
<body>
  @include('components.navbar')

  <main class="wrap">
    <section class="left">
      <div class="brand">
        <div class="icon"><i class="fas fa-hospital"></i></div>
        <strong>MediCare</strong>
      </div>
      <h2>Konfirmasi Password</h2>
      <p>Demi keamanan, kami perlu memastikan ini benar-benar Anda.</p>
    </section>

    <section class="right">
      <div class="hdr">
        <h1>Masukkan Kata Sandi</h1>
        <p>Lanjutkan setelah verifikasi</p>
      </div>

      {{-- ERROR list --}}
      @if ($errors->any())
        <ul class="errors">
          @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      @endif

      <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="group">
          <label for="password">Kata Sandi</label>
          <input id="password" type="password" name="password" required autocomplete="current-password" class="in" placeholder="••••••••">
        </div>

        <button type="submit" class="btn">
          <i class="fas fa-check"></i>&nbsp; Konfirmasi
        </button>
      </form>
    </section>
  </main>

  @include('components.footer')
</body>
</html>
