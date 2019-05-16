<?php


namespace GetCode\SW\Http\Controllers;


use GetCode\SW\Http\Requests\PeopleRequest;
use GetCode\SW\Repositories\PeopleRepository;

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $responseData = $this->repository
            ->with('homeworld')
            ->orderBy('id', 'desc')
            ->paginate(10);
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
     * @param PeopleRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(PeopleRequest $request) {
        return response()->json($this->repository->create($request->validated()));
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