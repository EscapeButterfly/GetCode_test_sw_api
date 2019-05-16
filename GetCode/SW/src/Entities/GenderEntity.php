<?php

namespace GetCode\SW\Entities;


/**
 * Class GenderEntity
 * @package GetCode\SW\Entities
 */
class GenderEntity extends BaseEntity {
    /**
     * @var string
     */
    private $gender;

    /**
     * GenderEntity constructor.
     * @param string $gender
     */
    public function __construct(string $gender) {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getGender(): string {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void {
        $this->gender = $gender;
    }
}