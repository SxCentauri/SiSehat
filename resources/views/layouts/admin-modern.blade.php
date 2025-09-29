<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title','Admin - MediCare')</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    :root{
      --primary-color:#2563eb;--secondary-color:#1e40af;--accent-color:#60a5fa;
      --light-blue:#dbeafe;--extra-light-blue:#eff6ff;--text-color:#1f2937;--text-light:#6b7280;--white:#ffffff;
      --success-color:#10b981;--danger-color:#ef4444;
      --gradient:linear-gradient(135deg,var(--primary-color),var(--secondary-color));
      --gradient-light:linear-gradient(135deg,var(--light-blue),var(--extra-light-blue));
      --shadow:0 20px 50px rgba(37,99,235,.1);--shadow-hover:0 30px 70px rgba(37,99,235,.15);
      --border-radius:16px;
    }
    body{font-family:'Inter',sans-serif;line-height:1.6;color:var(--text-color);background:#f8fafc;padding:100px 20px 40px}
    .container{max-width:1200px;margin:0 auto}
    .grid{display:grid;gap:24px;margin-bottom:30px}
    .grid-2{grid-template-columns:repeat(2,minmax(0,1fr))}
    .flash{padding:16px 24px;background:#dcfce7;color:#166534;border-radius:var(--border-radius);margin-bottom:30px;font-weight:600;border:1px solid #bbf7d0;display:flex;align-items:center;gap:12px;box-shadow:0 8px 25px rgba(16,185,129,.15)}
    .flash i{font-size:20px}
    .card{background:#fff;border-radius:var(--border-radius);box-shadow:var(--shadow);padding:32px;transition:.3s;border:1px solid rgba(96,165,250,.1)}
    .card:hover{box-shadow:var(--shadow-hover)}
    .section-title{display:flex;align-items:center;gap:16px;margin-bottom:28px;font-size:24px;font-weight:700;color:var(--text-color)}
    .section-title i{color:var(--primary-color);font-size:22px;width:50px;height:50px;background:var(--gradient-light);border-radius:12px;display:flex;align-items:center;justify-content:center}
    .table-wrap{overflow-x:auto}
    table{width:100%;border-collapse:separate;border-spacing:0 10px}
    thead th{font-size:13px;text-transform:uppercase;letter-spacing:.04em;color:var(--text-light);text-align:left;padding:0 14px}
    tbody tr{background:#fff;box-shadow:var(--shadow);border-radius:12px}
    tbody td{padding:14px}
    .badge{display:inline-block;padding:6px 10px;border-radius:999px;background:var(--extra-light-blue);color:var(--secondary-color);font-weight:600;font-size:12px}
    .btn{padding:12px 16px;font-size:14px;font-weight:600;border:none;border-radius:12px;cursor:pointer;transition:.2s;display:inline-flex;align-items:center;gap:8px;text-decoration:none}
    .btn-primary{background:var(--gradient);color:#fff;box-shadow:0 10px 30px rgba(37,99,235,.2)}
    .btn-primary:hover{transform:translateY(-2px);box-shadow:0 15px 40px rgba(37,99,235,.3)}
    .btn-outline{background:transparent;border:2px solid var(--primary-color);color:var(--primary-color)}
    .btn-outline:hover{background:var(--primary-color);color:#fff;transform:translateY(-2px)}
    .btn-danger{background:var(--danger-color);color:#fff}
    .btn-danger:hover{filter:brightness(.92);transform:translateY(-2px)}
    .actions{display:flex;gap:10px;flex-wrap:wrap}
    .form-group{margin-bottom:18px}
    .form-label{display:block;margin-bottom:8px;font-weight:600;color:var(--text-color);font-size:14px}
    .form-control,.form-select{width:100%;padding:12px 14px;border:2px solid #e5e7eb;border-radius:12px;font-size:14px;background:#fff;transition:.2s}
    .form-control:focus,.form-select:focus{outline:none;border-color:var(--primary-color);box-shadow:0 0 0 3px rgba(37,99,235,.1)}
    .error-message{display:block;margin-top:6px;color:var(--danger-color);font-size:13px;font-weight:500}
    .toolbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px;gap:12px;flex-wrap:wrap}
    .toolbar .search{display:flex;gap:10px;align-items:center}
    .toolbar .search input{min-width:240px}
    .pagination{margin-top:16px;display:flex;gap:8px;flex-wrap:wrap}
    @media (max-width:1024px){body{padding:90px 15px 30px}.card{padding:24px}.section-title{font-size:22px}.section-title i{width:45px;height:45px;font-size:20px}}
    @media (max-width:768px){body{padding:80px 10px 20px}.grid-2{grid-template-columns:1fr}.card{padding:20px;border-radius:14px}.section-title{font-size:20px;gap:12px;margin-bottom:20px}.section-title i{width:40px;height:40px;font-size:18px}.btn{width:100%}.toolbar .search input{min-width:unset}}
    @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
    .card{animation:fadeIn .5s ease-out}
  </style>
</head>
<body>
  {{-- navbar/sidebar kamu --}}
  @include('layouts.medicare')

  <div class="container">
    @if(session('success')) 
      <div class="flash"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
    @endif
    @if(session('error')) 
      <div class="flash" style="background:#fee2e2;color:#991b1b;border-color:#fecaca;">
        <i class="fa-solid fa-triangle-exclamation"></i> {{ session('error') }}
      </div>
    @endif

    @yield('content')
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('form').forEach(f => {
        f.addEventListener('submit', function(){
          const btn = this.querySelector('button[type="submit"]');
          if(btn){ btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...'; btn.disabled = true; }
        });
      });
    });
  </script>
</body>
</html>
