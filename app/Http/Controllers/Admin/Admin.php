<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 16:20
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MyService\adminService;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /*
     * 管理员信息
     * */
    public function info()
    {
        $adminService = new adminService();
        return $adminService->info();
    }
    /*
     * 管理员列表
     * */
    public function adminList(Request $request)
    {
        $this->myValidator('list', $request);
        $adminService = new adminService();
        return $adminService->getAdminList($request);
    }
    /*
     * 添加管理员
     * */
    public function adminCreate(Request $request)
    {
        $this->myValidator(['register', 'adminCreate'], $request);
        $adminService = new adminService();
        return $adminService->create($request);
    }
    /*
     * 修改管理员
     * */
    public function adminUpdate(Request $request)
    {
        $this->myValidator(['adminDelete', 'adminUpdate'], $request);
        $adminService = new adminService();
        return $adminService->update($request);
    }
    /*
     * 删除管理员
     * */
    public function adminDelete(Request $request)
    {
        $this->myValidator('adminDelete', $request);
        $adminService = new adminService();
        return $adminService->delete($request);
    }

}