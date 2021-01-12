<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActoMedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acto_medico', function (Blueprint $table) {
            $table->id();
            $table->integer('idcita')-> nullable(false);
            $table->text('motivo')->nullable(); 
            $table->text('problema')->nullable(); 
            $table->decimal('parterial',10,2)->nullable();
            $table->decimal('fcardiaca',10,2)->nullable();
            $table->decimal('frespiratoria',10,2)->nullable();
            $table->decimal('tbucal',10,2)->nullable();
            $table->decimal('taxiliar',10,2)->nullable();
            $table->decimal('peso',10,2)->nullable();
            $table->decimal('talla',10,2)->nullable();
            $table->decimal('icorporal',10,2)->nullable();
            $table->decimal('pcefalico',10,2)->nullable();
            $table->text('examen')->nullable(); 
            $table->text('planes')->nullable(); 
            $table->integer('destino')->nullable();
            $table->char('cod_final',6)->nullable();
            $table->string('des_fina',50)->nullable(); 
            $table->timestamps();
            $table->string('usuario',15)->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acto_medico');
    }
}
