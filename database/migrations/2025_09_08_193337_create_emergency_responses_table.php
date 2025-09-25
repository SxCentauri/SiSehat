<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emergency_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users')->onDelete('cascade');
            $table->text('description');
            $table->enum('level', ['low', 'medium', 'high', 'critical'])->default('low');
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->foreignId('handled_by_nurse_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('assigned_doctor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('assigned_room_id')->nullable()->constrained('room_statuses')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_responses');
    }
};
