<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impuestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50)->nullable();
            $table->float('porcentaje')->nullable();
            $table->char('defecto', 1)->nullable();
            $table->char('activo', 1)->nullable();
            $table->char('origen', 1)->default('F');
            $table->char('base_gravable', 1)->default('F');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impuestos');
    }
}
