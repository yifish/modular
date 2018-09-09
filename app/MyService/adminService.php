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
use App\MyModel\adminModel;

class adminService extends service
{
    use AdminTrait,CompetenceTrait;

    private $admin;

    public function __construct()
    {
        $this->admin = $this->getAdmin();
    }
    /*
     * 管理员列表
     * */
    public function getAdminList($request, $where = array())
    {
        $adminModel = new adminModel();
        $this->setPage($request);
        $list = $adminModel->where($where)->offset(($this->page - 1) * $this->limit)->orderBy('created_at', 'desc')->paginate($this->limit);
        return $this->makeApiResponse([
            'list' => $this->toArray($list->items(), [
                'id' => 'adminId',
                'name' => '',
                'roleName' => '',
                'loginName' => '',
                'loginTime' => 'date',
                'created_at' => 'created_at'
            ]),
            'total' => $list->total()
        ]);
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
    public function getMenu($competence, $array = array())
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