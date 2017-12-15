<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalarioMinimoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salario_minimo', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('sm_salario',18,2)->unique();
            $table->string('sm_descripcion');
            $table->boolean('sm_estado')->default(true);
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
        Schema::drop('salario_minimo');
    }
}