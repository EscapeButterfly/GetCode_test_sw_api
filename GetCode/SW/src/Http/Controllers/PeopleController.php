<?php


namespace GetCode\SW\Http\Controllers;


use GetCode\SW\Repositories\Eloquent\PeopleRepository;

class PeopleController extends BaseController {

    /**
     * @param PeopleRepository $peopleRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(PeopleRepository $peopleRepository) {
        return response()->json($peopleRepository->get());
    }

    /**
     * @param                  $id
     * @param PeopleRepository $peopleRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function byId($id, PeopleRepository $peopleRepository) {
        return response()->json($peopleRepository->getByID($id));
    }
}