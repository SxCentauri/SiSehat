{{-- resources/views/auth/verify-email.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi Email • MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root{
      --primary:#2563eb; --secondary:#1e40af; --light:#eff6ff; --text:#0f172a; --muted:#64748b;
      --gradient:linear-gradient(135deg,var(--primary),var(--secondary));
    }
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'Inter',-apple-system,BlinkMacSystemFont,sans-serif;line-height:1.6;color:var(--text);background:#fff}
    .wrap{max-width:980px;margin:0 auto;padding:24px}
    .center{display:flex;align-items:center;justify-content:center;min-height:calc(100vh - 180px)}
    .card{width:100%;max-width:720px;background:#fff;border:1px solid #e5e7eb;border-radius:20px;
          box-shadow:0 20px 50px rgba(37,99,235,.10); padding:28px}
    .head{display:flex;gap:14px;align-items:center;margin-bottom:14px}
    .logo{width:44px;height:44px;border-radius:12px;background:var(--gradient);color:#fff;
          display:flex;align-items:center;justify-content:center}
    .title{font-weight:800;font-size:1.25rem}
    .lead{color:var(--muted);margin-bottom:18px}
    .note{background:var(--light);border:1px solid #dbeafe;color:#1e3a8a;padding:12px 14px;border-radius:12px;margin-bottom:16px;font-weight:600}
    .actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:8px}
    .btn{display:inline-flex;align-items:center;gap:8px;border:none;border-radius:12px;cursor:pointer;
         font-weight:700;padding:10px 16px}
    .btn-primary{background:var(--gradient);color:#fff;box-shadow:0 12px 26px rgba(37,99,235,.18)}
    .btn-ghost{background:#fff;border:1px solid #e5e7eb;color:var(--text)}
    .btn:disabled{opacity:.6;cursor:not-allowed}
    .small{font-size:.9rem;color:var(--muted)}
  </style>
</head>
<body>
  {{-- pakai navbar yang sama dengan Home --}}
  @include('components.navbar')

  <div class="wrap center">
    <div class="card">
      <div class="head">
        <div class="logo"><i class="fa-solid fa-envelope-open-text"></i></div>
        <div>
          <div class="title">Verifikasi Email Anda</div>
          <div class="small">Satu langkah lagi untuk mengaktifkan akun MediCare</div>
        </div>
      </div>

      <p class="lead">
        Terima kasih sudah mendaftar! Sebelum memulai, silakan verifikasi alamat email dengan
        mengklik tautan yang baru saja kami kirimkan ke kotak masuk Anda. Jika belum menerima email,
        kamu bisa minta kirim ulang di bawah ini.
      </p>

      @if (session('status') == 'verification-link-sent')
        <div class="note">
          <i class="fa-solid fa-circle-check"></i>&nbsp;
          Link verifikasi baru telah dikirim ke email kamu.
        </div>
      @endif

      <div class="actions">
        <form method="POST" action="{{ route('verification.send') }}">
          @csrf
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-paper-plane"></i> Kirim Ulang Email Verifikasi
          </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-ghost">
            <i class="fa-solid fa-right-from-bracket"></i> Keluar
          </button>
        </form>
      </div>
    </div>
  </div>

  {{-- pakai footer yang sama dengan Home --}}
  @include('components.footer')
</body>
</html>
