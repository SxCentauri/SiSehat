<?php
// 3) create_invoices_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->morphs('billable'); // appointment, encounter, etc.
            $table->foreignId('patient_id')->nullable()->constrained('patients')->nullOnDelete();
            $table->decimal('amount', 12, 2);
            $table->string('currency', 10)->default('IDR');
            $table->string('status', 20)->default('unpaid'); // unpaid|paid|void
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->index(['status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
