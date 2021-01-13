<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_rols', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_permisos');
            $table->foreign('id_permisos')->references('id')->on('permisos');

            $table->unsignedBigInteger('id_rols');
            $table->foreign('id_rols')->references('id')->on('rols');

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
        Schema::dropIfExists('permisos_rols');
    }
}
