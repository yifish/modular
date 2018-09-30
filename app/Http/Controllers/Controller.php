<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Exceptions\AbnormalException;
use App\Http\Request\ValidatorRequest;
use App\Exceptions\ValidatorException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }
    /*
     * 接口表单验证
     * */
    public function myValidator($functions = 'login', Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ValidatorRequest::get($functions));
        } catch (\Exception $e) {
            throw new AbnormalException(404, $e->getMessage());
        }
        $message = $validator->errors();
        if ($message->first()){
            throw new ValidatorException(422, $message->first());
        }
    }
}
