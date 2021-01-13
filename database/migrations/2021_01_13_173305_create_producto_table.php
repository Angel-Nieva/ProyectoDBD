<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
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
            $table->unsignedBigInteger('id_subcategoria')->nullable();
            $table->foreign('id_subcategoria')->references('id')->on('subcategoria');
            //foranea
           // $table->unsignedBigInteger('id_medida')->nullable();
           // $table->foreign('id_medida')->references('id')->on('medida');


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
        Schema::dropIfExists('producto');
    }
}
