<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/3
 * Time: 21:25
 */

namespace App\MyTrait;

use App\MyModel\adminModel;

trait adminTrait
{
    /*
     * 获取管理员的信息
     * */
    public function getAdmin()
    {
        $adminId = config('program.ADMINID');
        return adminModel::where(['id' => $adminId])->first();
    }
}