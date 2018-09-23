<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/9
 * Time: 11:04
 */

namespace App\MyService;

use App\MyModel\roleModel;

class roleService extends service
{
    /*
     * 管理员列表
     * */
    public function getRoleList($request, $where = array())
    {
        $roleModel = new roleModel();
        $this->setPage($request);
        $list = $roleModel->where($where)->offset(($this->page - 1) * $this->limit)->orderBy('created_at', 'desc')->paginate($this->limit);
        return $this->makeApiResponse([
            'list' => $this->toArray($list->items(), [
                'id' => 'roleId',
                'name' => '',
                'created_at' => 'created_at'
            ]),
            'total' => $list->total()
        ]);
    }
    /*
     * 所有角色
     * */
    public function all()
    {
        $where = array();
        $roleModel = new roleModel();
        $list = $roleModel->where($where)->get();
        return $this->makeApiResponse($this->toArray($list, [
            'id' => 'roleId',
            'name' => '',
            'competence' => '',
            'created_at' => 'created_at'
        ]));
    }
}