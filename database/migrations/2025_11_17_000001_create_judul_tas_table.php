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
        Schema::create('judul_tas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->enum('peminatan', ['sistem_informasi', 'sistem_cerdas', 'rekayasa_perangkat_lunak', 'jaringan_komputer']);
            $table->enum('arah_profesi', ['ilmuan', 'wirausaha', 'professional']);
            $table->year('angkatan'); // e.g., 2020, 2021, 2022
            $table->string('nama_penulis')->nullable();
            $table->string('nim_penulis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judul_tas');
    }
};
