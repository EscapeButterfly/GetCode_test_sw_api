<?php


namespace GetCode\SW\Repositories\Contracts;


use GetCode\SW\Entities\PeopleEntity;
use GetCode\SW\Entities\PeopleList;

/**
 * Interface PeopleRepositoryContract
 * @package GetCode\SW\Repositories\Contracts
 */
interface PeopleRepositoryContract {

    /**
     * @param array $search
     * @param array $relations
     * @return PeopleList
     */
    public function get(array $search = [], array $relations = []): PeopleList;

    /**
     * @param int $id
     * @return PeopleEntity
     */
    public function getByID(int $id): PeopleEntity;

    /**
     * @param array $data
     * @return PeopleEntity
     */
    public function create(array $data): PeopleEntity;

    /**
     * @param int   $id
     * @param array $data
     * @return PeopleEntity
     */
    public function update(int $id, array $data): PeopleEntity;

    /**
     * @param int $id
     * @return PeopleEntity
     */
    public function delete(int $id): PeopleEntity;
}