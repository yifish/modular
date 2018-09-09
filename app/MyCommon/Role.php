<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29
 * Time: 21:54
 */

namespace App\MyCommon;

class Role
{
    /*
     * 总权限数组
     * */
    const masterCompetence = array(
        'admin' => array('name' => '管理员管理', 'competence' => array(
            'adminList' => '管理员列表',
            'roleList' => '角色列表'
        ))
    );
}