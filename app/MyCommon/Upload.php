<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/21
 * Time: 21:54
 */
namespace App\MyCommon;


use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
trait Upload
{
    /*
     * 上次图片的方法
     * */
    public function uploadFile($file)
    {
//        $file = $request->file('file');
        if ($file->isValid()) {
            $path = $file->store(date('ymd'), 'upload');
            return ['code'=>0, 'file'=>asset('/upload/' . $path)];
        }else{
            return ['message' => '上传失败', 'code' => 403];
        }
    }



}