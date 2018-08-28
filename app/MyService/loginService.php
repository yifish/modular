<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/28
 * Time: 21:33
 */

namespace App\MyService;

use App\MyCommon\Token;
use App\MyModel\adminModel;
use App\Exceptions\SuccessException;
use App\Code;

class loginService
{
    public function __construct()
    {
        $this->token = new Token();
    }



}