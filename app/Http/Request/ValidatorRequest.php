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
    public static function info($string = 'login')
    {
        return [
            'login' => [
                'loginName' => 'required|string|min:5|max:10',
                'password' => 'required|string'
            ],
            'list' => [
            ],
            'adminUpdate' => [
                'adminId' => 'required|number',
                'name' => 'string|min:5|max:30',
                'roleId' => 'number'
            ]
        ][$string];
    }

    public static function get($string)
    {
        return self::info($string);
    }
}