<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Janji Temu - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-calendar-plus"></i>
      <h2 style="margin:0;">Buat Janji Temu</h2>
    </div>

    <div class="card">
      <form method="POST" action="{{ route('patient.appointments.store') }}">
        @csrf

        <div class="field">
          <label>Dokter</label>
          <select name="doctor_id" required>
            <option value="">-- Pilih --</option>
            @foreach($doctors as $d)
              <option value="{{ $d->id }}">{{ $d->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="grid grid-2">
          <div class="field">
            <label>Tanggal</label>
            <input type="date" name="date" required>
          </div>
          <div class="field">
            <label>Jam</label>
            <input type="time" name="time" required>
          </div>
        </div>

        <div class="field">
          <label>Alasan/Keluhan</label>
          <textarea name="reason" rows="3" placeholder="Opsional"></textarea>
        </div>

        <div class="actions">
          <a class="btn btn-outline" href="{{ route('patient.appointments.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Kembali
          </a>
          <button class="btn btn-primary" type="submit">
            <i class="fa-solid fa-paper-plane"></i> Kirim
          </button>
        </div>
      </form>
    </div>
  </main>

  <script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) navbar?.classList.add('scrolled'); else navbar?.classList.remove('scrolled');
    });
  </script>
</body>
</html>
