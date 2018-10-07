<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/25
 * Time: 21:06
 */

namespace App\MyService;

use App\MyModel\userModel;
use App\Code;
use App\MyCommon\Cipher;

class userService extends service
{
    /*
     * 获取用户列表
     * */
    public function getUserList($request, $where = array())
    {
        $userModel = new userModel();
        $this->setPage($request);
        $list = $userModel->where($where)->offset(($this->page - 1) * $this->limit)->orderBy('created_at', 'desc')->paginate($this->limit);
        return $this->makeApiResponse([
            'list' => $this->toArray($list->items(), [
                'id' => 'userId',
                'name' => '',
                'phone' => '',
                'loginName' => '',
                'loginTime' => 'date',
                'created_at' => 'created_at'
            ]),
            'total' => $list->total()
        ]);
    }
    /*
     * 添加用户
     * */
    public function create($request)
    {
        $user = new userModel();
        $cipher = new Cipher($request->password);
        $user = $this->setAttribute($user, $request, [
            'loginName' => 'loginName',
            'name' => 'name',
            'phone' => 'phone'
        ]);
        $user->random = $cipher->getString();
        $user->password = $cipher->encryption();
        if ($user->save()) {
            return $this->makeApiResponse([]);
        }
        return $this->makeApiResponse([], Code::OPERATE_ERROR, trans('admin.error_create'));
    }
    /*
     * 用户修改
     * */
    public function update($request){
        $user = userModel::find($request->userId);
        if (empty($user)) {
            return $this->makeApiResponse([], Code::NOT_EXIST, trans('admin.no_user'));
        }
        // 修改密码
        if (!empty($request->password)) {
            $cipher = new Cipher($request->password, $user->random);
            $user->password = $cipher->encryption();
        }
        $user = $this->setAttribute($user, $request, ['name' => 'name', 'phone' =>  'phone']);
        if ($user->save()) {
            return $this->makeApiResponse([]);
        }
        return $this->makeApiResponse([], Code::OPERATE_ERROR, trans('admin.error_update'));
    }
    /*
     * 删除用户
     * */
    public function delete($request)
    {
        $user = userModel::find($request->userId);
        if (empty($user)) {
            return $this->makeApiResponse([], Code::NOT_EXIST, trans('admin.no_user'));
        }
        $user->forceDelete();
        return $this->makeApiResponse([]);
    }
}