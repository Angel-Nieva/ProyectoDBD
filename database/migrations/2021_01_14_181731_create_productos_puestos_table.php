<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosPuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_puestos', function (Blueprint $table) {
            $table->id();
            $table->integer('precio');
            $table->integer('stock');
            //Foraneas
            $table->unsignedBigInteger('id_productos');
            $table->foreign('id_productos')->references('id')->on('productos');
            $table->unsignedBigInteger('id_puestos_ferias');
            $table->foreign('id_puestos_ferias')->references('id')->on('puestos_ferias');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_puestos');
    }
}
