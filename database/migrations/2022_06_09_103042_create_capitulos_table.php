<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('capitulos')){
            Schema::create('capitulos', function (Blueprint $table) {
                $table->id();
                $table->string('nome');            
                $table->string('codigo');
                $table->string('designacao');
                $table->string('quantidade');
                $table->string('preco_unitario');
                $table->string('preco_total');           
                $table->foreignId('projecto_id')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('capitulos');
    }
}
