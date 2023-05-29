<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nota_id');
            $table->text('contenido');
            $table->timestamps();

            $table->foreign('nota_id')->references('id')->on('notas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
