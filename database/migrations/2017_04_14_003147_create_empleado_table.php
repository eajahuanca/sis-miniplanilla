<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('em_nombre',50);
            $table->string('em_paterno',50);
            $table->string('em_materno',50);
            $table->string('em_especial',50);
            $table->string('em_cedula',20)->unique();
            $table->string('em_expedido',15);
            $table->date('em_nacimiento');
            $table->string('em_genero',15);
            $table->string('em_nacionalidad',50);
            $table->string('em_departamento',20);
            $table->string('em_ciudad',50);
            $table->string('em_zona',50);
            $table->string('em_calle',50);
            $table->string('em_numero',20);
            $table->string('em_telefono',20);
            $table->string('em_celular',20);
            $table->string('em_fotografia');
            $table->date('em_fecha_ingeso');
            $table->decimal('em_sueldo_basico',18,2);
            $table->decimal('em_bono',18,2)->default(0.00);
            $table->integer('id_cargo')->unsigned();
            $table->integer('id_area')->unsigned();
            $table->boolean('em_estado')->default(true);
            $table->text('em_observaciones');
            $table->timestamps();

            $table->foreign('id_cargo')->references('id')->on('cargo');
            $table->foreign('id_area')->references('id')->on('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empleado');
    }
}
