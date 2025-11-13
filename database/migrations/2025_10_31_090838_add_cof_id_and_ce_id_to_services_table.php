<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        // Schema::table('services', function (Blueprint $table) {
        //      // Tambahkan CE-ID (relasi ke user yang input case)
        //     $table->foreignId('ce_id')->nullable()->constrained('users')->onDelete('set null');
        // });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('cof_id');
            $table->dropForeign(['ce_id']);
            $table->dropColumn('ce_id');
        });
    }
};
