<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_nombre',200)->unique()->coment('Nombre de la empresa');
            $table->string('emp_nit',20)->unique()->coment('Numero de identificacion tributaria de la empresa');
            $table->string('emp_empleador',50)->unique()->coment('Numero de empleador del Ministerio de Trabajo');
            $table->string('emp_caja',50)->unique()->coment('Numero de empleador de la Caja Nacional de Salud');
            $table->integer('id_representante')->unsigned()->coment('id del representante legal de la empresa');
            $table->string('emp_imagen')->coment('imagen/logo de la empresa');
            $table->boolean('emp_estado')->default(true)->coment('Estado de la empresa: 1 empresa activa, 0 empresa inactiva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresa');
    }
}