<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAguinaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aguinaldos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('agui_tipo_empleado',['PERMANENTE','EVENTUAL']);
            $table->integer('id_empleado')->unsigned();
            $table->integer('agui_meses');
            $table->integer('agui_gestion');
            $table->decimal('agui_sueldo',18,2)->default('0.00');
            $table->decimal('agui_bono',18,2)->default('0.00');
            $table->decimal('agui_produccion',18,2)->default('0.00');
            $table->decimal('agui_subsidio',18,2)->default('0.00');
            $table->decimal('aqui_extraordinario',18,2)->default('0.00');
            $table->decimal('agui_otrobono',18,2)->default('0.00');
            $table->decimal('agui_totalganado',18,2)->default('0.00');
            $table->decimal('agui_totalliquido',18,2)->default('0.00');
            $table->string('agui_firma');
            $table->boolean('agui_estado')->default(true);
            $table->integer('user_registra')->unsigned();
            $table->integer('user_actualiza')->unsigned();
            $table->timestamps();

            $table->foreign('id_empleado')->references('id')->on('empleado');
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
        Schema::drop('aguinaldos');
    }
}
