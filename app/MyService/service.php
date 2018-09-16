<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/29
 * Time: 20:34
 */

namespace App\MyService;

use App\Exceptions\SuccessException;
use App\Code;

class service
{
    protected $limit = 10;

    protected $page = 1;
    /*
     * 返回数据
     * */
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

    /*
     * 设置分页
     * */
    public function setPage($request)
    {
        $this->page = $request->input('page', $this->page);
        $this->limit = $request->input('limit', $this->limit);
    }

    /*
     * 属性赋值
     * $model model类
     * $obj 值所在的对象
     * */
    public function setAttribute($model, $obj, $array = array())
    {
        try {
            foreach ($array as $key => $value) {
                $model->$key = $obj->$value;
            }
        } catch (\Exception $e) {
            throw new SuccessException(Code::PARAMETER_ERROR, trans('admin.error_type'));
        }
        return $model;
    }
}