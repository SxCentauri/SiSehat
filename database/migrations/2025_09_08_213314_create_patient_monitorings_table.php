<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patient_monitorings', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');   // nama pasien
            $table->string('condition');      // kondisi pasien
            $table->text('notes')->nullable(); // catatan tambahan
            $table->dateTime('recorded_at');  // waktu dicatat
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patient_monitorings');
    }
};
