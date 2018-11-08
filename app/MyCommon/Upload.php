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
     *  路徑使用MD5加密
     * */
    function uploadFile($file)
    {
        $url_path = 'uploads/cover';
        if ($file->isValid()) {
            $clientName = $file->getClientOriginalName();// 文件原名
            $tmpName = $file->getFileName();
            $realPath = $file->getRealPath();//临时文件的绝对路径
            $entension = $file->getClientOriginalExtension();//擴展名
            $bool=$this->checkPicRule($entension);
            if ($bool==true){
                $newName = md5(date("Y-m-d H:i:s") . $clientName) . "." . $entension;
                $path = $file->move($url_path, $newName);
                $namePath = $url_path . '/' . $newName;
                return $path;
            }
        }else{
            return false;
        }
    }

/*
*验证图片的格式
 */

    public function checkPicRule($pic_extention)
    {
        $rule = ['jpg', 'png', 'gif'];
        if (!in_array($pic_extention, $rule)) {
            return '图片格式为jpg,png,gif';
        }else{
            return true;
        }
    }


}