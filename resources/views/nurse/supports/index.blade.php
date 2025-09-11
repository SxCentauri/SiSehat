@extends('layouts.medicare')
@section('title','Dukungan untuk Dokter')

@section('content')
<div class="container">
  <h2>📋 Daftar Dukungan untuk Dokter</h2>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div style="margin-bottom: 15px;">
    <a href="{{ route('nurse.supports.create') }}" class="btn btn-primary">+ Tambah Dukungan</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Dokter</th>
        <th>Permintaan</th>
        <th>Status</th>
        <th>Dibuat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($supports as $support)
        <tr>
          <td>{{ $support->doctor_name }}</td>
          <td>{{ $support->request }}</td>
          <td>
            <span class="badge 
              @if($support->status == 'pending') bg-warning 
              @elseif($support->status == 'in-progress') bg-info 
              @else bg-success @endif">
              {{ ucfirst($support->status) }}
            </span>
          </td>
          <td>{{ $support->created_at->format('d M Y H:i') }}</td>
          <td>
            <a href="{{ route('nurse.supports.show', $support->id) }}" class="btn btn-sm btn-info">Detail</a>
            <a href="{{ route('nurse.supports.edit', $support->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('nurse.supports.destroy', $support->id) }}" method="POST" style="display:inline;">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus permintaan ini?')">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5">Belum ada permintaan dukungan untuk dokter.</td></tr>
      @endforelse
    </tbody>
  </table>

  {{ $supports->links() }}
</div>
@endsection
