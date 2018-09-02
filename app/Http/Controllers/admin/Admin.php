<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 16:20
 */

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\MyService\adminService;

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /*
     * 管理员信息
     * */
    public function info()
    {
        $adminService = new adminService();
        return $adminService->info();
    }


}