<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/30
 * Time: 23:10
 */

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Service\AdminService\adminService;

class Login extends AdminWebController
{
    /*
     * 登录页
     * */
    public function login()
    {
        return view('admin.login');
    }
    public function logout(Request $request)
    {
        $adminService = new adminService();
        $adminService->setAdmin('session');
        $adminService->deleteToken();
        $admin = $adminService->getAdmin();
        $admin->save();
        session(['admin' => null]);
        return redirect('/admin/login');
    }
    /*
     * 登录方法
     * */
    public function loginPost(Request $request)
    {
        $this->myValidator('login', $request);
        $adminService = new adminService();
        if (empty($adminService->isLoginName($request))) {
            return $this->MyBackErrors(trans('login.no_admin_account'));
        }
        if (!$adminService->checkPassword($request->password)) {
            return $this->MyBackErrors(trans('login.no_password'));
        }
        $adminService->setToken();
        $admin = $adminService->getAdmin();
        if (!$admin->save()) {
            return $this->MyBackErrors(trans('login.error'));
        }
        $adminService->storeAdmin();
        return redirect('admin/home');
    }
}