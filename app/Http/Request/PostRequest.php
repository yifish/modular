<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 17:04
 */

namespace App\Http\Request;

use App\Exceptions\AbnormalException;
use App\Exceptions\ValidatorException;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;


class PostRequest extends Request
{
    public function myValidator($functions = 'login')
    {
        try {
            $validator = Validator::make(request()->all(), ValidatorRequest::get($functions));
        } catch (\Exception $e) {
            throw new AbnormalException(404, $e->getMessage());
        }
        $message = $validator->errors();
        if ($message){
            throw new ValidatorException(422, $message->first());
        }
    }
}
