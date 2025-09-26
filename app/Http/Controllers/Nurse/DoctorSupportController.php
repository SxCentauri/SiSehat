<?php

namespace App\Http\Controllers\Nurse; // Ditempatkan di namespace Nurse

use App\Http\Controllers\Controller;
use App\Models\DoctorSupport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DoctorSupportController extends Controller
{
    /**
     * Menampilkan daftar permintaan dukungan yang dikirim oleh perawat.
     */
    public function index(): View
    {
        $nurseId = Auth::id();

        $supports = DoctorSupport::with(['dokter', 'patient'])
                                  ->where('perawat_id', $nurseId)
                                  ->latest()
                                  ->paginate(10);

        return view('nurse.supports.index', compact('supports'));
    }

    /**
     * Menampilkan formulir untuk membuat permintaan baru.
     */
    public function create(): View
    {
        $doctors = User::where('role', 'doctor')->orderBy('name')->get();
        $patients = User::where('role', 'user')->orderBy('name')->get();

        return view('nurse.supports.create', compact('doctors', 'patients'));
    }

    /**
     * Menyimpan permintaan dukungan baru.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'dokter_id' => 'required|exists:users,id',
            'patient_id' => 'required|exists:users,id',
            'subjek' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $validated['perawat_id'] = Auth::id();

        DoctorSupport::create($validated);

        return redirect()->route('nurse.supports.index')->with('success', 'Permintaan dukungan berhasil dikirim!');
    }

    /**
     * Menampilkan detail satu permintaan dukungan.
     */
    public function show(DoctorSupport $support): View
    {
        // Memastikan perawat hanya bisa melihat permintaannya sendiri
        if ($support->perawat_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES.');
        }

        return view('nurse.supports.show', compact('support'));
    }
}
