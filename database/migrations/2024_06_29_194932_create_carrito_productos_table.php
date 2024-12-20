<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoProductosTable extends Migration
{
    public function up()
    {
        Schema::create('carrito_productos', function (Blueprint $table) {
            $table->id('id_carrito_producto');
            $table->unsignedBigInteger('id_carrito');
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad')->default(1);
            $table->timestamps();

            $table->foreign('id_carrito')->references('id_carrito')->on('carritos')->onDelete('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carrito_productos');
    }
}
