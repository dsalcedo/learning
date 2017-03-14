<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsuariosTableAddPremiumAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->boolean('premium')->default(false)->after('activo');
            $table->boolean('locked')->default(false)->after('activo');
            $table->ipAddress('ip')->nullable()->after('activo');
            $table->timestamp('logged_in_at')->nullable()->after('remember_token');
            $table->timestamp('premium_at')->nullable()->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn(['premium_at','logged_in_at', 'ip', 'premium']);
        });
    }
}
