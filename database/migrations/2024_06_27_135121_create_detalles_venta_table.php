<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesVentaTable extends Migration
{
    public function up()
    {
        Schema::create('detalles_venta', function (Blueprint $table) {
            $table->id('id_detalle_venta');
            $table->integer('cantidad');
            $table->string('unidad_medida', 50);
            $table->decimal('precio_venta', 8, 2);
            $table->decimal('monto_total', 8, 2);
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_venta');
            $table->timestamps();

            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->foreign('id_venta')->references('id_venta')->on('ventas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalles_venta');
    }
};

