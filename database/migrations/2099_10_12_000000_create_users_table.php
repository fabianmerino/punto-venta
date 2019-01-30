<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->string('nombre_completo');
            $table->string('direccion')->nullable();
            $table->string('telefono', 50)->nullable();
            $table->string('usuario', 50)->unique();
            $table->string('correo')->unique();
            $table->string('password');
            $table->binary('permisos')->nullable();
            $table->unsignedInteger('caja_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('caja_id')->references('id')->on('cajas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
