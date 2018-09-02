<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/2
 * Time: 19:06
 */

namespace App\MyService;

use App\Code;
use App\MyModel\adminModel;

class adminService extends service
{
    public function info()
    {
        $adminId = config('program.ADMINID');
        $admin = adminModel::where(['id' => $adminId])->first();
        return $this->makeApiResponse([
            'name' => $admin->name
        ]);
    }
}