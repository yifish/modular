<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/3
 * Time: 23:48
 */

namespace App\MyTrait;

use App\MyModel\competenceModel;
use App\Exceptions\SuccessException;
use App\Code;

trait CompetenceTrait
{
    /*
     * 获取权限列表
     * */
    public function getCompetenceList($fieldValue, $field = 'id', $select = 'competence')
    {
        return competenceModel::whereIn($field, explode(',', $fieldValue))->select($select)->get();
    }
    /*
     * 验证是否有权限
     * */
    public function checkCompetence($role, $competenceId)
    {
        if (!$role) {
            throw new SuccessException(Code::NULL_COMPETENCE, trans('login.null_competence'));
        }
        $competence = $this->getCompetence($role);
        if (!$competence) {
            throw new SuccessException(Code::NULL_COMPETENCE, trans('login.null_competence'));
        }
        if (!strpos($competenceId,',' . $competence->id . ',',1)) {
            throw new SuccessException(Code::NO_COMPETENCE, trans('login.no_competence'));
        }
    }

    /*
     * 获取权限
     * */
    public function getCompetence($role)
    {
        return competenceModel::where('competence', $role)->first();
    }

}