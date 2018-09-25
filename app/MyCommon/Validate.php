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
        'register' => array(
            'loginName' => 'required|unique:admin|string|min:5|max:10',
            'password' => 'required|string|min:6|max:64'
        ),
        'list' => array(
        ),
        'adminUpdate' => array(
            'adminId' => 'required|numeric',
            'name' => 'string|min:2|max:30',
            'password' => 'string|min:6|max:64',
            'roleId' => 'numeric'
        ),
        'adminCreate' => array(
            'name' => 'required|unique:admin|min:2|max:30',
            'roleId' => 'required|numeric'
        ),
        'adminDelete' => array(
            'adminId' => 'required'
        ),
        'roleCreate' => array(
            'name' => 'required|string|min:2|max:30',
            'competence' => 'required|string|min:1|max:1000'
        ),
        'roleId' => array(
            'roleId' => 'required|numeric'
        )
    );
}