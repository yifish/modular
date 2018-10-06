<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:41
 */

namespace App\Http\Controllers\AdminWeb;

use App\MyCommon\Cipher;
use App\MyModel\userModel;
use Illuminate\Http\Request;

class User extends AdminWebController
{
    private $user;

    public function __construct()
    {
        parent::__construct();

        $this->user = new userModel();
    }

    /*
     * 用户列表页面
     * */
    public function userList(Request $request)
    {
        $userModel = new userModel();
        $request->flash();
        if ($request->input('name')) {
            $userModel = $userModel->where('name', 'like', '%' . $request->input('name') . '%');
        }
        $list = $userModel->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.user.list', compact('list'));
    }
    /*
     * 创建用户
     * */
    public function userCreate()
    {
        $user = $this->user;
        $formType = $this->formType;
        return view('admin.user.create', compact('user', 'admin', 'formType'));
    }
    /*
     * 修改用户
     * */
    public function userUpdate(userModel $user)
    {
        $this->formType = 'update';
        $this->user = $user;
        return $this->userCreate();
    }
    /*
     * 添加用户提交
     * */
    public function createUserPost(Request $request)
    {
        $this->myValidator(['userCreate', 'register'], $request);
        $this->saveStore($request);
        if ($this->user->save()) {
            return redirect('admin/userList');
        }
        throw new WebException(['errors' => trans('admin.error_create')]);
    }
    /*
     * 修改用户提交
     * */
    public function updateUserPost(Request $request)
    {
        $this->myValidator(['id', 'userCreate'], $request);
        $this->user = userModel::find($request->id);
        $this->saveStore($request);
        if ($this->user->save()) {
            return redirect('admin/userList');
        }
        throw new WebException(['errors' => trans('admin.error_update')]);
    }
    /*
     * 删除方法
     * */
    public function userDelete(userModel $user)
    {
        if ($user->id != 1) {
            $user->forceDelete();
        }
        return redirect('admin/userList');
    }

    /*
     * 修改方法
     * */
    public function saveStore(Request $request)
    {
        if ($request->input('name')) {
            $this->user->name = $request->name;
        }
        if ($request->input('loginName')) {
            $this->user->loginName = $request->loginName;
        }
        if ($request->input('phone')) {
            $this->user->phone = $request->phone;
        }
        if ($request->input('password')) {
            $cipher = new Cipher($request->password);
            $this->user->random = $cipher->getString();
            $this->user->password = $cipher->encryption();
        }
    }
}