<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/3
 * Time: 23:48
 */

namespace App\MyTrait;

use App\MyModel\competenceModel;

trait CompetenceTrait
{
    public function getCompetenceId($fieldValue, $field = 'id', $select = 'competence')
    {
        return competenceModel::whereIn($field, explode(',', $fieldValue))->select($select)->get();
    }
}