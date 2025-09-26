<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctor_supports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perawat_id')->constrained('users');
            $table->foreignId('dokter_id')->constrained('users');
            $table->foreignId('patient_id')->constrained('users');
            $table->string('subjek');
            $table->text('deskripsi');
            $table->enum('status', ['Terkirim', 'Dilihat',- 'Diproses', 'Selesai'])->default('Terkirim');
            $table->text('respon_dokter')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctor_supports');
    }
};
