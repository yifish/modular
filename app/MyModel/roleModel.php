<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2
 * Time: 20:30
 */

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class roleModel extends Model
{
    protected $table = 'role';

    public function getCompetenceEnNameAttribute()
    {
        if ($this->competence == '*') {
            return $this->competence;
        }
        $competence = competenceModel::whereIn('id', explode(',', trim($this->competence, ',')))->select('competence')->get();
        return implode(',', array_column($competence->toArray(), 'competence'));
    }
}