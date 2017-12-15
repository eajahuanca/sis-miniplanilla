<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBonoObservacionesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado', function (Blueprint $table) {
            $table->decimal('em_bono')->default(0,00);
            $table->text('em_observaciones');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        Schema::table('empleado', function (Blueprint $table) {
            $table->dropColumn('em_bono');     
            $table->dropColumn('em_observaciones');     
        });

    }
}
