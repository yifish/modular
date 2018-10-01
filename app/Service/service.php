<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29
 * Time: 20:34
 */

namespace App\Service;

class service
{
    /*
     * 置换参数类型
     * */
    public function attribute($return, $key, $model, $str = '')
    {
        switch ($str) {
            case '':
                $return[$key] = $model[$key];
                break;
            case 'date':
                $return[$key] = date('Y-m-d H:i:s', $model[$key]);
                break;
            case 'created_at':
                $return[$key] = $model[$key]->format('Y-m-d H:i:s');
                break;
            default:
                $return[$str] = $model[$key];
                break;
        }
        return $return;
    }
}