<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/28
 * Time: 21:41
 */

namespace App\MyModel;

use Illuminate\Database\Eloquent\Model;

class adminModel extends Model
{
    protected $table = 'admin';

    /*
     * 关联角色表
     * */
    public function roles()
    {
        return $this->hasOne(roleModel::class, 'id', 'role');
    }

    public function getRoleNameAttribute()
    {
        return $this->roles['name'];
    }
}