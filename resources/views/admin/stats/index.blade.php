@extends('layouts.admin-modern')
@section('title','Ringkasan Statistik - MediCare')

@section('content')
<style>
  /* Tambahan kecil supaya modern & konsisten */
  .kpi-grid{display:grid;gap:18px;grid-template-columns:repeat(4,minmax(0,1fr))}
  .kpi{
    background:#fff;border-radius:16px;padding:22px;
    box-shadow:0 20px 50px rgba(37,99,235,.08);border:1px solid rgba(96,165,250,.12)
  }
  .kpi .badge-icon{
    width:46px;height:46px;border-radius:12px;
    display:flex;align-items:center;justify-content:center;
    background:linear-gradient(135deg,#dbeafe,#eff6ff);color:#2563eb;font-size:18px
  }
  .kpi .value{font-size:34px;font-weight:800;line-height:1;margin-top:12px}
  .kpi .label{color:#6b7280;font-size:13px}

  .grid-2{display:grid;gap:18px;grid-template-columns:1.2fr .8fr}
  .card-soft{
    background:#fff;border-radius:16px;padding:24px;
    box-shadow:0 20px 50px rgba(37,99,235,.08);border:1px solid rgba(96,165,250,.12)
  }
  .section-head{display:flex;align-items:center;gap:12px;margin-bottom:14px}
  .section-head i{color:#2563eb;background:linear-gradient(135deg,#dbeafe,#eff6ff);
    width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center}

  /* Donut utilitas */
  .donut{
    --p: {{ $utilization }}; /* percent */
    width:160px;height:160px;border-radius:50%;
    background:
      conic-gradient(#2563eb calc(var(--p)*1%), #e5e7eb 0);
    display:grid;place-items:center;margin:8px auto 10px;position:relative
  }
  .donut:after{
    content:"{{ $utilization }}%";
    width:110px;height:110px;border-radius:50%;background:#fff;
    display:grid;place-items:center;font-weight:800;font-size:22px;color:#1f2937;
    box-shadow:inset 0 0 0 1px rgba(96,165,250,.15)
  }
  .meta{display:flex;gap:14px;flex-wrap:wrap;color:#6b7280;font-size:13px}
  .chip{background:#f3f4f6;border:1px solid #e5e7eb;border-radius:999px;padding:6px 10px;font-weight:600}
  .progress{height:10px;border-radius:999px;background:#eef2ff;overflow:hidden}
  .progress>span{display:block;height:10px;background:linear-gradient(135deg,#60a5fa,#2563eb);width:{{ $utilization }}%}

  /* User distribution */
  .user-box{display:flex;gap:14px}
  .user-item{flex:1;background:linear-gradient(180deg,#fafbff,#ffffff);
    border:1px solid rgba(96,165,250,.12);border-radius:14px;padding:14px;text-align:center}
  .user-item .val{font-size:26px;font-weight:800}
  .user-item .ttl{color:#6b7280;font-size:12px}

  @media(max-width:1000px){ .kpi-grid{grid-template-columns:1fr 1fr} .grid-2{grid-template-columns:1fr} }
  @media(max-width:640px){ .kpi-grid{grid-template-columns:1fr} }
</style>

<div class="kpi-grid">
  <div class="kpi">
    <div class="badge-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
    <div class="value" style="color:#ef4444">{{ $todayEmergencies }}</div>
    <div class="label">Emergency hari ini</div>
    <div class="meta" style="margin-top:8px"><span class="chip">Total: {{ $totalEmergencies }}</span></div>
  </div>

  <div class="kpi">
    <div class="badge-icon"><i class="fa-solid fa-door-open"></i></div>
    <div class="value">{{ $totalRooms }}</div>
    <div class="label">Total Ruangan</div>
    <div class="meta" style="margin-top:8px">
      <span class="chip">Kapasitas {{ $sumCapacity }}</span>
      <span class="chip">Terisi {{ $sumOccupied }}</span>
    </div>
  </div>

  <div class="kpi">
    <div class="badge-icon"><i class="fa-solid fa-calendar-check"></i></div>
    <div class="value">{{ $todayAppointments }}</div>
    <div class="label">Janji Temu hari ini</div>
    <div class="meta" style="margin-top:8px"><span class="chip">Total: {{ $totalAppointments }}</span></div>
  </div>

  <div class="kpi">
    <div class="badge-icon"><i class="fa-solid fa-users"></i></div>
    <div class="value">{{ $patients+$doctors+$nurses }}</div>
    <div class="label">Total Pengguna</div>
    <div class="meta" style="margin-top:8px">
      <span class="chip">Patient {{ $patients }}</span>
      <span class="chip">Doctor {{ $doctors }}</span>
      <span class="chip">Nurse {{ $nurses }}</span>
    </div>
  </div>
</div>

<div class="grid-2" style="margin-top:18px">
  {{-- Utilisasi Ruangan --}}
  <div class="card-soft">
    <div class="section-head"><i class="fa-solid fa-gauge-high"></i><h3>Utilisasi Ruangan</h3></div>
    <div style="display:grid;grid-template-columns:180px 1fr;gap:18px;align-items:center">
      <div class="donut"></div>
      <div>
        <div class="progress"><span></span></div>
        <div class="meta" style="margin-top:10px">
          <span>Tersedia: <b>{{ max(0,$sumCapacity-$sumOccupied) }}</b></span>
          <span>Terisi: <b>{{ $sumOccupied }}</b></span>
          <span>Kapasitas: <b>{{ $sumCapacity }}</b></span>
        </div>
      </div>
    </div>
  </div>

  {{-- Distribusi Pengguna --}}
  <div class="card-soft">
    <div class="section-head"><i class="fa-solid fa-user-group"></i><h3>Distribusi Pengguna</h3></div>
    <div class="user-box">
      <div class="user-item">
        <div class="val">{{ $patients }}</div>
        <div class="ttl">Patient</div>
      </div>
      <div class="user-item">
        <div class="val">{{ $doctors }}</div>
        <div class="ttl">Doctor</div>
      </div>
      <div class="user-item">
        <div class="val">{{ $nurses }}</div>
        <div class="ttl">Nurse</div>
      </div>
    </div>
  </div>
</div>

{{-- Tren 7 Hari --}}
<div class="card-soft" style="margin-top:18px">
  <div class="section-head"><i class="fa-solid fa-chart-line"></i><h3>Tren 7 Hari Terakhir</h3></div>

  <style>
    .chart-wrap{
      height:260px;               /* <= atur tinggi di sini */
      max-height:260px;
      position:relative;
    }
    @media (max-width: 768px){
      .chart-wrap{ height:200px; max-height:200px; }
    }
    /* pastikan canvas mengikuti container */
    #trendChart{ width:100% !important; height:100% !important; }
  </style>

  <div class="chart-wrap">
    <canvas id="trendChart"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const labels = @json($labels);
  const appts  = @json($appointmentsDaily);
  const emerg  = @json($emergenciesDaily);

  const ctx = document.getElementById('trendChart').getContext('2d');
  const gradBlue = ctx.createLinearGradient(0,0,0,200);
  gradBlue.addColorStop(0,'rgba(37,99,235,0.45)');
  gradBlue.addColorStop(1,'rgba(37,99,235,0.05)');
  const gradRed = ctx.createLinearGradient(0,0,0,200);
  gradRed.addColorStop(0,'rgba(239,68,68,0.55)');
  gradRed.addColorStop(1,'rgba(239,68,68,0.06)');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels,
      datasets: [
        { label: 'Janji Temu', data: appts, tension:.35, fill:true,
          backgroundColor: gradBlue, borderColor:'#2563eb', borderWidth:2, pointRadius:2.5, pointBackgroundColor:'#2563eb' },
        { label: 'Emergency', data: emerg, tension:.35, fill:true,
          backgroundColor: gradRed, borderColor:'#ef4444', borderWidth:2, pointRadius:2.5, pointBackgroundColor:'#ef4444' },
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,           // <- pakai tinggi .chart-wrap
      layout: { padding: 6 },
      scales: {
        y: {
          beginAtZero: true,
          grid: { color: 'rgba(148,163,184,.15)' },
          ticks: { font: { size: 11 } }
        },
        x: {
          grid: { display:false },
          ticks: { font: { size: 11 } }
        }
      },
      plugins: {
        legend: { labels: { boxWidth:10, boxHeight:10, usePointStyle:true, font:{ size: 12 } } },
        tooltip: { backgroundColor:'#111827', titleColor:'#fff', bodyColor:'#e5e7eb', padding:10, displayColors:false }
      }
    }
  });
</script>
@endsection
