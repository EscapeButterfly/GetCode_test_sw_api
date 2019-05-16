<?php


namespace GetCode\SW\Repositories;


use GetCode\SW\Models\People;
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
}