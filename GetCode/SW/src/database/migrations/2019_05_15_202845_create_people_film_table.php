<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleFilmTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('people_film', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('people_id');
            $table->unsignedBigInteger('film_id');
            $table->timestamps();

            $table->foreign('people_id')
                ->references('id')
                ->on('people');

            $table->foreign('film_id')
                ->references('id')
                ->on('films');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('people_film');
    }
}
