<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 16:19
 */
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\MyService\loginService;
use App\MyService\adminService;

class Login extends Admin
{
    /*
     * 后台登陆
     * */
    public function login(Request $request)
    {
        $this->myValidator('login', $request);
        $login = new loginService();
        return $login->adminLogin($request);
    }
    /*
     * 后台登出
     * */
    public function logout()
    {
        $admin = new adminService();
        return $admin->logout();
    }
}