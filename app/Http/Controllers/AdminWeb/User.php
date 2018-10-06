<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 21:41
 */

namespace App\Http\Controllers\AdminWeb;

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
     * 管理员列表页面
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
}