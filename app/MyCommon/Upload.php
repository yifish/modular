<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/21
 * Time: 21:54
 */
namespace App\MyCommon;

use Symfony\Component\HttpFoundation\File\File;

class Upload
{
    /*
     * 上传图片的方法
     * */
    function uploadFile($request, $fileName)
    {
        $imageUrl = false;
        if ($request->input($fileName)) {
            $imageUrl = $this->ajaxUploadFile($request->input($fileName));
        }
        if ($request->file($fileName)) {
            $imageUrl = $this->formUploadFile($request->file($fileName));
        }
        if ($imageUrl) {
            return $imageUrl;
        }
        return '/images/no-images.png';
    }

    /*
     * 异步上传图片
     * */
    public function ajaxUploadFile($string)
    {
        return false;
    }

    /*
     * 同步上传图片
     * */
    public function formUploadFile($file)
    {
        $urlPath = 'uploads/' . date('Y') . '/' . date('m') .'/' . date('d') . '/';
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();// 文件原名
            $tmpName = $file->getFileName();
            $realPath = $file->getRealPath();//临时文件的绝对路径
            $entension = $file->getClientOriginalExtension();//擴展名
            $bool = $this->checkPicRule($entension);
            if ($bool==true){
                $newName = md5($clientName . date("YmdHis")) . "." . $entension;
                $path = $file->move($urlPath, $newName);
                $namePath = '/' . $path->__toString();
                return $namePath;
            }
        }
        return false;
    }

    /*
    * 验证图片的格式
    */
    public function checkPicRule($picExtention)
    {
        $extention = ['jpg', 'png', 'gif'];
        if (!in_array($picExtention, $extention)) {
            return false;
        }else{
            return true;
        }
    }


}