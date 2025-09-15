<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Praktek - MediCare</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('../css/doctor/schedul.css') }}">
</head>
<body>
  @include('layouts.medicare')

  <div class="container">
    @if(session('ok'))
      <div class="flash">
        <i class="fa-solid fa-circle-check"></i> {{ session('ok') }}
      </div>
    @endif

    @php $days=['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']; @endphp

    <div class="grid grid-2">
      <!-- Form Tambah Jadwal -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-plus-circle"></i>
          <h3>Tambah Jadwal Praktek</h3>
        </div>

        <form method="POST" action="{{ route('doctor.schedules.store') }}">
          @csrf

          <div class="form-group">
            <label class="form-label">Hari Praktek</label>
            <select name="day_of_week" class="form-control" required>
              @foreach($days as $i=>$d)
                <option value="{{ $i }}">{{ $d }}</option>
              @endforeach
            </select>
            @error('day_of_week')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Waktu Mulai</label>
            <input type="time" name="start_time" class="form-control" required>
            @error('start_time')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label class="form-label">Waktu Selesai</label>
            <input type="time" name="end_time" class="form-control" required>
            @error('end_time')
              <span class="error-message">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <div class="checkbox-group">
              <input type="checkbox" name="is_available" id="is_available" value="1" checked>
              <label for="is_available">Jadwal Tersedia</label>
            </div>
          </div>

          <div class="actions">
            <button class="btn btn-primary" type="submit">
              <i class="fa-solid fa-calendar-plus"></i> Tambah Jadwal
            </button>
            <a class="btn btn-outline" href="{{ route('doctor.dashboard') }}">
              <i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard
            </a>
          </div>
        </form>
      </div>

      <!-- Daftar Jadwal -->
      <div class="card">
        <div class="section-title">
          <i class="fa-solid fa-table-list"></i>
          <h3>Daftar Jadwal Praktek</h3>
        </div>

        @if($schedules->isEmpty())
          <div class="empty-state">
            <i class="fa-regular fa-calendar-xmark"></i>
            <h3>Belum Ada Jadwal Praktek</h3>
            <p>Tambahkan jadwal praktek Anda untuk memudahkan pasien membuat janji temu.</p>
          </div>
        @else
          <div class="table-container">
            <table class="table">
              <thead>
                <tr>
                  <th>Hari</th>
                  <th>Jam Praktek</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($schedules as $s)
                  <tr>
                    <td style="font-weight: 600;">{{ $days[$s->day_of_week] ?? $s->day_of_week }}</td>
                    <td>
                      {{ \Carbon\Carbon::parse($s->start_time)->format('H:i') }} -
                      {{ \Carbon\Carbon::parse($s->end_time)->format('H:i') }}
                    </td>
                    <td>
                      <span class="badge {{ $s->is_available ? 'badge-success' : 'badge-warning' }}">
                        {{ $s->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                      </span>
                    </td>
                    <td>
                      <form method="POST" action="{{ route('doctor.schedules.destroy', $s) }}"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">
                          <i class="fa-solid fa-trash"></i> Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="schedule-info" style="margin-top: 20px; padding: 16px; background: var(--extra-light-blue); border-radius: var(--border-radius);">
            <p style="color: var(--text-light); font-size: 14px; margin: 0;">
              <i class="fa-solid fa-info-circle" style="color: var(--primary-color);"></i>
              Total: <strong>{{ $schedules->count() }}</strong> jadwal praktek
            </p>
          </div>
        @endif
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Validasi form - pastikan end time setelah start time
      const form = document.querySelector('form');
      if (form) {
        form.addEventListener('submit', function(e) {
          const startTime = document.querySelector('input[name="start_time"]').value;
          const endTime = document.querySelector('input[name="end_time"]').value;

          if (startTime && endTime && startTime >= endTime) {
            e.preventDefault();
            alert('Waktu selesai harus setelah waktu mulai');
          }
        });
      }

      // Improve time input UX
      const timeInputs = document.querySelectorAll('input[type="time"]');
      timeInputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.showPicker && this.showPicker();
        });
      });
    });
  </script>
</body>
</html>
