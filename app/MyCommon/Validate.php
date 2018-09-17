<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/17
 * Time: 22:42
 */

namespace App\MyCommon;


class Validate
{
    const masterValidate = array(
        'login' => array(
            'loginName' => 'required|string|min:5|max:10',
            'password' => 'required|string'
        ),
        'list' => array(
        ),
        'adminUpdate' => array(
            'adminId' => 'required|numeric',
            'name' => 'string|min:5|max:30',
            'roleId' => 'numeric'
        ),
        'adminCreate' => array(
            'name' => 'required|min:5|max:30',
            'roleId' => 'required|numeric',
        )
    );
}