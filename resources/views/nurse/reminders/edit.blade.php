


<div class="container">
    <h2>✏️ Edit Reminder Obat</h2>

    <form action="{{ route('nurse.reminders.update', $reminder->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Pasien:</label><br>
        <input type="text" name="patient_name" value="{{ $reminder->patient_name }}" required><br><br>

        <label>Nama Obat:</label><br>
        <input type="text" name="medication" value="{{ $reminder->medication }}" required><br><br>

        <label>Dosis:</label><br>
        <input type="text" name="dosage" value="{{ $reminder->dosage }}" required><br><br>

        <label>Waktu (HH:MM):</label><br>
        <input type="time" name="time" value="{{ $reminder->time }}" required><br><br>

        <label>Catatan:</label><br>
        <textarea name="notes">{{ $reminder->notes }}</textarea><br><br>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('nurse.reminders.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

