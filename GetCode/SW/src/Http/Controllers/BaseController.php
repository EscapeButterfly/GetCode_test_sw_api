<?php


namespace GetCode\SW\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseLaravelController;

class BaseController extends BaseLaravelController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}