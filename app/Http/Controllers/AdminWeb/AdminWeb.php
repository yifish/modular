<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/5
 * Time: 1:07
 */

namespace App\Http\Controllers\AdminWeb;

use App\MyModel\adminModel;
use Illuminate\Http\Request;

class AdminWeb extends AdminWebController
{
    /*
     * 管理员列表页面
     * */
    public function adminList(Request $request)
    {
        $adminModel = new adminModel();
        if ($request->input('name')) {
            $adminModel->where('name', 'like', '%' . $request->input('name') . '%');
        }
        $list = $adminModel->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.admin.list', compact('list'));
    }
    /*
     * 创建管理员
     * */
    public function adminCreate()
    {
        return view('admin.admin.create');
    }
}