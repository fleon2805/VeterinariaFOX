<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtapasTable extends Migration
{
    public function up()
    {
        Schema::create('etapas', function (Blueprint $table) {
            $table->id('id_etapa');
            $table->string('edad', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etapas');
    }
};
