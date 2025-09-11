<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emergency_responses', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name', 100);
            $table->text('description');
            $table->enum('level', ['low', 'medium', 'high', 'critical'])->default('low');
            $table->enum('status', ['pending', 'handled', 'resolved'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emergency_responses');
    }
};
