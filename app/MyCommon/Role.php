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
        'admin' => '管理员管理',
        'adminList' => '管理员列表',
        'roleList' => '管理员列表',
        'competenceList' => '权限列表'
    );
}