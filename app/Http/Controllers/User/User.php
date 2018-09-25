<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/25
 * Time: 21:04
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MyService\userService;

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /*
     * 用户列表
     * */
    public function userList(Request $request)
    {
        $this->myValidator('list', $request);
        $userService = new userService();
        return $userService->getUserList($request);
    }
}