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

    public function toArray($array = [], $field = array())
    {
        $return = array();
        foreach ($array as $key => $value) {
            if (is_array($field)) {
                $return[$key] = $this->toArray($field, $value);
            } else {
                $return[$value] = $field[$value];
            }
        }
        return $return;
    }
}