<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/3
 * Time: 21:58
 */

namespace App\MyTrait;

use \Illuminate\Http\Request;
use App\MyModel\adminModel;
use App\Code;
use App\Exceptions\SuccessException;

trait TokenTrait
{
    private $token = null;

    public function adminToken(Request $request)
    {
        $this->getToken($request);
        $admin = $this->getAdmin();
        config(['program.ADMINID' => $this->isUser($admin)]);
    }

    /*
     * 判断是否存在
     * */
    private function isUser($user = null){
        if (!$user) {
            throw new SuccessException(Code::TOKEN_ERROR, trans('login.no_token'));
        }
        return $user['id'];
    }
    /*
     * 获取token
     * */
    public function getToken(Request $request)
    {
        $this->token = $request->headers->get('token');
        if (!$this->token) {
            throw new SuccessException(Code::EMPTY_TOKEN, trans('login.null_token'));
        }
    }
    /*
     * 获取管理员
     * */
    public function getAdmin()
    {
        return adminModel::where(array('token'=>$this->token))->first();
    }

}