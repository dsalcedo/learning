<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_ordenes', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uid');
            $table->integer('usuario_id')->unsigned();
            $table->integer('suscripcion_id')->unsigned();
            $table->smallInteger('monto')->unsigned();
            $table->string('uid_transaccion')->nullable();
            $table->enum('estado_interno', ['pendiente', 'rechazado', 'cancelado', 'pagado', 'rembolsado'])->default('pendiente');
            $table->enum('metodo_pago', ['oxxo', 'tarjeta', 'spei', 'cortesia']);
            $table->enum('emisor', ['visa', 'master_card', 'american_express', 'spei', 'oxxo', 'cortesia']);
            $table->enum('estado_pago', ['pending_payment','payment_pending', 'declined', 'expired', 'paid', 'refunded', 'partially_refunded', 'charged_back', 'pre_authorized', 'voided'])->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('suscripcion_id')->references('id')->on('suscripciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario_ordenes');
    }
}
