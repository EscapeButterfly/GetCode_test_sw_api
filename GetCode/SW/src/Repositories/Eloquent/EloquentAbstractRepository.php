<?php


namespace GetCode\SW\Repositories\Eloquent;


use Illuminate\Database\Eloquent\Model;

abstract class EloquentAbstractRepository {
    /** @var Model */
    protected $model;

    /**
     * EloquentAbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model) {
        $this->model = $model;
    }
}