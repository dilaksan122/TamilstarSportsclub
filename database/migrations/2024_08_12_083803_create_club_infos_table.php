<?php

// database/migrations/xxxx_xx_xx_create_club_infos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubInfosTable extends Migration
{
    public function up()
    {
        Schema::create('club_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('PhoneNo')->nullable();
            $table->string('Email')->nullable();
            $table->string('logoImage')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('club_infos');
    }
}
