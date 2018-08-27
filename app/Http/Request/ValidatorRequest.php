<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 21:08
 */

namespace App\Http\Request;

class ValidatorRequest
{
    public static function login()
    {
        return [
            'loginName' => 'required|string|min:5|max:10',
            'password' => 'required|string'
        ];
    }

    public static function get($functions)
    {
        return self::$functions();
    }
}