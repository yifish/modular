<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/5
 * Time: 0:32
 */

namespace App\MyCommon;

/**
 * 密码类
 */
class Cipher
{
    protected $varChar = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public function __construct()
    {
    }

    /**
     * 自定义密码加密
     * @param $string string 密码字符串
     * @return string 返回字符串
     */
    public function rule($string)
    {
        return $string;
    }

    /**
     * 加密密码
     * @param $string string 密码字符串
     * @return string 返回字符串
     */
    public function encryption($string, $ranDomCode = '')
    {
        $string = $this->setMD5($string . $ranDomCode);
        return bcrypt($this->rule($string));
    }

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
     * @param $number number 随机生成字符的长度
     * @return string 返回字符串
     */
    public function getString($number)
    {
        $randomString = '';
        for ($i = 0; $i < $number; $i++) {
            $randomString .= $this->varChar[rand(0, strlen($this->varChar) - 1)];
        }
        return $randomString;
    }
}