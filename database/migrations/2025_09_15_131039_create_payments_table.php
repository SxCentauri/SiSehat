<?php
// 4) create_payments_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained('invoices')->cascadeOnDelete();
            $table->string('provider', 50)->nullable(); // ex: Midtrans, Xendit
            $table->string('method', 30)->nullable();   // qris|va|ewallet
            $table->string('external_id')->nullable()->index();
            $table->string('qr_ref')->nullable();
            $table->string('qr_url')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('status', 20)->default('pending'); // pending|paid|failed|expired
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index(['status','provider']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};