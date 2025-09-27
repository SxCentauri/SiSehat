<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - MediCare Hospital</title>
  @include('admin.partials.style')
  <style>
    /* ekstra kecil utk dashboard */
    .grid{display:grid;gap:20px}
    .grid-kpi{grid-template-columns:repeat(4,1fr)}
    @media (max-width:1024px){.grid-kpi{grid-template-columns:repeat(2,1fr)}}
    @media (max-width:640px){.grid-kpi{grid-template-columns:1fr}}
    .kpi{display:flex;flex-direction:column;align-items:center;gap:10px;text-align:center}
    .kpi .icon{width:56px;height:56px;border-radius:12px;background:var(--grad);display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;margin-bottom:4px}
    .kpi .num{font-size:30px;font-weight:800;color:var(--admin);line-height:1}
    .kpi .label{font-size:13px;color:var(--muted)}
    .btn-block{width:100%;justify-content:center}
    .two-col{grid-template-columns:2fr 1fr}
    @media (max-width:1024px){.two-col{grid-template-columns:1fr}}
    .list{display:flex;flex-direction:column}
    .list .item{display:flex;justify-content:space-between;gap:10px;padding:12px 0;border-bottom:1px solid var(--border);font-size:14px}
    .list .item:last-child{border-bottom:none}
    .mini{font-size:12px;color:var(--muted)}
    .danger{background:#fee2e2;color:#991b1b}
  </style>
</head>
<body>
@include('layouts.medicare')

<main class="container">
  @if(session('success') || session('ok'))
    <div class="alert alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') ?? session('ok') }}</div>
  @endif

  {{-- ===== Header ===== --}}
  <div class="card" style="margin-bottom:14px">
    <div class="header">
      <div class="title">
        <i class="fa-solid fa-user-shield"></i> Dashboard Admin
      </div>
      <div class="mini"><i class="fa-solid fa-calendar-day"></i> {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
    </div>
    <div class="toolbar">
      <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> User Baru</a>
      <a href="{{ route('admin.appointments.create') }}" class="btn btn-outline"><i class="fa-regular fa-calendar-plus"></i> Buat Janji</a>
      <a href="{{ route('admin.room-bookings.create') }}" class="btn btn-outline"><i class="fa-solid fa-bed"></i> Booking Ruangan</a>
      <a href="{{ route('admin.nurse-schedules.create') }}" class="btn btn-outline"><i class="fa-solid fa-user-nurse"></i> Jadwal Perawat</a>
      <a href="{{ route('admin.emergencies.create') }}" class="btn btn-outline"><i class="fa-solid fa-triangle-exclamation"></i> Catat Emergency</a>
    </div>
  </div>

  @php
    $patients = $stats['patients'] ?? 0;
    $doctors  = $stats['doctors'] ?? 0;
    $nurses   = $stats['nurses'] ?? 0;
    $rooms    = $stats['rooms'] ?? 0;

    $emToday  = $stats['emergencies_today'] ?? 0;
    $aptToday = $stats['appointments_today'] ?? 0;
    $bkToday  = $stats['bookings_today'] ?? 0;

    $roomsOccupied = $stats['rooms_occupied'] ?? null;
    $utilPct = ($rooms && $roomsOccupied !== null) ? round(($roomsOccupied/$rooms)*100) : null;

    $usersTot = $patients + $doctors + $nurses;

    $recentAppointments = $recent['appointments'] ?? collect();
    $recentBookings     = $recent['bookings'] ?? collect();
    $recentEmergencies  = $recent['emergencies'] ?? collect();
    $recentSchedules    = $recent['schedules'] ?? collect();
    $schedCnt           = $recentSchedules instanceof \Illuminate\Support\Collection ? $recentSchedules->count() : (is_array($recentSchedules) ? count($recentSchedules) : 0);

    $timeline = collect()
      ->merge($recentAppointments->map(fn($a)=>[
        'time'=>\Carbon\Carbon::parse($a->created_at),
        'icon'=>'fa-calendar-check',
        'label'=>"Janji: ".(optional($a->patient)->name).' → '.(optional($a->doctor)->name),
        'right'=>$a->status
      ]))
      ->merge($recentBookings->map(fn($b)=>[
        'time'=>\Carbon\Carbon::parse($b->created_at),
        'icon'=>'fa-bed',
        'label'=>"Booking: ".(optional($b->room)->name).' — '.(optional($b->patient)->name),
        'right'=>$b->status
      ]))
      ->merge($recentEmergencies->map(fn($e)=>[
        'time'=>\Carbon\Carbon::parse($e->created_at),
        'icon'=>'fa-triangle-exclamation',
        'label'=>"Emergency #{$e->id}: ".\Illuminate\Support\Str::limit($e->description,50),
        'right'=>$e->status,'danger'=>true
      ]))
      ->sortByDesc('time')
      ->take(10);
  @endphp

  {{-- ===== KPI (sesuai daftar permintaan) ===== --}}
  @php
    $emToday  = $stats['emergencies_today'] ?? 0;
    $rooms    = $stats['rooms'] ?? 0;
    $occ      = $stats['rooms_occupied'] ?? null;
    $utilPct  = ($rooms && $occ !== null) ? round(($occ/$rooms)*100) : null;

    $aptToday = $stats['appointments_today'] ?? 0;
    $patients = $stats['patients'] ?? 0;
    $doctors  = $stats['doctors']  ?? 0;
    $nurses   = $stats['nurses']   ?? 0;
    $usersTot = $patients + $doctors + $nurses;
    $bkToday  = $stats['bookings_today'] ?? 0;
    $schedCnt = $recentSchedules instanceof \Illuminate\Support\Collection ? $recentSchedules->count() : (is_array($recentSchedules) ? count($recentSchedules) : 0);
  @endphp

  <section class="grid grid-kpi">
    {{-- 1) Kelola Emergency --}}
    <div class="card kpi" style="border-color:#fecaca">
      <div class="icon" style="background:linear-gradient(135deg,#ef4444,#dc2626)"><i class="fa-solid fa-triangle-exclamation"></i></div>
      <div class="num" style="color:#ef4444">{{ $emToday }}</div>
      <div class="label">Emergency Hari Ini</div>
      <a href="{{ route('admin.emergencies.index') }}" class="btn btn-danger btn-block">
        <i class="fa-solid fa-bolt"></i> Kelola Emergency
      </a>
    </div>

    {{-- 2) Kelola Ruangan --}}
    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-hospital"></i></div>
      <div class="num">{{ $rooms }}</div>
      <div class="label">Total Ruangan</div>
      @if(!is_null($utilPct))
        <div class="row" style="width:100%;align-items:center;gap:10px;margin-top:6px">
          <div style="flex:1;height:10px;background:#eef2f7;border-radius:999px;overflow:hidden">
            <span style="display:block;height:100%;background:var(--grad);width:{{ $utilPct }}%"></span>
          </div>
          <div class="mini">{{ $utilPct }}%</div>
        </div>
        <div class="mini">Terpakai: {{ $occ }}/{{ $rooms }}</div>
      @else
        <div class="mini">Utilisasi: N/A</div>
      @endif
      <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline btn-block" style="margin-top:8px">
        <i class="fa-solid fa-cog"></i> Kelola Ruangan
      </a>
    </div>

    {{-- 3) Kelola Janji Temu --}}
    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-calendar-check"></i></div>
      <div class="num">{{ $aptToday }}</div>
      <div class="label">Janji Temu Hari Ini</div>
      <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline btn-block">
        <i class="fa-solid fa-list"></i> Kelola Janji Temu
      </a>
    </div>

    {{-- 4) Dashboard Statistik --}}
    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-chart-line"></i></div>
      <div class="num">{{ number_format($usersTot + $rooms + $aptToday + $bkToday) }}</div>
      <div class="label">Ringkasan Statistik</div>
      <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-block">
        <i class="fa-solid fa-chart-simple"></i> Lihat Statistik
      </a>
    </div>

    {{-- 5) Kelola Data Pengguna (gabung) --}}
    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-users"></i></div>
      <div class="num">{{ $usersTot }}</div>
      <div class="label">Total Pengguna</div>
      <div class="mini">Pasien: {{ $patients }} • Dokter: {{ $doctors }} • Perawat: {{ $nurses }}</div>
      <a href="{{ route('admin.users.index') }}" class="btn btn-outline btn-block" style="margin-top:8px">
        <i class="fa-solid fa-user-gear"></i> Kelola Pengguna
      </a>
    </div>

    {{-- 6) Booking Room --}}
    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-bed-pulse"></i></div>
      <div class="num">{{ $bkToday }}</div>
      <div class="label">Booking Ruangan Hari Ini</div>
      <a href="{{ route('admin.room-bookings.index') }}" class="btn btn-outline btn-block">
        <i class="fa-solid fa-gear"></i> Kelola Booking
      </a>
    </div>

    {{-- 7) Jadwal Perawat --}}
    <div class="card kpi">
      <div class="icon"><i class="fa-solid fa-user-nurse"></i></div>
      <div class="num">{{ $schedCnt }}</div>
      <div class="label">Jadwal Perawat (terbaru)</div>
      <a href="{{ route('admin.nurse-schedules.index') }}" class="btn btn-outline btn-block">
        <i class="fa-solid fa-calendar-days"></i> Kelola Jadwal
      </a>
    </div>
  </section>

  {{-- ===== Quick Actions + Ringkasan ===== --}}
  <section class="grid two-col" style="margin-top:10px">
    <div class="card">
      <div class="header">
        <div class="title"><i class="fa-solid fa-wand-magic-sparkles"></i> Quick Actions</div>
        <div class="toolbar">
          <input id="quickSearch" type="search" placeholder="Cari di timeline/daftar…">
        </div>
      </div>
      <div class="toolbar" style="gap:8px">
        <a class="btn btn-outline" href="{{ route('admin.appointments.create') }}"><i class="fa-regular fa-calendar-plus"></i> Buat Janji</a>
        <a class="btn btn-outline" href="{{ route('admin.room-bookings.create') }}"><i class="fa-solid fa-bed"></i> Booking Ruangan</a>
        <a class="btn btn-outline" href="{{ route('admin.emergencies.create') }}"><i class="fa-solid fa-triangle-exclamation"></i> Catat Emergency</a>
        <a class="btn btn-outline" href="{{ route('admin.nurse-schedules.create') }}"><i class="fa-solid fa-user-nurse"></i> Jadwal Perawat</a>
        <a class="btn btn-primary" href="{{ route('admin.users.create') }}"><i class="fa-solid fa-user-plus"></i> User Baru</a>
      </div>
    </div>

    <div class="card">
      <div class="header"><div class="title"><i class="fa-solid fa-circle-info"></i> Ringkasan</div></div>
      <div class="list">
        <div class="item"><span>Total Pengguna</span><strong>{{ $usersTot }}</strong></div>
        <div class="item"><span>Emergency Hari Ini</span><span class="badge danger">{{ $emToday }}</span></div>
        <div class="item"><span>Janji Hari Ini</span><span class="badge">{{ $aptToday }}</span></div>
        <div class="item"><span>Booking Hari Ini</span><span class="badge">{{ $bkToday }}</span></div>
      </div>
      <div class="mini" style="margin-top:8px">* Realtime per tanggal hari ini.</div>
    </div>
  </section>

  {{-- ===== Timeline & Daftar Terbaru ===== --}}
  <section class="grid two-col" style="margin-top:10px">
    <div class="card">
      <div class="header"><div class="title"><i class="fa-solid fa-clock-rotate-left"></i> Activity Timeline</div></div>
      <div id="timelineList" class="list">
        @forelse($timeline as $t)
          <div class="item filterable">
            <div>
              <i class="fa-solid {{ $t['icon'] }}" style="color:{{ isset($t['danger'])?'#ef4444':'#2563eb' }}"></i>
              <strong style="margin-left:6px">{{ $t['time']->format('d M H:i') }}</strong>
              <span class="mini">—</span>
              <span>{{ $t['label'] }}</span>
            </div>
            <span class="badge {{ isset($t['danger'])?'danger':'' }}">{{ $t['right'] }}</span>
          </div>
        @empty
          <div class="mini">Tidak ada aktivitas terbaru.</div>
        @endforelse
      </div>
    </div>

    <div class="card">
      <div class="header">
        <div class="title"><i class="fa-solid fa-clipboard-list"></i> Daftar Terbaru</div>
        <a href="{{ route('admin.appointments.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i> Lihat Semua</a>
      </div>
      <div id="recentLists" class="list">
        <div class="item filterable"><div><strong>Janji Terbaru</strong></div></div>
        @forelse($recentAppointments as $a)
          <div class="item filterable">
            <div>{{ $a->date }} {{ $a->time }} — {{ optional($a->patient)->name }} → {{ optional($a->doctor)->name }}</div>
            <span class="badge">{{ $a->status }}</span>
          </div>
        @empty <div class="mini">Tidak ada data janji.</div> @endforelse

        <div class="item filterable" style="border-top:1px dashed var(--border)"><div><strong>Booking Terbaru</strong></div></div>
        @forelse($recentBookings as $b)
          <div class="item filterable">
            <div>{{ optional($b->room)->name }} — {{ optional($b->patient)->name }}
              <span class="mini">({{ \Carbon\Carbon::parse($b->created_at)->format('d M Y H:i') }})</span>
            </div>
            <span class="badge">{{ $b->status }}</span>
          </div>
        @empty <div class="mini">Tidak ada data booking.</div> @endforelse

        <div class="item filterable" style="border-top:1px dashed var(--border)"><div><strong>Emergency Terbaru</strong></div></div>
        @forelse($recentEmergencies as $e)
          <div class="item filterable"><div>#{{ $e->id }} — {{ \Illuminate\Support\Str::limit($e->description, 60) }}</div><span class="badge danger">{{ $e->status }}</span></div>
        @empty <div class="mini">Tidak ada data emergency.</div> @endforelse

        <div class="item filterable" style="border-top:1px dashed var(--border)"><div><strong>Jadwal Perawat Terbaru</strong></div></div>
        @forelse($recentSchedules as $s)
          <div class="item filterable">
            <div>{{ optional($s->nurse)->name }} — {{ $s->day_of_week }}
              <span class="mini">({{ $s->start_time }}–{{ $s->end_time }})</span>
            </div>
          </div>
        @empty <div class="mini">Tidak ada data jadwal.</div> @endforelse
      </div>
    </div>
  </section>
</main>

<script>
  // Quick filter untuk timeline & daftar terbaru
  (function(){
    const input = document.getElementById('quickSearch');
    if (!input) return;
    input.addEventListener('input', e=>{
      const q = e.target.value.toLowerCase();
      document.querySelectorAll('.filterable').forEach(el=>{
        el.style.display = el.textContent.toLowerCase().includes(q) ? '' : 'none';
      });
    });
  })();

  // Pulse kartu emergency jika > 0
  (function(){
    const emergencyCount = {{ $emToday ?? 0 }};
    if (emergencyCount > 0){
      const kpis = document.querySelectorAll('.kpi');
      const emCard = kpis[0]; // kartu emergency posisi pertama
      if (emCard){
        emCard.style.animation = 'pulse 2s infinite';
        const style = document.createElement('style');
        style.textContent = `
          @keyframes pulse{
            0%{transform:translateY(0)}
            50%{transform:translateY(-2px) scale(1.01)}
            100%{transform:translateY(0)}
          }`;
        document.head.appendChild(style);
      }
    }
  })();
</script>
</body>
</html>
