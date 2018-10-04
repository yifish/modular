<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Request\ValidatorRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Exceptions\AdminWebException;

class AdminWebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $limit = 10;

    public function __construct()
    {
    }
    /*
     * 网页表单验证
     * */
    public function myValidator($functions = 'login', Request $request)
    {
        try {
            $validator = Validator::make($request->all(), ValidatorRequest::get($functions));
        } catch (\Exception $e) {
            abort(404);
//            return response('404');
        }
        $message = $validator->errors();
        if ($message->first()){
            // back()->withErrors([$message->first()]);
            // echo $message->first();exit;
//            abort(422, $message->first());
            throw new AdminWebException($message);
        }
        /*
        $validator = Validator::make($request->all(), ValidatorRequest::get($functions));
        $validator->validate();
        */
    }
    /*
     * 返回上一页并提示错误
     * */
    public function MyBackErrors($message, $input = false)
    {
        if ($input) {
            return back()->withErrors(['message' => $message])->withInput();
        }
        return back()->withErrors(['message' => $message]);
    }

}
