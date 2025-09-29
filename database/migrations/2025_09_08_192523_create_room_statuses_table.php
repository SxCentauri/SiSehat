<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('room_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();               // contoh: A-101
            $table->string('name');                           // nama ruangan
            $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
            $table->unsignedInteger('capacity')->default(0);  // total kapasitas
            $table->unsignedInteger('occupied')->default(0);  // jumlah terisi
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_statuses');
    }
};
