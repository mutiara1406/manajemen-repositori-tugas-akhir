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
        Schema::create('dokumentasi_tas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nama_penulis');
            $table->string('nim_penulis');
            $table->enum('peminatan', ['sistem_informasi', 'sistem_cerdas', 'rekayasa_perangkat_lunak', 'jaringan_komputer']);
            $table->enum('arah_profesi', ['ilmuan', 'wirausaha', 'professional']);
            $table->year('tahun_selesai');
            $table->text('abstrak_bahasa_indonesia');
            $table->text('abstrak_bahasa_inggris')->nullable();
            $table->string('file_lembar_pengesahan')->nullable(); // path file PDF
            $table->string('file_skripsi_full_text')->nullable(); // path file PDF
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasi_tas');
    }
};
