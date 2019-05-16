<?php


namespace GetCode\SW\Repositories;


use GetCode\SW\Models\Film;
use Prettus\Repository\Eloquent\BaseRepository;

class FilmsRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Film::class;
    }
}