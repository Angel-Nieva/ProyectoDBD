<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table->text('calle');
            $table->integer('numero');
            
            //$table->unsignedBigInteger('id_usuario');
            //$table->foreign('id_usuario')->references('id')->on('usuario');

            //$table->unsignedBigInteger('id_comuna');
            //$table->foreign('id_comuna')->references('id')->on('comuna');
            
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
        Schema::dropIfExists('direccion');
    }
}
