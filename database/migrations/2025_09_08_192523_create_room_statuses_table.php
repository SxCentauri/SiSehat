<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Nama ruangan
            $table->enum('status', ['kosong','terisi','maintenance'])->default('kosong');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_statuses');
    }
};
