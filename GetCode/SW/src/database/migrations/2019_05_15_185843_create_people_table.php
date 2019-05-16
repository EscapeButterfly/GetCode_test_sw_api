<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('height');
            $table->unsignedInteger('mass');
            $table->string('hair_color');
            $table->string('birth_year');
            $table->enum('gender', ['male', 'female', 'n/a']);
            $table->unsignedBigInteger('homeworld_id')->nullable();
            $table->timestamp('created');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('people');
    }
}
