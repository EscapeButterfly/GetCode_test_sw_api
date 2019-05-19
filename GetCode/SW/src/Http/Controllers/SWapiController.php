<?php


namespace GetCode\SW\Http\Controllers;

use GetCode\SW\Repositories\PeopleRepository;
use GetCode\SW\SWAPI\SWapiService;

class SWapiController extends BaseController {

    /**
     * @param SWapiService     $service
     * @param PeopleRepository $repository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBaseData(SWapiService $service, PeopleRepository $repository) {
        $service->getDefaultData();
        $responseData = $repository->getIndex();
        return response()->json($responseData);
    }
}