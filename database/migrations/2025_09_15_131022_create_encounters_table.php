<?php
// 2) create_encounters_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable()->constrained('appointments')->nullOnDelete();
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
            $table->foreignId('doctor_id')->nullable()->constrained('doctor_profiles')->nullOnDelete();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();
            $table->string('type', 30)->default('outpatient'); // outpatient|inpatient|telemed
            $table->string('status', 20)->default('open'); // open|closed|cancelled
            $table->timestamps();

            $table->index(['patient_id','doctor_id','status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encounters');
    }
};
