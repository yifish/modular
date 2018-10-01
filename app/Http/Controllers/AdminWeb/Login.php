<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/30
 * Time: 23:10
 */

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use Redis;

class Login extends AdminWebController
{
    /*
     * 登录页
     * */
    public function login()
    {
        return view('admin.login');
    }
    /*
     * 登录方法
     * */
    public function loginPost(Request $request)
    {
        $this->myValidator('login', $request);

    }
}