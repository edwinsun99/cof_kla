<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'un')) {
                $table->renameColumn('un', 'username');
            }

            if (Schema::hasColumn('users', 'pw')) {
                $table->renameColumn('pw', 'password');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'username')) {
                $table->renameColumn('username', 'un');
            }

            if (Schema::hasColumn('users', 'password')) {
                $table->renameColumn('password', 'pw');
            }
        });
    }
};
