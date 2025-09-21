<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat Dokter - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    :root{
      --primary:#2563eb; --secondary:#1e40af; --accent:#60a5fa;
      --text:#1f2937; --muted:#6b7280; --bg:#f8fafc; --white:#fff;
      --light:#eff6ff; --light2:#dbeafe; --radius:12px;
      --shadow:0 10px 25px rgba(37,99,235,.08); --shadow2:0 15px 35px rgba(37,99,235,.12);
    }
    body{font-family:'Inter',sans-serif;color:var(--text);background:var(--bg);min-height:100vh;line-height:1.6}
    a{text-decoration:none;color:inherit}
    .container{max-width:1200px;margin:0 auto;padding:24px 20px}

    .page-header{display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap;background:var(--white);padding:1.25rem 1.5rem;border-radius:var(--radius);box-shadow:var(--shadow);margin-bottom:1.25rem}
    .page-title{display:flex;align-items:center;gap:.75rem;font-size:1.6rem;font-weight:800;color:var(--secondary)}
    .page-title i{color:var(--primary);background:var(--light);padding:.6rem;border-radius:10px}

    .search{position:relative;max-width:360px;width:100%}
    .search i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--muted)}
    .search input{width:100%;padding:.8rem .9rem .8rem 2.6rem;border:1px solid #e5e7eb;border-radius:10px;background:var(--light);outline:none}
    .search input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(96,165,250,.2)}

    .section{background:var(--white);border-radius:var(--radius);box-shadow:var(--shadow);padding:1rem 1rem 1.2rem;margin-top:1rem}
    .section .h3{display:flex;align-items:center;gap:.6rem;margin:.25rem 0 1rem 0;font-weight:800}
    .section .h3 i{color:var(--primary)}

    /* list cards (mobile) */
    .list{display:grid;gap:.75rem}
    .item{display:flex;align-items:center;padding:1rem;background:var(--white);border-radius:var(--radius);box-shadow:var(--shadow);transition:.2s;border-left:4px solid transparent}
    .item:hover{transform:translateY(-2px);box-shadow:var(--shadow2);border-left-color:var(--primary)}
    .ava{width:52px;height:52px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--secondary));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;margin-right:.9rem;flex-shrink:0}
    .info{flex:1;min-width:0}
    .name{font-weight:700;margin-bottom:2px}
    .last{color:var(--muted);font-size:.92rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .meta{display:flex;flex-direction:column;align-items:flex-end;gap:.35rem;color:var(--muted);font-size:.86rem}
    .badge{background:#fee2e2;color:#991b1b;border-radius:999px;padding:.25rem .55rem;font-weight:700;font-size:.75rem}

    /* table (desktop) */
    .table-wrap{display:none}
    @media(min-width:1024px){
      .list{display:none}
      .table-wrap{display:block;background:var(--white);border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
      table{width:100%;border-collapse:collapse}
      thead{background:var(--light2)}
      th,td{padding:1rem 1.1rem;border-bottom:1px solid #eef2f7;text-align:left}
      tbody tr:hover{background:var(--light)}
      .actions{display:flex;gap:.6rem}
      .btn{display:inline-flex;align-items:center;gap:.4rem;border-radius:8px;padding:.5rem .9rem;font-weight:600;font-size:.9rem;border:1px solid #e5e7eb}
      .btn-primary{background:var(--primary);color:#fff;border-color:var(--primary)}
      .btn-primary:hover{filter:brightness(.95)}
      .btn-outline{background:#fff}
    }
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="page-header">
      <h1 class="page-title"><i class="fa-solid fa-comments"></i> Chat Dokter</h1>
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" id="search" placeholder="Cari dokter...">
      </div>
    </div>

    {{-- === Terbaru (dokter yang pernah di-chat) === --}}
    <section class="section">
      <div class="h3"><i class="fa-solid fa-clock-rotate-left"></i><span>Terbaru</span></div>

      @if(($recentDoctors ?? collect())->isEmpty())
        <p class="last" style="text-align:center;margin:.25rem 0 0 0;">Belum ada riwayat percakapan.</p>
      @else
        {{-- mobile cards --}}
        <div class="list" id="recentList">
          @foreach($recentDoctors as $d)
            @php $un = (int)($unread[$d->id] ?? 0); @endphp
            <a href="{{ route('patient.chats.show', $d) }}" class="item">
              <div class="ava">{{ strtoupper(mb_substr($d->name,0,1)) }}</div>
              <div class="info">
                <div class="name">{{ $d->name }}</div>
                <div class="last">Tap untuk lanjutkan percakapan</div>
              </div>
              <div class="meta">
                @if($un>0)<span class="badge">{{ $un }}</span>@endif
              </div>
            </a>
          @endforeach
        </div>

        {{-- desktop table --}}
        <div class="table-wrap">
          <table id="recentTable">
            <thead><tr><th>Dokter</th><th>Belum dibaca</th><th style="width:1%;">Aksi</th></tr></thead>
            <tbody>
              @foreach($recentDoctors as $d)
                @php $un = (int)($unread[$d->id] ?? 0); @endphp
                <tr>
                  <td>
                    <div style="display:flex;align-items:center;gap:.7rem">
                      <div class="ava" style="width:40px;height:40px;font-size:.95rem">{{ strtoupper(mb_substr($d->name,0,1)) }}</div>
                      <div>{{ $d->name }}</div>
                    </div>
                  </td>
                  <td>@if($un>0)<span class="badge">{{ $un }} pesan</span>@else <span class="last">0</span>@endif</td>
                  <td class="actions">
                    <a class="btn btn-primary" href="{{ route('patient.chats.show', $d) }}">
                      <i class="fa-solid fa-message"></i> Buka Chat
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </section>

    {{-- === Semua Dokter (mulai chat baru) === --}}
    <section class="section">
      <div class="h3"><i class="fa-solid fa-user-doctor"></i><span>Semua Dokter</span></div>

      @php $listAll = $allDoctors ?? $doctors ?? collect(); @endphp
      @if($listAll->isEmpty())
        <p class="last" style="text-align:center;margin:.25rem 0 0 0;">Belum ada dokter terdaftar.</p>
      @else
        <div class="list" id="allList">
          @foreach($listAll as $d)
            <a href="{{ route('patient.chats.show', $d) }}" class="item">
              <div class="ava">{{ strtoupper(mb_substr($d->name,0,1)) }}</div>
              <div class="info">
                <div class="name">{{ $d->name }}</div>
                <div class="last">Mulai chat</div>
              </div>
              <div class="meta"></div>
            </a>
          @endforeach
        </div>

        <div class="table-wrap">
          <table id="allTable">
            <thead><tr><th>Nama</th><th style="width:1%;">Aksi</th></tr></thead>
            <tbody>
              @foreach($listAll as $d)
                <tr>
                  <td>
                    <div style="display:flex;align-items:center;gap:.7rem">
                      <div class="ava" style="width:40px;height:40px;font-size:.95rem">{{ strtoupper(mb_substr($d->name,0,1)) }}</div>
                      <div>{{ $d->name }}</div>
                    </div>
                  </td>
                  <td class="actions">
                    <a class="btn btn-outline" href="{{ route('patient.chats.show', $d) }}">
                      <i class="fa-solid fa-message"></i> Mulai Chat
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </section>
  </main>

  <script>
    // filter nama dokter (mobile & desktop)
    const q = document.getElementById('search');
    function filterList(listSelector, textSelector){
      document.querySelectorAll(listSelector).forEach(el=>{
        const name = el.querySelector(textSelector)?.textContent?.toLowerCase() || '';
        el.style.display = (!q.value || name.includes(q.value.toLowerCase())) ? '' : 'none';
      });
    }
    function filterTable(tableSelector){
      document.querySelectorAll(tableSelector+' tbody tr').forEach(tr=>{
        const name = tr.querySelector('td div:last-child')?.textContent?.toLowerCase() || '';
        tr.style.display = (!q.value || name.includes(q.value.toLowerCase())) ? '' : 'none';
      });
    }
    q?.addEventListener('input', ()=>{
      filterList('#recentList .item','.name');
      filterList('#allList .item','.name');
      filterTable('#recentTable');
      filterTable('#allTable');
    });
  </script>
</body>
</html>
