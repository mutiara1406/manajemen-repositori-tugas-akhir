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
        Schema::table('chat_konsultasis', function (Blueprint $table) {
            if (!Schema::hasColumn('chat_konsultasis', 'file_attachment')) {
                $table->string('file_attachment')->nullable()->after('pesan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chat_konsultasis', function (Blueprint $table) {
            $table->dropColumn('file_attachment');
        });
    }
};
