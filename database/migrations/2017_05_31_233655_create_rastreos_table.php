<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRastreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rastreos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('res_sigla');        //sigla del contenedor
            $table->datetime('res_fecha');      //fecha de arribo
            $table->integer('id_movimiento')->unsigned();
            $table->string('res_movimiento');   //Ultimo movimiento del contenedor
            $table->integer('id_localizacion')->unsigned();
            $table->string('res_localizacion'); //localizacion del contenedor
            $table->integer('id_barco')->unsigned();
            $table->string('res_barco');        //barco del arribo
            $table->string('res_numviaje');        //numero de viaje
            $table->integer('user_registra')->unsigned();
            $table->integer('user_actualiza')->unsigned();
            $table->boolean('res_estado')->default(true);
            $table->text('res_observaciones');
            $table->timestamps();

            $table->foreign('id_movimiento')->references('id')->on('movimientos');
            $table->foreign('id_localizacion')->references('id')->on('localizaciones');
            $table->foreign('id_barco')->references('id')->on('barcos');
            $table->foreign('user_registra')->references('id')->on('users');
            $table->foreign('user_actualiza')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rastreos');
    }
}
