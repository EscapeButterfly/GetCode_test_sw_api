<?php


namespace GetCode\SW\Http\Controllers;


use GetCode\SW\Repositories\HomeWorldRepository;

class HomeWorldsController extends BaseController {

    /** @var HomeWorldRepository */
    protected $repository;

    /**
     * HomeWorldsController constructor.
     * @param $repository
     */
    public function __construct(HomeWorldRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWorlds() {
        return response()->json($this->repository->get());
    }

}