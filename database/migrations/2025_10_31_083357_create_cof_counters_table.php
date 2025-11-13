<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cof_counters', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel branches (setiap cabang punya nomor COF sendiri)
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');

            // Nomor urut terakhir untuk COF per cabang
            $table->integer('current_number')->default(0);

            // Waktu terakhir diperbarui
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cof_counters');
    }
};
