<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id('id_mascota');
            $table->string('nombre', 100);
            $table->integer('meses');
            $table->integer('años');
            $table->decimal('peso', 8, 2);
            $table->unsignedBigInteger('id_tipo_mascota');
            $table->unsignedBigInteger('id_genero');
            $table->unsignedBigInteger('id_raza');
            $table->unsignedBigInteger('id_etapa');
            $table->unsignedBigInteger('id_cliente');
            $table->timestamps();

            $table->foreign('id_tipo_mascota')->references('id_tipo_mascota')->on('tipo_mascotas')->onDelete('cascade');
            $table->foreign('id_genero')->references('id_genero')->on('generos')->onDelete('cascade');
            $table->foreign('id_raza')->references('id_raza')->on('razas')->onDelete('cascade');
            $table->foreign('id_etapa')->references('id_etapa')->on('etapas')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
};
