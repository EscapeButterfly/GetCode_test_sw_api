<?php


namespace GetCode\SW\Entities;


/**
 * Class BaseEntity
 * @package GetCode\SW\Entities
 */
abstract class BaseEntity {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var array
     */
    protected $relations = [];

    /**
     * @return int
     */
    public function getId() : int {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getRelations(): array {
        return $this->relations;
    }

    /**
     * @param array $relations
     */
    public function setRelations(array $relations): void {
        $this->relations = $relations;
    }
}