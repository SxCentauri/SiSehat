<?php
// 1) create_queues_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained('appointments')->cascadeOnDelete();
            $table->unsignedInteger('queue_number');
            $table->string('status', 20)->default('waiting'); // waiting|called|served|skipped|cancelled
            $table->date('scheduled_date')->index();
            $table->timestamps();

            $table->unique(['appointment_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
