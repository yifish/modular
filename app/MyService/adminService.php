<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2
 * Time: 19:06
 */

namespace App\MyService;

use App\Code;
use App\MyCommon\Menu;
use App\MyModel\adminModel;

class adminService extends service
{
    /*
     * 返回给前端的管理员信息
     * */
    public function info()
    {
        $admin = $this->getAdmin();
        return $this->makeApiResponse([
            'name' => $admin->name,
            'menu' => $this->menu()
        ]);
    }

    /*
     * 获取管理员的信息
     * */
    public function getAdmin()
    {
        $adminId = config('program.ADMINID');
        return adminModel::where(['id' => $adminId])->first();
    }
    /*
     * 返回左侧菜单
     * */
    public function menu()
    {
        return Menu::master;
    }

}