<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/9
 * Time: 11:16
 */

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MyService\roleService;
use App\MyService\competenceService;

class Role extends Controller
{
    /*
     * 角色列表
     * */
    public function roleList(Request $request)
    {
        $this->myValidator('list', $request);
        $roleService = new roleService();
        return $roleService->getRoleList($request);
    }
    /*
     * 获取所有权限
     * */
    public function competenceAll()
    {
        $competenceService = new competenceService();
        return $competenceService->All();
    }
    /*
     * 获取所有角色
     * */
    public function roleAll()
    {
        $roleService = new roleService();
        return $roleService->all();
    }
    /*
     * 添加角色
     * */
    public function roleCreate(Request $request)
    {
        $this->myValidator('roleCreate', $request);
        $roleService = new roleService();
        return $roleService->create($request);
    }
    /*
     * 修改角色
     * */
    public function roleUpdate(Request $request)
    {
        $this->myValidator(['roleId', 'roleCreate'], $request);
        $roleService = new roleService();
        return $roleService->update($request);
    }

}