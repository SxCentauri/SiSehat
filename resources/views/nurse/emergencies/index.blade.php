@extends('layouts.medicare')
@section('title','Laporan Emergency')

@section('content')
<div class="container">
  <h2>📋 Laporan Emergency</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div style="margin-bottom: 15px;">
    <a href="{{ route('nurse.emergencies.create') }}" class="btn btn-primary">+ Tambah Laporan</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Pasien</th>
        <th>Jenis Emergency</th>
        <th>Status</th>
        <th>Dibuat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($emergencies as $emergency)
        <tr>
          <td>{{ $emergency->patient_name }}</td>
          <td>{{ $emergency->emergency_type }}</td>
          <td>
            <span class="badge 
              @if($emergency->status == 'pending') bg-warning 
              @elseif($emergency->status == 'handled') bg-info 
              @else bg-success @endif">
              {{ ucfirst($emergency->status) }}
            </span>
          </td>
          <td>{{ $emergency->created_at->format('d M Y H:i') }}</td>
          <td>
            <a href="{{ route('nurse.emergencies.show', $emergency->id) }}" class="btn btn-sm btn-info">Detail</a>
            <a href="{{ route('nurse.emergencies.edit', $emergency->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('nurse.emergencies.destroy', $emergency->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus laporan ini?')">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5">Belum ada laporan emergency.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $emergencies->links() }}
</div>
@endsection
