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
        'admin' => array('name' => '管理员管理', 'submenu' => array(
            'adminList' => '管理员列表',
            'roleList' => '角色列表',
            'userList' => '用户列表'
        )),
        'article' => array('name' => '文章管理', 'submenu' => array(
            'articleList' => '文章列表'
        ))

    );
    /*
     * 菜单栏访问地址
     * */
    const masterUrl = array(
        'adminList' => 'admin/adminList',
        'roleList' => 'admin/roleList',
        'userList' => 'admin/userList',
    );
    /*
     * 页面按钮
     * */
    const masterUrlGroup = array(
        'adminList' => array(
            'admin/adminList',
            'admin/adminCreate',
            'admin/adminUpdate',
        ),
        'roleList' => array(
            'admin/roleList',
            'admin/roleCreate',
            'admin/roleUpdate',
        ),
        'userList' => array(
            'admin/userList',
            'admin/userCreate',
            'admin/userUpdate',
        )
    );
    /*
     * 菜单栏图片样式
     * */
    const masterIconClass = array(
        'admin' => 'am-icon-user',
        'adminList' => '',
        'roleList' => '',
        'userList' => '',
    );
}