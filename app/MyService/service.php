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
    public function makeApiResponse($data = [], $code = Code::SUCCESS, $message = "ok"){
        return Response([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
}