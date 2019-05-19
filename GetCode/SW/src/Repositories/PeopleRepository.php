<?php


namespace GetCode\SW\Repositories;


use Carbon\Carbon;
use GetCode\SW\Models\Film;
use GetCode\SW\Models\People;
use Illuminate\Support\Collection;
use Prettus\Repository\Eloquent\BaseRepository;

class PeopleRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return People::class;
    }

    /**
     * @param string $search
     * @return mixed
     */
    public function getIndex(string $search = null) {
        return People::query()
            ->search($search)
            ->with(['homeworld', 'films'])//scope
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    /**
     * @param array $attributes
     * @return mixed|void
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function addPeople(array $attributes) {
        $filmIDs = [];
        if (array_key_exists('films', $attributes)) {
            //TODO валидация
            foreach ($attributes['films'] as $film) {
                array_push($filmIDs, $film['id']);
            }
        }
        $people = $this->create($attributes);
        if (!empty($filmIDs)) $people->films()->attach($filmIDs);
    }

    /**
     * @param int $homeWorldID
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPeopleByWorld(int $homeWorldID) {
        return People::query()
            ->where('homeworld_id', $homeWorldID)
            ->with(['homeworld', 'films'])
            ->paginate(10);
    }
}