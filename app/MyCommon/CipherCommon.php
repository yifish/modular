<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 22:01
 */

namespace App\MyCommon;


class CipherCommon
{
    protected $varChar = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    protected $ranDomCode = '';

    protected $ranDomCodeNumber = 6;
    /**
     * MD5加密
     * @param $string string 字符串
     * @return string MD5加密字符串
     */
    public function setMD5($string)
    {
        if (strlen($string) != 32) {
            return md5($string);
        }
        return $string;
    }

    /**
     * 生成随机字符串
     * @return string 返回字符串
     */
    public function getString()
    {
        if ($this->ranDomCode != '') {
            return $this->ranDomCode;
        }
        $randomString = '';
        for ($i = 0; $i < $this->ranDomCodeNumber; $i++) {
            $randomString .= $this->varChar[rand(0, strlen($this->varChar) - 1)];
        }
        return $randomString;
    }
}