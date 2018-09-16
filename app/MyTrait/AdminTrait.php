<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/3
 * Time: 21:25
 */

namespace App\MyTrait;

use App\MyModel\adminModel;

trait AdminTrait
{
    /*
     * 获取管理员的信息
     * */
    public function getAdmin($adminId = 0)
    {
        if ($adminId <= 0) {
            $adminId = config('program.ADMINID');
        }
        return adminModel::where(['id' => $adminId])->first();
    }
}