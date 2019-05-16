<?php


namespace GetCode\SW\Entities;


/**
 * Class HomeWorldEntity
 * @package GetCode\SW\Entities
 */
class HomeWorldEntity extends BaseEntity {
    /**
     * @var string
     */
    private $name;

    /**
     * HomeWorldEntity constructor.
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void {
        $this->name = $name;
    }
}