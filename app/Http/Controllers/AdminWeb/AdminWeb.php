<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/5
 * Time: 1:07
 */

namespace App\Http\Controllers\AdminWeb;

use App\MyModel\adminModel;

class AdminWeb extends AdminWebController
{
    /*
     * 管理员列表页面
     * */
    public function adminList()
    {
        $adminModel = new adminModel();
        $list = $adminModel->orderBy('created_at', 'desc')->paginate($this->limit);
        return view('admin.admin.list', compact('list'));
    }
}