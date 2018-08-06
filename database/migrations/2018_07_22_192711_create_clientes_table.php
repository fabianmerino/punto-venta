<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50);
            $table->char('dni', 8)->nullable()->unique();
            $table->char('ruc', 11)->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('email')->nullable();
            $table->string('web', 100)->nullable();
            $table->decimal('limite_credito', 15, 2)->default(0)->nullable();
            $table->decimal('deuda_actual', 15, 2)->default(0)->nullable();
            $table->date('actualiza_saldo')->nullable();
            $table->timestamp('ultimo_pago_en')->nullable();
            $table->integer('folio');
            $table->timestamps();
            $table->softDeletes();
            $table->index('folio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
