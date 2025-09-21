<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function index()
    {
        $items = Prescription::with('items')
            ->where('patient_id', Auth::id())
            ->orderByDesc('created_at')->paginate(10);

        return view('patient.prescriptions.index', compact('items'));
    }

    public function show(Prescription $rx)
    {
        abort_unless($rx->patient_id === Auth::id(), 403);
        $rx->load('items');
        return view('patient.prescriptions.show', compact('rx'));
    }

    // Buat invoice dari resep dan arahkan ke pembayaran
    public function checkout(Prescription $rx)
    {
        abort_unless($rx->patient_id === Auth::id(), 403);

        // hitung total harga
        $amount = $rx->items->sum(fn($i) => $i->price * $i->quantity);

        $invoice = Invoice::create([
            'reference'   => 'INV-' . now()->format('YmdHis') . '-' . $rx->id,
            'billable_type' => Prescription::class,
            'billable_id' => $rx->id,
            'patient_id'  => Auth::id(),
            'amount'      => $amount,
            'status'      => 'unpaid',
            'issued_at'   => now(),
        ]);

        return redirect()->route('patient.payments.show', $invoice);
    }
}
