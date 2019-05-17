<?php


namespace GetCode\SW\database\seeds;


use GetCode\SW\Models\Film;
use GetCode\SW\Models\People;
use Illuminate\Database\Seeder;
use GetCode\SW\Models\HomeWorld;

class TestSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        /*$planets = ['Endor', 'Hoth', 'Dragobah', 'Jakku', 'Naboo', 'Tatooine'];
        foreach ($planets as $planet) {
            HomeWorld::query()->create([
                'name' => $planet
            ]);
        }*/
/*
        $films = ['A New Hope', 'The Empire Strikes Back', 'Return of the Jedi', 'The Phantom Menace',
                  'Attack of the Clones', 'Revenge of the Sith', 'The Force Awakens', 'The Last Jedi', 'The Rise of Skywalker'];
        foreach ($films as $film) {
            Film::query()->create([
                'title' => $film
            ]);
        }*/

       /* $homeworlds = HomeWorld::query()->get();
        $films = Film::query()->get();
        factory(People::class, 25)->create()->each(function ($people) use ($homeworlds, $films) {
            $people->homeworld()->associate($homeworlds->random(1)->first()->id);
            $people->save();
            $filmsIDs = $films->random(rand(1,3))->pluck('id');
            $people->films()->attach($filmsIDs);
        });*/
    }
}