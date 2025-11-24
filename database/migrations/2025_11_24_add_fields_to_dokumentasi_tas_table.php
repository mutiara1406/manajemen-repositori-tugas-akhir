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
        Schema::table('dokumentasi_tas', function (Blueprint $table) {
            // Tambah field yang belum ada dengan conditional check
            if (!Schema::hasColumn('dokumentasi_tas', 'jenis_ta')) {
                $table->string('jenis_ta')->default('Skripsi')->after('nim_penulis');
            }
            if (!Schema::hasColumn('dokumentasi_tas', 'dosen_pembimbing')) {
                $table->string('dosen_pembimbing')->nullable()->after('peminatan');
            }
            if (!Schema::hasColumn('dokumentasi_tas', 'prodi')) {
                $table->string('prodi')->nullable()->after('dosen_pembimbing');
            }
            if (!Schema::hasColumn('dokumentasi_tas', 'date_deposited')) {
                $table->timestamp('date_deposited')->nullable()->after('prodi');
            }
            if (!Schema::hasColumn('dokumentasi_tas', 'last_modified')) {
                $table->timestamp('last_modified')->nullable()->useCurrent()->after('date_deposited');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumentasi_tas', function (Blueprint $table) {
            $table->dropColumn(['jenis_ta', 'dosen_pembimbing', 'prodi', 'date_deposited', 'last_modified']);
        });
    }
};
