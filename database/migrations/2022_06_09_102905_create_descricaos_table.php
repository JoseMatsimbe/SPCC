<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('descricaos')){

            Schema::create('descricaos', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('codigo_item');
                $table->foreign('codigo_item')->references('codigo')->on('items')->onDelete('CASCADE')->onUpdate('CASCADE');
                $table->string('descricao');
                $table->string('coeficiente');
                $table->string('unidade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descricaos');
    }
}
