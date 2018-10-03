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
        'admin' => array('name' => '管理员管理', 'submenu'=>array(
            'adminList' => '管理员列表',
            'roleList' => '角色列表',
            'userList' => '用户列表'
        ))
    );

    const masterUrl = array(
        'adminList' => 'admin/adminList',
        'roleList' => 'admin/roleList',
        'userList' => 'admin/userList',
    );
}