<?php

namespace App\Http\Middleware;

use Closure;
use App\Exceptions\SuccessException;
use App\Code;
use App\MyModel\adminModel;

class AdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->headers->get('token');
        if (!$token) {
            return Response(array('code' => Code::EMPTY_TOKEN, 'message' => trans('login.null_token')));
        }
        $admin = adminModel::where(array('token'=>$token))->first();
        if (!$admin) {
            return Response(array('code' => Code::TOKEN_ERROR, 'message' => trans('login.no_token')));
        }
        config(['program.ADMINID' => $admin['id']]);
        return $next($request);
    }
}
