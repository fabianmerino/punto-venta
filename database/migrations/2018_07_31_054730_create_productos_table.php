<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 50)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->char('tventa', 1)->nullable();
            $table->decimal('pcosto', 15, 2)->nullable();
            $table->decimal('pventa', 15, 2)->nullable();
            $table->decimal('pmayoreo', 15, 2)->nullable();
            $table->unsignedInteger('departamento_id')->nullable();
            $table->unsignedInteger('proveedor_id')->nullable();
            $table->smallInteger('iprioridad')->nullable();
            $table->double('dinventario', 15)->nullable();
            $table->double('dinvminimo', 15)->nullable();
            $table->double('dinvmaximo', 15)->nullable();
            $table->timestamp('chechado_en')->nullable();
            $table->decimal('porcentaje_ganancia', 15, 2)->nullable()->default(0);
            $table->string('impuestos', 255)->nullable();
            $table->decimal('pcosto_anterior', 15, 2)->nullable()->default(0);
            $table->decimal('pventa_anterior', 15, 2)->nullable()->default(0);
            $table->decimal('pmayoreo_anterior', 15, 2)->nullable()->default(0);
            $table->unsignedInteger('medida_id')->nullable();
            $table->decimal('pfinal', 15, 2)->nullable();
            $table->decimal('pmayoreofinal', 15, 2)->nullable();
            $table->boolean('es_kit')->nullable()->default(false);
            $table->boolean('usa_inventario')->nullable()->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('medida_id')->references('id')->on('medidas');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
