<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Provider pembayaran, mis. "manual", "xendit", "midtrans"
            if (!Schema::hasColumn('payments', 'provider')) {
                $table->string('provider', 50)->nullable();
            }

            // Metode, mis. "qris", "va", "card"
            if (!Schema::hasColumn('payments', 'method')) {
                $table->string('method', 30)->nullable();
            }

            // ID eksternal dari gateway (kalau ada)
            if (!Schema::hasColumn('payments', 'external_id')) {
                $table->string('external_id', 100)->nullable()->index();
            }

            // Referensi QR dan URL gambar QR
            if (!Schema::hasColumn('payments', 'qr_ref')) {
                $table->string('qr_ref', 100)->nullable()->index();
            }
            if (!Schema::hasColumn('payments', 'qr_url')) {
                $table->string('qr_url', 255)->nullable();
            }

            // Kadaluarsa QR dan waktu pelunasan
            if (!Schema::hasColumn('payments', 'qr_expires_at')) {
                $table->timestamp('qr_expires_at')->nullable();
            }
            if (!Schema::hasColumn('payments', 'paid_at')) {
                $table->timestamp('paid_at')->nullable();
            }

            // Metadata bebas (JSON)
            if (!Schema::hasColumn('payments', 'meta')) {
                $table->json('meta')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Drop hanya kolom yang ada
            $cols = [];
            foreach (
                [
                    'provider',
                    'method',
                    'external_id',
                    'qr_ref',
                    'qr_url',
                    'qr_expires_at',
                    'paid_at',
                    'meta',
                ] as $col
            ) {
                if (Schema::hasColumn('payments', $col)) {
                    $cols[] = $col;
                }
            }
            if (!empty($cols)) {
                $table->dropColumn($cols);
            }
        });
    }
};
