@extends('layouts.medicare')
@section('title','Booking Pasien')

@section('content')
  @if(session('ok')) <div class="flash">{{ session('ok') }}</div> @endif

  <div class="card">
    <div class="section-title"><i class="fa-solid fa-list-check"></i><h3>Daftar Booking</h3></div>

    @if($appointments->isEmpty())
      <p class="text-muted">Belum ada booking.</p>
    @else
      <table class="table">
        <thead>
          <tr>
            <th>Tanggal</th><th>Jam</th><th>Pasien</th><th>Status</th><th>Alasan</th><th style="width:260px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($appointments as $a)
            <tr>
              <td>{{ $a->date }}</td>
              <td>{{ \Illuminate\Support\Str::of($a->time)->limit(5,'') }}</td>
              <td>{{ $a->patient->name ?? 'Pasien #'.$a->patient_id }}</td>
              <td>
                @php
                  $color = [
                    'pending'=>'#fde68a','approved'=>'#bfdbfe','rejected'=>'#fecaca',
                    'completed'=>'#bbf7d0','canceled'=>'#fda4af'
                  ][$a->status] ?? '#e5e7eb';
                @endphp
                <span class="badge" style="background: {{ $color }}">{{ ucfirst($a->status) }}</span>
              </td>
              <td>{{ $a->reason }}</td>
              <td class="actions">
                @if($a->status === 'pending')
                  <form method="POST" action="{{ route('doctor.appointments.approve', $a) }}">
                    @csrf <button class="btn" type="submit"><i class="fa-solid fa-check"></i> Approve</button>
                  </form>
                  <form method="POST" action="{{ route('doctor.appointments.reject', $a) }}">
                    @csrf <button class="btn btn-outline" type="submit"><i class="fa-solid fa-xmark"></i> Tolak</button>
                  </form>
                @endif

                @if($a->status === 'approved')
                  <form method="POST" action="{{ route('doctor.appointments.complete', $a) }}">
                    @csrf <button class="btn" type="submit"><i class="fa-solid fa-flag-checkered"></i> Selesai</button>
                  </form>
                  <a class="btn btn-outline" href="{{ route('doctor.records.create', $a) }}"><i class="fa-solid fa-notes-medical"></i> Rekam Medis</a>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div style="margin-top:12px">
        {{ $appointments->links() }}
      </div>
    @endif
  </div>
@endsection
