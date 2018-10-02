<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2
 * Time: 19:06
 */

namespace App\Service\AdminService;

use App\Service\service;
use Illuminate\Http\Request;
use App\MyModel\adminModel;
use App\MyCommon\Cipher;
use App\MyCommon\Token;
use Illuminate\Support\Facades\Auth;

class adminService extends service
{
    private $admin = null;

    public function __construct()
    {
    }

    /*
     * 登录账号是否存在
     * */
    public function isLoginName(Request $request)
    {
        return $this->admin = adminModel::where(array('loginName'=>$request->loginName))->first();
    }
    /*
     * 判断密码是否正确
     * */
    public function checkPassword($password)
    {
        if (empty($this->admin)) {
            return false;
        }
        $cipher = new Cipher($password, $this->admin->random, $this->admin->password);
        return $cipher->checkPassword();
    }
    /*
     * 设置token
     * */
    public function setToken()
    {
        $tokenClass = new Token();
        $token = $tokenClass->encryption();
        $this->admin->token = $token;
        $this->admin->loginTime = time();
    }
    /*
     * 返回管理员信息
     * */
    public function getAdmin()
    {
        return $this->admin;
    }
    /*
     * Auth::guard
     * */
    public function guard()
    {
        return Auth::guard('admin');
    }
    /*
     * Auth::guard attempt
     * */
    public function attempt()
    {
        $this->guard()->attempt($this->admin);
    }
}