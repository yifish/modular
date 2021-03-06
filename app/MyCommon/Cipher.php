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
class Cipher extends CipherCommon
{
    protected $password = '';

    protected $checkPassword = '';

    public function __construct($password, $ranDomCode = true, $checkPassword = '')
    {
        $this->password = $password;
        if (is_string($ranDomCode)) {
            $this->ranDomCode = $ranDomCode;
        } else {
            $this->ranDomCode = $this->getString();
        }
        $this->checkPassword = $checkPassword;
    }
    /**
     * 加密密码
     * @return string 返回字符串
     */
    public function encryption()
    {
//        $this->password = $this->setMD5($this->password . $this->ranDomCode);
        $this->dccryption();
        return encrypt($this->rule($this->password));
    }
    /**
     * 生成加密之前的密码
     * @return string 返回字符串
     */
    public function dccryption()
    {
        return $this->password = $this->setMD5($this->password . $this->ranDomCode);
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
     * 验证密码
     * @return bool true 验证成功 false 失败
     */
    public function checkPassword()
    {
        if ($this->checkPassword == '') {
            return false;
        }
        if (decrypt($this->checkPassword) == $this->dccryption()) {
            return true;
        }
        return false;
    }
}