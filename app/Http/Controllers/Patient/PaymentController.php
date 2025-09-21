<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function show(Invoice $invoice)
    {
        // keamanan minimal: invoice milik pasien ini
        abort_unless($invoice->patient_id === auth()->id(), 403);

        $payment = Payment::where('invoice_id', $invoice->id)->first();
        return view('patient.payments.show', compact('invoice', 'payment'));
    }

    // Buat QRIS "dummy/static" (tanpa gateway) agar tidak bentrok integrasi
    public function createQris(Invoice $invoice)
    {
        abort_unless($invoice->patient_id === auth()->id(), 403);

        $payment = Payment::firstOrCreate(
            ['invoice_id' => $invoice->id],
            [
                'provider'   => 'manual',
                'method'     => 'qris',
                'external_id' => 'QR-' . now()->format('YmdHis') . '-' . $invoice->id,
                'qr_ref'     => 'QRREF-' . $invoice->id,
                'qr_url'     => url('/images/sample-qris.png'),
                'amount'     => $invoice->amount,
                'status'     => 'pending',
                'meta'       => ['note' => 'Contoh QR statis untuk demo'],
            ]
        );

        return redirect()->route('patient.payments.show', $invoice);
    }
}
