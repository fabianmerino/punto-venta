<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Producto_Componentes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_padre_id');
            $table->unsignedInteger('producto_hijo_id');
            $table->float('cantidad');
            
            $table->foreign('producto_padre_id')->references('id')->on('productos');
            $table->foreign('producto_hijo_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Producto_Componentes');
    }
}
