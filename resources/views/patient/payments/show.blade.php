<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembayaran Invoice {{ $invoice->reference }} - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/doctor/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/patient/dashboard.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="section-title" style="margin-bottom:12px;">
      <i class="fa-solid fa-receipt"></i>
      <h2 style="margin:0;">Pembayaran</h2>
    </div>

    <div class="card">
      <div class="grid grid-2">
        <div>
          <div><strong>Invoice:</strong> {{ $invoice->reference }}</div>
          <div><strong>Status:</strong> {{ ucfirst($invoice->status) }}</div>
          <div><strong>Jumlah:</strong> Rp{{ number_format($invoice->amount,0,',','.') }}</div>
        </div>
        <div class="actions" style="justify-content:flex-end;align-items:flex-start;">
          @if(!$payment)
            <form method="POST" action="{{ route('patient.payments.qris', $invoice) }}">
              @csrf
              <button class="btn btn-primary"><i class="fa-solid fa-qrcode"></i> Generate QRIS</button>
            </form>
          @endif
        </div>
      </div>

      @if($payment)
        <div class="card" style="margin-top:12px;">
          <div class="section-title" style="margin-bottom:8px;">
            <i class="fa-solid fa-qrcode"></i>
            <h3 style="margin:0;">QRIS</h3>
          </div>
          <div style="text-align:center;">
            @if($payment->qr_url)
              <img src="{{ $payment->qr_url }}" alt="QRIS" style="max-width:260px;">
            @else
              <em>QR belum tersedia.</em>
            @endif
            <div class="text-muted" style="margin-top:8px;">Status pembayaran: {{ ucfirst($payment->status) }}</div>
          </div>
        </div>
      @endif
    </div>

    <div class="actions">
      <a class="btn btn-outline" href="{{ route('patient.prescriptions.index') }}"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    </div>
  </main>
</body>
</html>
