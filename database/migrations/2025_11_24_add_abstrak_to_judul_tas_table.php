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
        Schema::table('judul_tas', function (Blueprint $table) {
            if (!Schema::hasColumn('judul_tas', 'abstrak_bahasa_indonesia')) {
                $table->longText('abstrak_bahasa_indonesia')->nullable()->after('deskripsi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('judul_tas', function (Blueprint $table) {
            $table->dropColumn('abstrak_bahasa_indonesia');
        });
    }
};
