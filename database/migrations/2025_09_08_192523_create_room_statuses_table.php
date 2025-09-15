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
            $table->string('name'); // Room name
            $table->enum('status', ['available','occupied','maintenance'])->default('available');
            $table->integer('capacity')->default(value: 0);
            $table->integer('occupied')->default(value: 0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_statuses');
    }
};
