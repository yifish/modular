<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/28
 * Time: 21:33
 */

namespace App\MyService;

use App\MyCommon\Token;
use App\MyCommon\Cipher;
use Illuminate\Http\Request;
use App\MyModel\adminModel;
use App\Code;

class loginService extends service
{
    private $cipher;

    public function __construct()
    {
    }

    /*
     * 后台登陆
     * */
    public function adminLogin(Request $request)
    {
        $admin = adminModel::where(array('loginName'=>$request->loginName))->first();
        if (empty($admin)) {
            return $this->makeApiResponse([], Code::USERNAME_ERROR, trans('login.no_admin_account'));
        }
        $cipher = new Cipher($request->password, $admin->random, $admin->password);
        if (!$cipher->checkPassword()) {
            return $this->makeApiResponse([], Code::USER_PASSWORD_ERROR, trans('login.no_password'));
        }
        $tokenClass = new Token();
        $token = $tokenClass->encryption();
        $admin->token = $token;
        if ($admin->save()) {
            return $this->makeApiResponse(['token' => $token]);
        }
        return $this->makeApiResponse([], Code::USER_PASSWORD_ERROR, trans('login.no_password'));
    }



}