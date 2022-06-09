<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('numero_projecto');
            $table->string('descricao');
            $table->string('contratante');
            $table->string('localizacao');
            $table->date('prazo');
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
        Schema::dropIfExists('projectos');
    }
}
