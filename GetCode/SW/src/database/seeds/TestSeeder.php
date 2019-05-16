<?php


namespace GetCode\SW\database\seeds;


use GetCode\SW\Models\Film;
use GetCode\SW\Models\People;
use Illuminate\Database\Seeder;
use GetCode\SW\Models\HomeWorld;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        DB::table('genders')->insert([
            'gender' => 'male',
        ]);

        DB::table('genders')->insert([
            'gender' => 'female',
        ]);

        DB::table('genders')->insert([
            'gender' => 'n/a',
        ]);

        HomeWorld::query()->create([
            'name' => 'Yavin IV'
        ]);

        HomeWorld::query()->create([
            'name' => 'Hoth'
        ]);

        People::query()->create([
            'name'         => 'Dolbich',
            'height'       => 156,
            'mass'         => 53,
            'hair_color'   => 'red',
            'birth_year'   => '11BBY',
            'gender_id'    => 1,
            'homeworld_id' => 1,
            'created'      => \Carbon\Carbon::now(),
            'url'          => 'qwe'
        ]);

        People::query()->create([
            'name'         => 'Stepan',
            'height'       => 211,
            'mass'         => 101,
            'hair_color'   => 'blue',
            'birth_year'   => '1BBY',
            'gender_id'    => 3,
            'homeworld_id' => 2,
            'created'      => \Carbon\Carbon::now(),
            'url'          => 'qwe'
        ]);

        $film1 = Film::query()->create([
            'title' => 'A New Hope',
        ]);
        $film1->people()->attach([1, 2]);

        $film2 = Film::query()->create([
            'title' => 'Attack of the Clones',
        ]);

        $film2->people()->attach(1);
    }
}