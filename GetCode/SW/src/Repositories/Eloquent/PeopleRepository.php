<?php


namespace GetCode\SW\Repositories\Eloquent;


use GetCode\SW\Entities\PeopleList;
use GetCode\SW\Entities\PeopleEntity;
use GetCode\SW\Repositories\Contracts\PeopleRepositoryContract;

class PeopleRepository extends EloquentAbstractRepository implements PeopleRepositoryContract {

    /**
     * @param array $search
     * @param array $relations
     * @return PeopleList
     */
    public function get(array $search = [], array $relations = []): PeopleList {
        // TODO: Implement getByID() method.
    }

    /**
     * @param int $id
     * @return PeopleEntity
     */
    public function getByID(int $id): PeopleEntity {
        $peopleModel = $this->model::query()->findOrFail($id);
        $peopleEntity = new PeopleEntity($peopleModel->toArray());
        return $peopleEntity;
    }

    /**
     * @param array $data
     * @return PeopleEntity
     */
    public function create(array $data): PeopleEntity {
        // TODO: Implement create() method.
    }

    /**
     * @param int   $id
     * @param array $data
     * @return PeopleEntity
     */
    public function update(int $id, array $data): PeopleEntity {
        // TODO: Implement update() method.
    }

    /**
     * @param int $id
     * @return PeopleEntity
     */
    public function delete(int $id): PeopleEntity {
        // TODO: Implement delete() method.
    }
}