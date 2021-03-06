<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/9
 * Time: 11:04
 */

namespace App\MyService;

use App\MyModel\roleModel;
use App\MyTrait\CompetenceTrait;
use App\Code;

class roleService extends service
{
    use CompetenceTrait;
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
                'competenceEnName' => 'competence',
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
    /*
     * 添加角色
     * */
    public function create($request)
    {
        $roleModel = new roleModel();
        $competenceId = $this->getCompetenceList($request->competence, 'competence', 'id');
        if (count($competenceId) <= 0) {
            return $this->makeApiResponse([], Code::NULL_COMPETENCE, trans('admin.no_competence'));
        }
        $roleModel->name = $request->name;
        $roleModel->competence = ',' . implode(',', array_column($competenceId->toArray(), 'id')) . ',';
        if ($roleModel->save()) {
            return $this->makeApiResponse([]);
        }
        return $this->makeApiResponse([], Code::OPERATE_ERROR, trans('admin.error_create'));
    }
    /*
     * 修改角色
     * */
    public function update($request)
    {
        $roleModel = roleModel::where('id', $request->roleId)->first();
        if (empty($roleModel)) {
            return $this->makeApiResponse([], Code::NOT_EXIST_INFO, trans('admin.no_role'));
        }
        $competenceId = $this->getCompetenceList($request->competence, 'competence', 'id');
        if (count($competenceId) <= 0) {
            return $this->makeApiResponse([], Code::NULL_COMPETENCE, trans('admin.no_competence'));
        }
        $roleModel->name = $request->name;
        $roleModel->competence = ',' . implode(',', array_column($competenceId->toArray(), 'id')) . ',';
        if ($roleModel->save()) {
            return $this->makeApiResponse([]);
        }
        return $this->makeApiResponse([], Code::OPERATE_ERROR, trans('admin.error_update'));
    }
    /*
     * 删除角色
     * */
    public function delete($request)
    {
        $role = roleModel::where('id', $request->roleId)->first();
        if (empty($role)) {
            return $this->makeApiResponse([], Code::NOT_EXIST_INFO, trans('admin.no_role'));
        }
        if ($role->id == 1) {
            return $this->makeApiResponse([], Code::NOT_EXIST, trans('admin.no_delete_role'));
        }
        $role->forceDelete();
        return $this->makeApiResponse([]);
    }
}