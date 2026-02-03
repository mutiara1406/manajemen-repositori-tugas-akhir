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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('name');
            $table->string('nim')->nullable()->unique()->after('email');
            $table->string('nip')->nullable()->unique()->after('nim');
            $table->enum('role', ['mahasiswa', 'dosen', 'admin'])->default('mahasiswa')->after('nip');
            
            // Kolom untuk mahasiswa
            $table->foreignId('dosen_pembimbing_id')->nullable()->after('role');
            $table->string('judul_ta')->nullable()->after('dosen_pembimbing_id');
            $table->integer('progress')->default(0)->after('judul_ta');
            $table->enum('tahap_ta', ['proposal', 'bab1', 'bab2', 'bab3', 'bab4', 'bab5', 'selesai'])->default('proposal')->after('progress');
            $table->enum('status_ta', ['pending', 'aktif', 'selesai'])->default('pending')->after('tahap_ta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'nim', 'nip', 'role', 'dosen_pembimbing_id', 'judul_ta', 'progress', 'tahap_ta', 'status_ta']);
        });
    }
};
