<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportstarsTable extends Migration
{
    public function up()
    {
        Schema::create('sportstars', function (Blueprint $table) {
            $table->id();
            $table->text('history');
            $table->text('mission');
            $table->text('vision');
            $table->string('name');
            $table->string('image');
            $table->string('role'); // Stores images and their roles as JSON
            $table->text('anthem');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sportstars');
    }
}
