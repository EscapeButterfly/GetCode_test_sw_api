<?php


namespace GetCode\SW\Repositories;


use GetCode\SW\Models\HomeWorld;
use Prettus\Repository\Eloquent\BaseRepository;

class HomeWorldRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return HomeWorld::class;
    }
}