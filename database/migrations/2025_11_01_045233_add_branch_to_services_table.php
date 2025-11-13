<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom branch ke tabel services.
     */
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Tambahkan kolom ENUM setelah id atau sesuai posisi yang kamu mau
            $table->enum('branch', ['Semarang', 'Slawi', 'Tegal', 'Pekalongan', 'Kediri'])
                  ->after('id')
                  ->nullable()
                  ->comment('Menunjukkan cabang mana case ini dibuat');
        });
    }

    /**
     * Hapus kolom branch saat rollback.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('branch');
        });
    }
};
