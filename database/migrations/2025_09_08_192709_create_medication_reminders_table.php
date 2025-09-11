<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medication_reminders', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');   // Pasien yang diberi obat
            $table->string('medication');     // Nama obat
            $table->string('dosage')->nullable(); // Dosis
            $table->time('time');             // Jam pemberian obat
            $table->enum('status', ['pending','done'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medication_reminders');
    }
};
