<?php


namespace GetCode\SW\Http\Controllers;


use GetCode\SW\Http\Requests\PeopleRequest;
use GetCode\SW\Repositories\PeopleRepository;
use Illuminate\Http\Request;

class PeopleController extends BaseController {

    /** @var PeopleRepository */
    protected $repository;

    /**
     * PeopleController constructor.
     * @param $repository
     */
    public function __construct(PeopleRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {
        $responseData = $this->repository->getIndex($request->query->get('search'));
        return response()->json($responseData);
    }

    /**
     * @param                  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById($id) {
        return response()->json($this->repository->with(['homeworld', 'films'])->find($id));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPeopleByWorld($id) {
        return response()->json($this->repository->getPeopleByWorld($id));
    }

    /**
     * @param PeopleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(PeopleRequest $request) {
        return response()->json($this->repository->addPeople($request->validated()));
    }

    /**
     * @param                     $id
     * @param PeopleRequest       $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, PeopleRequest $request) {
        return response()->json($this->repository->update($request->validated(), $id));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id) {
        return response()->json($this->repository->delete($id));
    }
}