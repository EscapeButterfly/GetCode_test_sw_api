<?php


namespace GetCode\SW\SWAPI;


use Carbon\Carbon;
use GetCode\SW\Models\Film;
use GetCode\SW\Models\HomeWorld;
use GetCode\SW\Models\People;
use GetCode\SW\Repositories\PeopleRepository;
use Illuminate\Support\Collection;

class SWapiService {
    /**
     * @var SWapiClient
     */
    protected $client;

    /**
     * @var PeopleRepository
     */
    protected $repository;

    /**
     * SWapiService constructor.
     * @param SWapiClient      $client
     * @param PeopleRepository $repository
     */
    public function __construct(SWapiClient $client, PeopleRepository $repository) {
        $this->client     = $client;
        $this->repository = $repository;
    }

    /**
     * @return void
     */
    public function getDefaultData() {
        $peoples        = collect($this->client->getPeople());
        $films          = collect($this->client->getFilms());
        $homeWorldsUrls = collect();
        foreach ($peoples as $people) {
            $homeWorldsUrls->push($people->homeworld);
        }
        $homeWorlds = collect();
        $homeWorldsUrls->unique()->each(function ($url) use ($homeWorlds) {
            $world = $this->client->getHomeWorlds($url);
            $homeWorlds->push([
                'name' => $world->name,
                'url'  => $url
            ]);
        });
        $this->storeFilms($films);
        $this->storeWorlds($homeWorlds);
        $this->storePeople($peoples);
    }

    /**
     * @param Collection $films
     */
    public function storeFilms(Collection $films) {
        $films->each(function ($film) {
            Film::query()->create([
                'title' => $film->title,
                'url'   => $film->url
            ]);
        });
    }

    /**
     * @param Collection $worlds
     */
    public function storeWorlds(Collection $worlds) {
        $worlds->each(function ($world) {
            HomeWorld::query()->create([
                'name' => $world['name'],
                'url'  => $world['url']
            ]);
        });
    }

    /**
     * @param Collection $peoples
     */
    public function storePeople(Collection $peoples) {
        $peoples->each(function ($character) {
            $people = People::query()->create([
                'name'       => $character->name,
                'height'     => $character->height,
                'mass'       => $character->mass,
                'hair_color' => $character->hair_color,
                'birth_year' => $character->birth_year,
                'gender'     => $character->gender,
                'created'    => Carbon::parse($character->created),
                'url'        => $character->url
            ]);
            $people->films()->attach(Film::query()->whereIn('url', $character->films)->get()->pluck('id')->toArray());
            $people->homeworld()->associate(HomeWorld::query()->where('url', $character->homeworld)->first());
            $people->save();
        });
    }
}