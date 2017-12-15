<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha');
            $table->string('lugar');
            $table->mediumText('descripcion');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_tipoevento')->unsigned();
            $table->integer('id_userregistra')->unsigned();
            $table->integer('id_useractualiza')->unsigned();
            $table->timestamps();
            $table->boolean('estado')->default(true);

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_userregistra')->references('id')->on('users');
            $table->foreign('id_useractualiza')->references('id')->on('users');
            $table->foreign('id_tipoevento')->references('id')->on('tipoeventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
