<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Emergency - MediCare (Admin)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:#2563eb; --primary-dark:#1e40af; --secondary:#64748b; --success:#10b981;
            --warning:#f59e0b; --danger:#ef4444;
            --bg:#f8fafc; --card-bg:#ffffff; --text:#1f2937; --text-light:#6b7280; --border:#e5e7eb;
            --radius:16px; --shadow:0 10px 25px rgba(0,0,0,.05);
            --gradient:linear-gradient(135deg,var(--primary),var(--primary-dark));
        }
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);line-height:1.6;padding-top:80px}
        .container{max-width:900px;margin:0 auto;padding:0 20px 40px}
        .card{background:var(--card-bg);border-radius:var(--radius);box-shadow:var(--shadow);padding:32px;border:1px solid var(--border);transition:.3s;animation:fadeIn .5s ease-out}
        .card:hover{transform:translateY(-5px);box-shadow:0 15px 35px rgba(0,0,0,.1)}
        @keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
        .header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;flex-wrap:wrap;gap:20px}
        .header-content{display:flex;align-items:center;gap:14px}
        .header i{color:var(--danger);background:#fee2e2;padding:12px;border-radius:12px;min-width:46px;text-align:center;font-size:18px}
        .header h2{font-size:24px;font-weight:700;color:var(--text);margin:0}
        .btn{padding:12px 20px;border-radius:12px;font-weight:600;display:inline-flex;align-items:center;gap:8px;text-decoration:none;border:none;cursor:pointer;transition:.2s;font-size:14px}
        .btn-primary{background:var(--gradient);color:#fff;box-shadow:0 4px 6px rgba(37,99,235,.2)}
        .btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 15px rgba(37,99,235,.3)}
        .btn-secondary{background:#f1f5f9;color:var(--text);border:1px solid var(--border)}
        .btn-secondary:hover{background:#e2e8f0;transform:translateY(-2px)}
        .form-group{margin-bottom:24px}
        .form-label{display:block;margin-bottom:8px;font-weight:600;color:var(--text);font-size:14px}
        .form-textarea,.form-select,.form-input{width:100%;padding:14px 16px;border:1px solid var(--border);border-radius:10px;font-size:14px;font-family:'Inter',sans-serif;transition:.2s;background:#fff}
        .form-textarea{resize:vertical;min-height:140px;line-height:1.5}
        .form-select{appearance:none;background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");background-repeat:no-repeat;background-position:right 16px center;background-size:16px}
        .form-textarea:focus,.form-select:focus,.form-input:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 3px rgba(37,99,235,.1);transform:translateY(-1px)}
        .grid{display:grid;gap:16px}
        .grid-2{grid-template-columns:repeat(2,1fr)}
        .grid-3{grid-template-columns:repeat(3,1fr)}
        @media(max-width:900px){.grid-2,.grid-3{grid-template-columns:1fr}}
        .form-actions{display:flex;gap:12px;margin-top:32px;padding-top:24px;border-top:1px solid var(--border);flex-wrap:wrap}
        .error-message{color:var(--danger);font-size:13px;margin-top:6px;display:flex;align-items:center;gap:6px}
        .form-hint{color:var(--text-light);font-size:13px;margin-top:6px;display:flex;align-items:center;gap:6px}
        .level-low{color:#15803d;background:#f0fdf4}
        .level-medium{color:#d97706;background:#fffbeb}
        .level-high{color:#dc2626;background:#fef2f2}
        .level-critical{color:#be123c;background:#fdf2f8;font-weight:600}
        .level-option{padding:8px 12px;border-radius:6px;margin:4px 0;font-weight:500}
    </style>
</head>
<body>
@include('layouts.medicare')

<main class="container">
    <div class="card">
        <div class="header">
            <div class="header-content">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h2>Tambah Emergency</h2>
            </div>
            <a href="{{ route('admin.emergencies.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>

        @if ($errors->any())
            <div class="form-hint" style="color:#7c2d12;background:#fff7ed;border:1px solid #fed7aa;padding:10px 12px;border-radius:10px">
                <i class="fa-solid fa-circle-exclamation" style="color:#b45309"></i> Periksa kembali inputan di bawah.
            </div>
        @endif

        <form method="POST" action="{{ route('admin.emergencies.store') }}">
            @csrf

            {{-- Pasien + Status --}}
            <div class="grid grid-2" style="margin-top:18px">
                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-user"></i> Pasien</label>
                    <select name="patient_id" class="form-select" required>
                        <option value="">— Pilih Pasien —</option>
                        @foreach($patients as $p)
                            <option value="{{ $p->id }}" @selected(old('patient_id')==$p->id)>{{ $p->name }}</option>
                        @endforeach
                    </select>
                    @error('patient_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-list-check"></i> Status</label>
                    @php $st = old('status','open'); @endphp
                    <select name="status" class="form-select" required>
                        <option value="open" @selected($st==='open')>open</option>
                        <option value="in_progress" @selected($st==='in_progress')>in_progress</option>
                        <option value="resolved" @selected($st==='resolved')>resolved</option>
                    </select>
                    <div class="form-hint"><i class="fa-solid fa-lightbulb"></i> Gunakan <em>in_progress</em> saat penanganan sedang berjalan.</div>
                    @error('status')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="form-group" style="margin-top:2px">
                <label class="form-label"><i class="fa-solid fa-comment-medical"></i> Deskripsi Kejadian</label>
                <textarea name="description" class="form-textarea" placeholder="Jelaskan detail kondisi/kejadian darurat." required>{{ old('description') }}</textarea>
                @error('description')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                <div class="form-hint"><i class="fa-solid fa-lightbulb"></i> Sertakan waktu kejadian, gejala utama, dan lokasi/ruangan jika ada.</div>
            </div>

            {{-- Level (opsi sama seperti pasien) --}}
            <div class="form-group">
                <label class="form-label"><i class="fa-solid fa-triangle-exclamation"></i> Tingkat Kedaruratan</label>
                <select name="level" class="form-select">
                    <option value="">Pilih tingkat kedaruratan…</option>
                    <option value="low"      class="level-low"      @selected(old('level')==='low')>Rendah — butuh saran medis</option>
                    <option value="medium"   class="level-medium"   @selected(old('level')==='medium')>Sedang — perlu perhatian beberapa jam</option>
                    <option value="high"     class="level-high"     @selected(old('level')==='high')>Tinggi — penanganan segera</option>
                    <option value="critical" class="level-critical" @selected(old('level')==='critical')>Kritis — mengancam jiwa</option>
                </select>
                @error('level')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
            </div>

            {{-- Penugasan (opsional) --}}
            <div class="grid grid-3">
                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-user-doctor"></i> Dokter (opsional)</label>
                    <select name="assigned_doctor_id" class="form-select">
                        <option value="">—</option>
                        @foreach($doctors as $d)
                            <option value="{{ $d->id }}" @selected(old('assigned_doctor_id')==$d->id)>{{ $d->name }}</option>
                        @endforeach
                    </select>
                    @error('assigned_doctor_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-user-nurse"></i> Perawat (opsional)</label>
                    <select name="handled_by_nurse_id" class="form-select">
                        <option value="">—</option>
                        @foreach($nurses as $n)
                            <option value="{{ $n->id }}" @selected(old('handled_by_nurse_id')==$n->id)>{{ $n->name }}</option>
                        @endforeach
                    </select>
                    @error('handled_by_nurse_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label"><i class="fa-solid fa-bed"></i> Ruangan (opsional)</label>
                    <select name="assigned_room_id" class="form-select">
                        <option value="">—</option>
                        @foreach($rooms as $r)
                            <option value="{{ $r->id }}" @selected(old('assigned_room_id')==$r->id)>{{ $r->name }} @if(isset($r->capacity,$r->occupied)) (Tersedia: {{ max($r->capacity - $r->occupied, 0) }}/{{ $r->capacity }}) @endif</option>
                        @endforeach
                    </select>
                    @error('assigned_room_id')<div class="error-message"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>@enderror
                </div>
            </div>

            {{-- Aksi --}}
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Emergency
                </button>
                <a href="{{ route('admin.emergencies.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-xmark"></i> Batal
                </a>
            </div>
        </form>
    </div>
</main>

<script>
    // Counter karakter deskripsi seperti di halaman pasien
    (function(){
        const ta = document.querySelector('textarea[name="description"]');
        if(!ta) return;
        const counter = document.createElement('div');
        counter.className = 'form-hint';
        counter.innerHTML = '<i class="fa-solid fa-keyboard"></i> Jumlah karakter: <span id="charCount">0</span>';
        ta.parentNode.appendChild(counter);
        const update = () => document.getElementById('charCount').textContent = ta.value.length;
        ta.addEventListener('input', update); update();
    })();
</script>
</body>
</html>
