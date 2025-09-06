{{-- resources/views/auth/forgot-password.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lupa Password — MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root{
      --primary:#2563eb;--secondary:#1e40af;--text:#1f2937;--light:#6b7280;--white:#fff;
      --g:linear-gradient(135deg,var(--primary),var(--secondary));
      --shadow-lg:0 25px 50px -12px rgba(0,0,0,.25);
    }
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Inter',system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;
      background:linear-gradient(135deg,#f0f9ff 0%,#e0f2fe 50%,#f0f9ff 100%);min-height:100vh;overflow-x:hidden}
    .wrap{max-width:1100px;margin:7rem auto 3rem;display:flex;gap:0;box-shadow:var(--shadow-lg);border-radius:20px;overflow:hidden;background:#fff}
    .left{flex:1.1;background:var(--g);color:#fff;padding:3rem;position:relative}
    .left .brand{display:flex;align-items:center;gap:1rem;margin-bottom:2rem}
    .brand .icon{width:56px;height:56px;border-radius:16px;background:rgba(255,255,255,.18);
      display:flex;align-items:center;justify-content:center;font-size:1.6rem;border:1px solid rgba(255,255,255,.25)}
    .left h2{font-size:2.2rem;line-height:1.15;margin:.5rem 0 1rem;font-weight:800}
    .left p{opacity:.95}
    .feat{margin-top:1.5rem;display:grid;gap:.8rem}
    .feat div{display:flex;gap:.6rem;align-items:center}
    .feat i{width:30px;height:30px;border-radius:10px;background:rgba(255,255,255,.18);
      display:flex;align-items:center;justify-content:center}
    .right{flex:1;padding:3rem;background:#fff}
    .hdr{text-align:center;margin-bottom:2rem}
    .hdr h1{font-size:1.9rem;font-weight:800;color:var(--text)}
    .hdr p{color:var(--light)}
    .group{margin-bottom:1.25rem}
    label{display:block;margin-bottom:.5rem;font-weight:600;color:var(--text)}
    .in{width:100%;padding:1rem;border:2px solid #e5e7eb;border-radius:14px;font-size:1rem}
    .in:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 4px rgba(37,99,235,.1)}
    .btn{width:100%;padding:1rem 1.25rem;border:none;border-radius:14px;color:#fff;background:var(--g);
      font-weight:700;cursor:pointer;box-shadow:0 10px 25px rgba(37,99,235,.2)}
    .alert{padding:.85rem 1rem;border-radius:12px;background:#ecfeff;border:1px solid #bae6fd;color:#075985;margin-bottom:1rem}
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
      <h2>Lupa Kata Sandi?</h2>
      <p>Kami akan mengirimkan tautan untuk mengatur ulang password ke email Anda.</p>
      <div class="feat">
        <div><i class="fas fa-shield-alt"></i><span>Keamanan tingkat tinggi</span></div>
        <div><i class="fas fa-envelope"></i><span>Kirim link reset instan</span></div>
        <div><i class="fas fa-lock"></i><span>Validasi token otomatis</span></div>
      </div>
    </section>

    <section class="right">
      <div class="hdr">
        <h1>Kirim Link Reset Password</h1>
        <p>Masukkan email yang terdaftar</p>
      </div>

      {{-- STATUS sukses dari session --}}
      @if (session('status'))
        <div class="alert"><i class="fas fa-check-circle"></i> {{ session('status') }}</div>
      @endif

      {{-- ERROR list --}}
      @if ($errors->any())
        <ul class="errors">
          @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="in" placeholder="nama@contoh.com">
        </div>

        <button type="submit" class="btn">
          <i class="fas fa-paper-plane"></i>&nbsp; Kirim Tautan Reset
        </button>
      </form>
    </section>
  </main>

  @include('components.footer')
</body>
</html>
