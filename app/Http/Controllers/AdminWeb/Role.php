<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 16:36
 */

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\MyModel\roleModel;
use App\MyCommon\Role as Competence;

class Role extends AdminWebController
{
    private $role;

    public function __construct()
    {
        parent::__construct();

        $this->role = new roleModel();
    }
    /*
     * 管理员列表页面
     * */
    public function roleList(Request $request)
    {
        $roleModel = new roleModel();
        $request->flash();
        if ($request->input('name')) {
            $roleModel = $roleModel->where('name', 'like', '%' . $request->input('name') . '%');
        }
        $list = $roleModel->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.role.list', compact('list'));
    }
    /*
 * 创建管理员
 * */
    public function roleCreate()
    {
        $role = $this->role;
        $formType = $this->formType;
        $competence = Competence::masterCompetence;
        return view('admin.role.create', compact('role','formType', 'competence'));
    }
    /*
     * 修改管理员
     * */
    public function roleUpdate(roleModel $role)
    {
        $this->formType = 'update';
        $this->role = $role;
        return $this->roleCreate();
    }
}