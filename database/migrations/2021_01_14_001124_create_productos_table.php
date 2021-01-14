<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->text('descripcion');
            //foranea
            //$table->unsignedBigInteger('id_puesto_de_feria')->nullable();
            //$table->foreign('id_puesto_de_feria')->references('id')->on('puesto_de_feria');
            //foranea
            //$table->unsignedBigInteger('id_transaccion')->nullable();
            //$table->foreign('id_transaccion')->references('id')->on('transaccion');
            //foranea
            $table->unsignedBigInteger('id_subcategorias')->nullable();
            $table->foreign('id_subcategorias')->references('id')->on('subcategorias');
            //foranea
            $table->unsignedBigInteger('id_unidades_medidas')->nullable();
            $table->foreign('id_unidades_medidas')->references('id')->on('unidades_medidas');


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
        Schema::dropIfExists('productos');
    }
}