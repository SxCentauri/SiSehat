<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('doctor_id')->constrained('users')->cascadeOnDelete();
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed', 'canceled'])->default('pending');
            $table->string('reason')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->index(['doctor_id', 'date', 'time']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
