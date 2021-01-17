<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoPromocionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_promocions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_productos')->nullable();
            $table->foreign('id_productos')->references('id')->on('productos');

            $table->unsignedBigInteger('id_promocions')->nullable();
            $table->foreign('id_promocions')->references('id')->on('promocions')->onDelete("cascade")->onUpdate("cascade");;

            $table->boolean('delete');

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
        Schema::dropIfExists('producto_promocions');
    }
}
