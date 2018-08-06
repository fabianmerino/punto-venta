<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unid_enteros', 50);
            $table->string('unid_fracciones', 50);
            $table->integer('factor')->default(1);
            $table->boolean('activo')->default(true);
            $table->softDeletes();
            $table->index(['unid_enteros', 'unid_fracciones']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidas');
    }
}
