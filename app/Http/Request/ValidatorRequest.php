<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 21:08
 */

namespace App\Http\Request;

use App\MyCommon\Validate;

class ValidatorRequest
{
    public static function info($string = 'login')
    {
        $validate = Validate::masterValidate;
        if (is_string($string)) {
            return $validate[$string];
        }
        if (is_array($string)) {
            $return = array();
            foreach ($string as $value) {
                $return = array_merge($return, $validate[$value]);
            }
            return $return;
        }
        return [];
    }

    public static function get($string)
    {
        return self::info($string);
    }
}