<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Admin','prefix'=> 'admin'], function ($api) {
        // 管理员登陆
        $api->post('login', 'Login@login');
        // 管理员退出登陆
        $api->get('logout', 'Login@logout')->middleware('adminToken');
        // 获取管理员信息
        $api->get('info', 'Admin@info')->middleware('adminToken');
        // 获取管理员列表
        $api->get('adminList', 'Admin@adminList')->middleware('role:adminList');
        // 获取角色列表
        $api->get('roleList', 'Role@roleList')->middleware('role:roleList');
        // 获取所有权限
        $api->get('competenceAll', 'Role@competenceAll')->middleware('adminToken');
        // 获取所有角色
        $api->get('roleAll', 'Role@roleAll')->middleware('adminToken');
        // 修改管理员
        $api->post('adminUpdate', 'Admin@adminUpdate')->middleware('role:adminUpdate');
        // 添加管理员
        $api->post('adminCreate', 'Admin@adminCreate')->middleware('role:adminCreate');
        // 删除管理员
        $api->post('adminDelete', 'Admin@adminDelete')->middleware('role:adminDelete');
        // 添加角色
        $api->post('roleCreate', 'Role@roleCreate')->middleware('role:roleCreate');
    });
});
