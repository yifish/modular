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
            'adminUpdate' => '修改管理员',
            'adminCreate' => '添加管理员',
            'adminDelete' => '删除管理员',
            'roleList' => '角色列表',
            'roleCreate' => '添加角色',
            'roleUpdate' => '修改角色',
            'roleDelete' => '删除角色',
            'userList' => '用户列表',
            'userCreate' => '添加用户',
            'userUpdate' => '修改用户',
            'userDelete' => '删除用户',
        )),
        'article' => array('name' => '文章管理', 'competence' => array(
            'articleClassList' => '文章分类列表',
            'articleCCreate' => '添加文章分类',
            'articleCUpdate' => '修改文章分类',
            'articleCDelete' => '删除文章分类',
            'articleList' => '文章列表',
            'articleCreate' => '添加文章',
            'articleUpdate' => '修改文章',
            'articleDelete' => '删除文章',
        ))
    );
}