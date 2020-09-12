<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasTable extends Migration
{
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->boolean('anonima')->default(0);
            $table->string('nombre', 40)->nullable();
            $table->string('rut', 12)->nullable();
            $table->string('email', 60)->unique()->nullable();
            $table->unsignedBigInteger('delito_id');
            $table->date('fecha');
            $table->char('identifipersona', 10);
            $table->text('descripcion', 1000);
            $table->string('conocimiento', 60);
            $table->string('lugar', 60);
            $table->string('otrolugar', 60)->nullable();
            $table->string('documento')->nullable();
            $table->timestamps();
            $table->foreign('delito_id')->references('id')->on('delitos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('denuncias');
    }
}
