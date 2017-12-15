<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pag_tipo_empleado');
            $table->integer('id_empleado')->unsigned();
            $table->string('pag_dias');
            $table->string('pag_mes');
            $table->integer('pag_gestion');
            $table->decimal('pag_sueldo',18,2);             //salario ganado(A)
            $table->decimal('pag_bono_antiguedad',18,2);    //bono antiguedad(B)
            $table->decimal('pag_cantidad',18,2);           //canitdad horas extras
            $table->decimal('pag_pagado',18,2);             //monto pagado de horas extras(C)
            $table->decimal('pag_produccion',18,2);         //bono de produccion(D)
            $table->decimal('pag_dominical',18,2);          //dominicales(E)
            $table->decimal('pag_otrobono',18,2);           //otros bonos(F)
            $table->decimal('pag_total_ganado',18,2);       //total ganado (A+B+C+D+E+F) (G)
            $table->decimal('pag_afp',18,2);                //AFP12.71% (H)
            $table->decimal('pag_aporte',18,2);             //aporte nacional solidario(I)
            $table->decimal('pag_iva',18,2);                //rc-iva 13% (J)       
            $table->decimal('pag_anticipos',18,2);          //anticipo y otros descuentos(K)
            $table->decimal('pag_total_descuento',18,2);    //total descuentos(H+I+J+K) (L)
            $table->decimal('pag_total_liquido',18,2);      //liquido pagable(g-L) (LL)
            $table->string('pag_firma');
            $table->boolean('pag_estado')->default(true);
            $table->integer('user_registra')->unsigned();
            $table->integer('user_actualiza')->unsigned();
            $table->integer('id_salariominimo')->unsigned();
            $table->timestamps();

            $table->foreign('id_empleado')->references('id')->on('empleado');
            $table->foreign('user_registra')->references('id')->on('users');
            $table->foreign('user_actualiza')->references('id')->on('users');
            $table->foreign('id_salariominimo')->references('id')->on('salario_minimo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pago');
    }
}
