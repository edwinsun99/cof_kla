<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // 🧠 Kolom sesuai permintaan
            $table->string('un')->unique();     // Username
            $table->string('email')->unique();  // Email
            $table->string('pw');               // Password
            $table->enum('role', ['MASTER', 'CS'])->default('CS'); // Role

            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
