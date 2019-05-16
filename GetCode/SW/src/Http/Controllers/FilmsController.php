<?php


namespace GetCode\SW\Http\Controllers;


use GetCode\SW\Repositories\FilmsRepository;

class FilmsController extends BaseController {

    /** @var FilmsRepository */
    protected $repository;

    /**
     * FilmsController constructor.
     * @param $repository
     */
    public function __construct(FilmsRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFilms() {
        return response()->json($this->repository->get());
    }
}