<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Request\ValidatorRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminWebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }
    /*
     * 网页表单验证
     * */
    public function myValidator($functions = 'login', Request $request)
    {
        /*try {
            $validator = Validator::make($request->all(), ValidatorRequest::get($functions));
        } catch (\Exception $e) {
            echo 404;exit;
            return back()->withErrors(['服务器访问错误！']);
        }
        $message = $validator->errors();
        if ($message->first()){
            // back()->withErrors([$message->first()]);
            echo $message->first();exit;
        }*/
        $validator = Validator::make($request->all(), ValidatorRequest::get($functions));
        $validator->validate();
    }
}
