<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoMascotasTable extends Migration
{
    public function up()
    {
        Schema::create('tipo_mascotas', function (Blueprint $table) {
            $table->id('id_tipo_mascota');
            $table->string('tipo', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipo_mascotas');
    }
};
