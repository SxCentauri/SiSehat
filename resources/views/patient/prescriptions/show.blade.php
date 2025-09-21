<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resep #{{ $rx->id }} - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-prescription-bottle-medical"></i>
      <h2 style="margin:0;">Resep #{{ $rx->id }}</h2>
    </div>

    <div class="card">
      <ul style="list-style:none;margin:0;padding:0;">
        @foreach($rx->items as $it)
          <li class="card" style="margin:6px 0;">
            <div style="display:flex;justify-content:space-between;gap:10px;">
              <div>
                <div><strong>{{ $it->drug_name }}</strong></div>
                <div class="text-muted">{{ $it->dosage ?? '-' }}</div>
              </div>
              <div>{{ $it->quantity }} x Rp{{ number_format($it->price,0,',','.') }}</div>
            </div>
          </li>
        @endforeach
      </ul>

      @php $total = $rx->items->sum(fn($i)=>$i->price * $i->quantity); @endphp
      <div class="actions" style="justify-content:space-between;margin-top:10px;">
        <div><strong>Total:</strong> Rp{{ number_format($total,0,',','.') }}</div>
        <form method="POST" action="{{ route('patient.prescriptions.checkout', $rx) }}">
          @csrf
          <button class="btn btn-primary"><i class="fa-solid fa-qrcode"></i> Bayar & Tebus</button>
        </form>
      </div>
    </div>

    <div class="actions">
      <a class="btn btn-outline" href="{{ route('patient.prescriptions.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </main>
</body>
</html>
