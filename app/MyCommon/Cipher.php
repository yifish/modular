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

    protected $ranDomCodeNumber = 6;

    protected $ranDomCode = '';

    protected $password = '';

    protected $checkPassword = '';

    public function __construct($password, $ranDomCode = '', $checkPassword = '')
    {
        $this->password = $password;
        $this->ranDomCode = $ranDomCode;
        $this->checkPassword = $checkPassword;
    }

    /**
     * 加密密码
     * @param $string string 密码字符串
     * @param $ranDomCode string 随机密钥串
     * @return string 返回字符串
     */
    public function encryption()
    {
        $this->password = $this->setMD5($this->password . $this->ranDomCode);
        return bcrypt($this->rule($this->password));
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
     * 自定义密码加密
     * @param $string string 密码字符串
     * @return string 返回字符串
     */
    public function rule($string)
    {
        return $string;
    }
    /**
     * 生成随机字符串
     * @return string 返回字符串
     */
    public function getString()
    {
        $randomString = '';
        for ($i = 0; $i < $this->ranDomCodeNumber; $i++) {
            $randomString .= $this->varChar[rand(0, strlen($this->varChar) - 1)];
        }
        return $randomString;
    }

    /**
     * 验证密码
     * @return bool true 验证成功 false 失败
     */
    public function checkPassword()
    {
        if ($this->checkPassword == '') {
            return false;
        }
        if ($this->checkPassword == $this->encryption()) {
            return true;
        }
        return false;
    }
}