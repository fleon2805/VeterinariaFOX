<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('usuario', 100);
            $table->string('contraseña', 255);
            $table->string('correo', 100)->unique();
            $table->unsignedBigInteger('id_tipo_usuario');
            $table->unsignedBigInteger('id_empleado')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->timestamps();

            $table->foreign('id_tipo_usuario')->references('id_tipo_usuario')->on('tipo_usuarios')->onDelete('cascade');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};