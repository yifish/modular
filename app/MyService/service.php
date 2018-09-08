<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29
 * Time: 20:34
 */

namespace App\MyService;

use App\Code;

class service
{
    protected $limit = 10;

    protected $page = 1;

    public function makeApiResponse($data = [], $code = Code::SUCCESS, $message = "ok"){
        return Response([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
    /*
     * 将model转化成数组
     * */
    public function toArray($array = [], $field = array())
    {
        $return = array();
        foreach ($array as $key => $value) {
            if (is_array($field)) {
                $return[$key] = $this->toArray($field, $value);
            } else {
                $return = $this->attribute($return, $key, $field, $value);
            }
        }
        return $return;
    }
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