<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusRolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_rols', function (Blueprint $table) {
            $table->integer('id_rol');
            $table->integer('id_menu');
            $table->integer('iduser')->nullable();
            $table->timestamps();
            $table->primary(['id_rol', 'id_menu']);
            $table->foreign('id_rol')->references('id')->on('rols');
            $table->foreign('id_menu')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus_rols');
    }
}
