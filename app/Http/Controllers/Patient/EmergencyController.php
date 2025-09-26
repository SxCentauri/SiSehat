<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\EmergencyResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmergencyController extends Controller
{
    /**
     * Menampilkan riwayat laporan darurat milik pasien.
     */
    public function index()
    {
        $emergencies = EmergencyResponse::where('patient_id', Auth::id())
            ->with(['doctor', 'room']) // Eager load relasi untuk menampilkan detail penanganan
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('patient.emergencies.index', compact('emergencies'));
    }

    /**
     * Menampilkan formulir untuk membuat laporan darurat baru.
     */
    public function create()
    {
        return view('patient.emergencies.create');
    }

    /**
     * Menyimpan laporan darurat baru ke database dan melakukan redirect.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
            'level' => 'required|in:low,medium,high,critical',
        ]);

        EmergencyResponse::create([
            'patient_id' => Auth::id(),
            'description' => $request->input('description'),
            'level' => $request->input('level'),
            'status' => 'pending', // Status awal selalu pending
        ]);

        return redirect()->route('patient.emergencies.index')->with('success', 'Laporan darurat Anda berhasil dikirim. Tim kami akan segera merespons.');
    }
}

