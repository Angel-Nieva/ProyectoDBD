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
            $table->integer('precio');
            $table->integer('stock');
            $table->boolean('delete');
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
