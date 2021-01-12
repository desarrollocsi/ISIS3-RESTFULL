<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nivel');
            $table->string('nombre',50);
            $table->integer('padre');
            $table->string('accion',100);
            $table->string('icono',50);
            $table->boolean('estado');
            $table->integer('iduser')->nullable();
            $table->timestamps(); // create_at ,update_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
