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

class LoginController extends AdminController
{
    public function login(Request $request)
    {
        $this->myValidator('login', $request);
        $login = new loginService();

    }
}