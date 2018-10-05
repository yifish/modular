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

class AdminWeb extends AdminWebController
{
    private $admin;

    private $formType = 'create';

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
}