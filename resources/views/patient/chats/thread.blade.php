<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat dengan {{ $doctor->name }} - MediCare</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    :root{
      --primary:#2563eb; --secondary:#1e40af; --text:#1f2937; --muted:#6b7280;
      --white:#fff; --bg:#f8fafc; --light:#eff6ff; --shadow:0 10px 25px rgba(37,99,235,.08);
    }
    body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text)}
    .container{max-width:1000px;margin:0 auto;padding:24px 20px}
    .header{display:flex;align-items:center;gap:.75rem;background:var(--white);box-shadow:var(--shadow);border-radius:12px;padding:1rem 1.2rem;margin-bottom:12px}
    .ava{width:44px;height:44px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--secondary));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800}
    .title{font-weight:800}
    .card{background:var(--white);box-shadow:var(--shadow);border-radius:12px;padding:12px}
    .chat{height:430px;overflow:auto;padding:10px;background:var(--light);border-radius:10px}
    .msg{display:flex;margin-bottom:10px}
    .msg .bub{max-width:72%;padding:10px 12px;border-radius:12px;background:#fff}
    .me{justify-content:flex-end}
    .me .bub{background:var(--primary);color:#fff;border-top-right-radius:6px}
    .other .bub{background:#fff;border-top-left-radius:6px}
    .time{font-size:.8rem;color:#e2e8f0;margin-top:2px}
    .input{display:flex;gap:.6rem;margin-top:10px}
    .input input{flex:1;border:1px solid #e5e7eb;border-radius:10px;padding:.75rem .9rem;outline:none;background:#fff}
    .btn{border:none;background:var(--primary);color:#fff;border-radius:10px;padding:.7rem 1rem;font-weight:700;display:inline-flex;align-items:center;gap:.4rem}
    .btn:hover{filter:brightness(.96)}
  </style>
</head>
<body>
  @include('layouts.medicare')

  <main class="container">
    <div class="header">
      <div class="ava">{{ strtoupper(mb_substr($doctor->name,0,1)) }}</div>
      <div>
        <div class="title">Chat dengan {{ $doctor->name }}</div>
        <div style="font-size:.9rem;color:var(--muted)">Konsultasi & tindak lanjut</div>
      </div>
    </div>

    <div class="card">
      <div id="chatBox" class="chat">
        @forelse($messages as $m)
          @php $isMe = $m->sender_type !== 'doctor'; @endphp
          <div class="msg {{ $isMe ? 'me' : 'other' }}">
            <div class="bub">
              <div style="font-weight:700;margin-bottom:4px;">
                {{ $isMe ? 'Saya' : $doctor->name }}
                <span class="time">{{ $m->created_at->format('d M Y H:i') }}</span>
              </div>
              <div>{{ $m->message }}</div>
            </div>
          </div>
        @empty
          <div style="text-align:center;color:var(--muted);padding:18px 8px;">Belum ada pesan. Kirim pesan pertama.</div>
        @endforelse
      </div>

      <form class="input" method="POST" action="{{ route('patient.chats.store', $doctor) }}">
        @csrf
        <input name="message" placeholder="Tulis pesan..." autocomplete="off" required>
        <button class="btn" type="submit"><i class="fa-solid fa-paper-plane"></i> Kirim</button>
      </form>
    </div>
  </main>

  <script>
    // autoscroll ke bawah
    const box=document.getElementById('chatBox'); if(box){ box.scrollTop=box.scrollHeight; }
  </script>
</body>
</html>
