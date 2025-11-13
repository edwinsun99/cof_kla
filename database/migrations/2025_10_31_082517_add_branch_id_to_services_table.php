<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Tambahkan kolom branch_id
            $table->foreignId('branch_id')
                  ->nullable() // bisa kosong untuk case lama
                  ->after('id') // letakkan setelah kolom id (optional)
                  ->constrained('branches') // relasi ke tabel branches
                  ->nullOnDelete(); // kalau cabang dihapus, set NULL
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // rollback jika migrasi dibatalkan
            $table->dropForeign(['branch_id']);
            $table->dropColumn('branch_id');
        });
    }
};
