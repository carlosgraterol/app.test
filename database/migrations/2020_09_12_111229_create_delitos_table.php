<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelitosTable extends Migration
{
    public function up()
    {
        Schema::create('delitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_delito');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('delitos');
    }
}
