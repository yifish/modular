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
            'password' => 'required|string'
        ),
        'list' => array(
        ),
        'adminUpdate' => array(
            'adminId' => 'required|numeric',
            'name' => 'string|unique:admin|min:5|max:30',
            'roleId' => 'numeric'
        ),
        'adminCreate' => array(
            'name' => 'required|unique:admin|min:5|max:30',
            'roleId' => 'required|numeric'
        ),
        'adminDelete' => array(
            'adminId' => 'required'
        ),
        'roleCreate' => array(
            'name' => 'required|string|unique:role|min:5|max:30',
            'competence' => 'required|string|min:1|max:1000'
        )
    );
}