<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToPeople extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('people', function (Blueprint $table) {

            $table->foreign('homeworld_id')
                ->references('id')
                ->on('home_worlds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('people', function (Blueprint $table) {
            $table->dropForeign(['gender_id', 'homeworld_id']);
        });
    }
}
