<?php


namespace GetCode\SW\Entities;


/**
 * Class PeopleEntity
 * @package GetCode\SW\Entities
 */
class PeopleEntity extends BaseEntity {
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $height;
    /**
     * @var int
     */
    private $mass;
    /**
     * @var string
     */
    private $hair_color;
    /**
     * @var string
     */
    private $birth_year;
    /**
     * @var int
     */
    private $gender_id;
    /**
     * @var int
     */
    private $homeworld_id;
    /**
     * @var string
     */
    private $created;
    /**
     * @var string
     */
    private $url;

    /**
     * PeopleEntity constructor.
     * @param array $params
     */
    public function __construct(array $params) {
        foreach ($params as $param => $value) {
            if (property_exists($this, $param)) {
                $this->{$param} = $value;
            }
        }
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

    /**
     * @return int
     */
    public function getHeight(): int {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getMass(): int {
        return $this->mass;
    }

    /**
     * @param int $mass
     */
    public function setMass(int $mass): void {
        $this->mass = $mass;
    }

    /**
     * @return string
     */
    public function getHairColor(): string {
        return $this->hair_color;
    }

    /**
     * @param string $hair_color
     */
    public function setHairColor(string $hair_color): void {
        $this->hair_color = $hair_color;
    }

    /**
     * @return string
     */
    public function getBirthYear(): string {
        return $this->birth_year;
    }

    /**
     * @param string $birth_year
     */
    public function setBirthYear(string $birth_year): void {
        $this->birth_year = $birth_year;
    }

    /**
     * @return int
     */
    public function getGenderId(): int {
        return $this->gender_id;
    }

    /**
     * @param int $gender_id
     */
    public function setGenderId(int $gender_id): void {
        $this->gender_id = $gender_id;
    }

    /**
     * @return int
     */
    public function getHomeworldId(): int {
        return $this->homeworld_id;
    }

    /**
     * @param int $homeworld_id
     */
    public function setHomeworldId(int $homeworld_id): void {
        $this->homeworld_id = $homeworld_id;
    }

    /**
     * @return string
     */
    public function getCreated(): string {
        return $this->created;
    }

    /**
     * @param string $created
     */
    public function setCreated(string $created): void {
        $this->created = $created;
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void {
        $this->url = $url;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize() {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'height'       => $this->height,
            'mass'         => $this->mass,
            'hair_color'   => $this->hair_color,
            'birth_year'   => $this->birth_year,
            'gender_id'    => $this->gender_id,
            'homeworld_id' => $this->homeworld_id,
            'created'      => $this->created,
            'url'          => $this->url,
            'relations'    => $this->relations
        ];
    }
}