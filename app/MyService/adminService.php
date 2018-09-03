<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2
 * Time: 19:06
 */

namespace App\MyService;

use App\MyCommon\Menu;
use App\MyTrait\AdminTrait;

class adminService extends service
{
    use AdminTrait;

    private $admin;

    public function __construct()
    {
        $this->admin = $this->getAdmin();
    }

    /*
     * 返回给前端的管理员信息
     * */
    public function info()
    {

        return $this->makeApiResponse([
            'name' => $this->admin->name,
            'menu' => $this->menu()
        ]);
    }
    /*
     * 返回左侧菜单
     * */
    public function menu()
    {
        if ($this->admin->roles['competence'] == '*') {
            return Menu::master;
        }
        return Menu::master;
    }

}