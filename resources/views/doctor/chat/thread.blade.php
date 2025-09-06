@extends('layouts.medicare')
@section('title','Chat Pasien')

@section('content')
  <div class="card">
    <div class="section-title">
      <i class="fa-solid fa-comments"></i>
      <h3>Chat dengan {{ $patient->name ?? 'Pasien #'.$patient->id }}</h3>
    </div>

    <div class="chat-box" id="chatBox">
      @forelse($messages as $m)
        <div class="msg {{ $m->sender_type === 'doctor' ? 'doctor' : 'patient' }}">
          <div class="bubble">
            <strong>{{ $m->sender_type === 'doctor' ? 'Dokter' : 'Pasien' }}</strong><br>
            {!! nl2br(e($m->message)) !!}
            <time>{{ $m->created_at->format('d M Y H:i') }}</time>
          </div>
        </div>
      @empty
        <p class="text-muted">Belum ada pesan.</p>
      @endforelse
    </div>

    <form method="POST" action="{{ route('doctor.chat.send', $patient) }}" style="margin-top:10px">
      @csrf
      <div class="field">
        <label>Tulis Pesan</label>
        <textarea name="message" rows="3" required></textarea>
        @error('message') <small style="color:#b91c1c">{{ $message }}</small> @enderror
      </div>
      <div class="actions">
        <button class="btn" type="submit"><i class="fa-solid fa-paper-plane"></i> Kirim</button>
        <a class="btn btn-outline" href="{{ route('doctor.dashboard') }}">Kembali</a>
      </div>
    </form>
  </div>
@endsection

@section('scripts')
<script>
  const box = document.getElementById('chatBox');
  if (box) { box.scrollTop = box.scrollHeight; }
</script>
@endsection
