<?php


namespace GetCode\SW\Entities;


/**
 * Class FilmEntity
 * @package GetCode\SW\Entities
 */
class FilmEntity extends BaseEntity {
    /**
     * @var string
     */
    private $title;

    /**
     * FilmEntity constructor.
     * @param string $title
     */
    public function __construct(string $title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void {
        $this->title = $title;
    }
}