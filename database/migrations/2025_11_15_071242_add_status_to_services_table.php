<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->enum('status', [
                'new',
                'repair progress',
                'quotation request',
                'cancel repair',
                'finish repair'
            ])->default('new')->after('received_date'); // taruh di belakang received_date
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
