<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('lognote', function (Blueprint $table) {
        $table->id();
     // ubah jadi varchar(255)
        $table->string('cof_id', 255); // bukan lagi unsignedBigInteger
        $table->string('un', 255);     // bukan lagi unsignedBigInteger
        $table->text('logdesc');
        $table->timestamps();

        // Relasi
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lognote');
    }
};
