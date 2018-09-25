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
}