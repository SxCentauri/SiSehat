<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DoctorSupportController extends Controller
{
    /**
     * Menampilkan daftar permintaan dukungan yang ditujukan kepada dokter.
     */
    public function index(): View
    {
        $doctorId = Auth::id();

        $supports = DoctorSupport::with(['perawat', 'patient'])
                                  ->where('dokter_id', $doctorId)
                                  ->latest()
                                  ->paginate(10);

        return view('doctor.supports.index', compact('supports'));
    }

    /**
     * Menampilkan detail permintaan dan form untuk merespons.
     * Juga mengubah status menjadi 'Dilihat' jika masih 'Terkirim'.
     */
    public function show(DoctorSupport $support): View
    {
        // Pastikan dokter hanya bisa melihat permintaan untuknya
        if ($support->dokter_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
        }

        // Jika status masih 'Terkirim', ubah menjadi 'Dilihat'
        if ($support->status === 'Terkirim') {
            $support->update(['status' => 'Dilihat']);
        }

        return view('doctor.supports.show', compact('support'));
    }

    /**
     * Menyimpan respons dokter dan menyelesaikan permintaan.
     */
    public function update(Request $request, DoctorSupport $support): RedirectResponse
    {
        // Pastikan dokter hanya bisa merespons permintaan untuknya
        if ($support->dokter_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
        }

        $validated = $request->validate([
            'respon_dokter' => 'required|string',
        ]);

        $support->update([
            'respon_dokter' => $validated['respon_dokter'],
            'status' => 'Selesai', // Langsung ubah status menjadi Selesai
        ]);

        return redirect()->route('doctor.supports.index')->with('success', 'Respons berhasil dikirim dan permintaan telah diselesaikan.');
    }
}
