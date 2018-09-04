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
use App\MyTrait\CompetenceTrait;

class adminService extends service
{
    use AdminTrait,CompetenceTrait;

    private $admin;

    public function __construct()
    {
        $this->admin = $this->getAdmin();
    }
    /*
     * 退出登录
     * */
    public function logout()
    {
        $this->admin->token = '';
        $this->admin->save();
        config('program.ADMINID', null);
        return $this->makeApiResponse();
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
            return $this->getMenu('*', Menu::master);
        }
        return $this->competenceMenu();
    }
    /*
     * 获取管理员权限的左侧菜单
     * */
    public function competenceMenu()
    {
        $comIdStr = trim($this->admin->roles['competence'], ',');
        $competence = $this->getCompetenceId($comIdStr)->toArray();
        $competence = ',' . implode(',', array_column($competence, 'competence')) . ',';
        return $this->getMenu($competence, Menu::master);
    }
    /*
     * 递归获取左侧菜单
     * */
    private function getMenu($competence, $array = array())
    {
        $arr = array();
        foreach ($array as $key => $val) {
            if (strpos($competence,',' . $key . ',',1) || $competence == '*') {
                if (is_array($val)) {
                    $arr[] = array('name' => $val['name'], 'enName' => $key, 'submenu' => $this->getMenu($competence, $val['submenu']));
                } else {
                    $arr[] = array('name' => $val, 'enName' => $key);
                }

            }
        }
        return $arr;
    }

}