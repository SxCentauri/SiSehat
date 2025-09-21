<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Janji Temu Saya - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-calendar-check"></i>
      <h2 style="margin:0;">Janji Temu Saya</h2>
    </div>

    <div class="actions" style="margin-bottom:12px;">
      <a class="btn btn-primary btn-sm" href="{{ route('patient.appointments.create') }}">
        <i class="fa-solid fa-plus"></i> Buat Janji
      </a>
    </div>

    @if($items->isEmpty())
      <div class="card">
        <p class="text-muted" style="text-align:center;margin:8px 0;">Belum ada janji temu.</p>
      </div>
    @else
      <div class="card">
        <div class="table-container">
          <table class="table">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Dokter</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $a)
                <tr>
                  <td>{{ $a->date }}</td>
                  <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
                  <td>{{ $a->doctor->name ?? ('#'.$a->doctor_id) }}</td>
                  <td><span class="badge {{ $a->status }}">{{ ucfirst($a->status) }}</span></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{-- pagination (kalau pakai paginate) --}}
        @if(method_exists($items,'links'))
          <div style="margin-top:10px;">
            {{ $items->links() }}
          </div>
        @endif
      </div>
    @endif
  </main>

  <script>
    // kecil: samakan behaviour navbar dengan halaman lain
    const navbar = document.getElementById('navbar');
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbarMenu = document.getElementById('navbar-menu');
    if (navbarToggle) {
      navbarToggle.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
        navbarToggle.classList.toggle('active');
      });
    }
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) navbar?.classList.add('scrolled'); else navbar?.classList.remove('scrolled');
    });
  </script>
</body>
</html>
