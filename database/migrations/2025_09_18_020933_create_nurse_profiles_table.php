<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_nurse_profiles_table.php

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
        Schema::create('nurse_profiles', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Kolom spesifik untuk profil perawat
            $table->string('department')->nullable()->comment('Contoh: ICU, UGD, Rawat Inap');
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurse_profiles');
    }
};
