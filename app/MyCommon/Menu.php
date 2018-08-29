<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29
 * Time: 22:29
 */

namespace App\MyCommon;

class Menu
{
    /*
     * 左侧菜单栏
     * */
    const master = array(
        array('name' => '管理员管理', 'enName' => 'admin', 'submenu'=>array(
            'adminList' => '管理员列表',
            'roleList' => '管理员列表',
            'competenceList' => '权限列表'
        ))
    );
}