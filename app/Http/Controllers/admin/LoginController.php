<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 16:19
 */
namespace App\Http\Controllers\admin;

use App\Http\Request\PostRequest;

class LoginController extends AdminController
{
    public function login(PostRequest $request)
    {
        $request->myValidator('login');
    }
}