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
        Schema::create('pengajuan_juduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_mahasiswa');
            $table->string('nim_mahasiswa');
            $table->string('judul');
            $table->enum('peminatan', ['sistem_informasi', 'sistem_cerdas', 'rekayasa_perangkat_lunak', 'jaringan_komputer']);
            $table->enum('arah_profesi', ['ilmuan', 'wirausaha', 'professional']);
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_juduls');
    }
};
