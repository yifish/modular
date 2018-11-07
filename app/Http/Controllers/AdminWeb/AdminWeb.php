<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/5
 * Time: 1:07
 */

namespace App\Http\Controllers\AdminWeb;

use App\MyModel\adminModel;
use App\MyModel\roleModel;
use Illuminate\Http\Request;
use App\MyCommon\Cipher;
use App\Exceptions\WebException;

class AdminWeb extends AdminWebController
{
    private $admin;

    public function __construct()
    {
        parent::__construct();

        $this->admin = new adminModel();
    }

    /*
     * 管理员列表页面
     * */
    public function adminList(Request $request)
    {
        $adminModel = new adminModel();
        $request->flash();
        if ($request->input('name')) {
            $adminModel = $adminModel->where('name', 'like', '%' . $request->input('name') . '%');
        }
        $list = $adminModel->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.admin.list', compact('list'));
    }
    /*
     * 创建管理员
     * */
    public function adminCreate()
    {
        $admin = $this->admin;
        $formType = $this->formType;
        $role = roleModel::all();
        return view('admin.admin.create', compact('role', 'admin', 'formType'));
    }
    /*
     * 修改管理员
     * */
    public function adminUpdate(adminModel $admin)
    {
        $this->formType = 'update';
        $this->admin = $admin;
        return $this->adminCreate();
    }
    /*
     * 添加管理员提交
     * */
    public function createAdminPost(Request $request)
    {
        //验证管理员添加权限和注册权限
        $this->myValidator(['adminCreate', 'register'], $request);
        $this->saveStore($request);
        if ($this->admin->save()) {
            return redirect('admin/adminList');
        }
        //trance()为语言包函数
        throw new WebException(['errors' => trans('admin.error_create')]);
    }
    /*
     * 修改管理员提交
     * */
    public function updateAdminPost(Request $request)
    {
        $this->myValidator(['id', 'adminUpdate'], $request);
        $this->admin = adminModel::find($request->id);
        $this->saveStore($request);
        if ($this->admin->save()) {
            return redirect('admin/adminList');
        }
        throw new WebException(['errors' => trans('admin.error_update')]);
    }
    /*
     * 删除方法
     * */
    public function adminDelete(adminModel $admin)
    {
        if ($admin->id != 1) {
            $admin->forceDelete();
        }
        return redirect('admin/adminList');
    }

    /*
     * 修改方法
     * */
    public function saveStore(Request $request)
    {
        if ($request->input('name')) {
            $this->admin->name = $request->name;
        }
        if ($request->input('loginName')) {
            $this->admin->loginName = $request->loginName;
        }
        if ($request->input('roleId')) {
            if (empty(roleModel::find($request->roleId))) {
                throw new WebException(['roleId' => trans('admin.no_role')]);
            }
            $this->admin->role = $request->roleId;
        }
        if ($request->input('password')) {
            $cipher = new Cipher($request->password);
            $this->admin->random = $cipher->getString();
            $this->admin->password = $cipher->encryption();
        }
    }
}