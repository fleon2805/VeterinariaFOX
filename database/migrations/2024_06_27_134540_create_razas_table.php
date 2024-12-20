<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRazasTable extends Migration
{
    public function up()
    {
        Schema::create('razas', function (Blueprint $table) {
            $table->id('id_raza');
            $table->string('raza', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('razas');
    }
};
