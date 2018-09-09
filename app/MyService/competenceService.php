<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/9
 * Time: 11:52
 */

namespace App\MyService;

use App\MyCommon\Role;

class competenceService extends Service
{
    public function All()
    {
        return $this->makeApiResponse($this->resetCompetence(Role::masterCompetence));
    }

    /*
     * 递归获取左侧菜单
     * */
    public function resetCompetence($array = array())
    {
        $arr = array();
        foreach ($array as $key => $val) {
            if (is_array($val)) {
                $arr[] = array('name' => $val['name'], 'enName' => $key, 'competence' => $this->resetCompetence($val['competence']));
            } else {
                $arr[] = array('name' => $val, 'enName' => $key);
            }
        }
        return $arr;
    }
}