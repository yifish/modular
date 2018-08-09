<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 17:04
 */

namespace App\Http\Request;

use Illuminate\Support\Facades\Validator;
use Dingo\Api\Http\Request;
use App\Exceptions\AbnormalException;

class PostRequest extends Request
{
    public function index()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ];
    }

    public function myValidator($functions = 'index')
    {
        try {
            $validator = Validator::make($this->all(), $this->$functions());

        } catch (\Exception $e) {
            throw new AbnormalException('404', trans(''));
        }
    }

}
