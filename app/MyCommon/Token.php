<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 22:08
 */

namespace App\MyCommon;

/**
 * Token类
 */
class Token extends CipherCommon
{
    public function __construct($ranDomCodeNumber = 32)
    {
        $this->ranDomCodeNumber = $ranDomCodeNumber;
        $this->ranDomCode = $this->getString();
    }
    /**
     * 自定义token加密
     * @param $string string token字符串
     * @return string 返回字符串
     */
    public function rule($string)
    {
        return $string;
    }
    /**
     * 加密token
     * @return string 返回字符串
     */
    public function encryption()
    {
        $this->ranDomCode = $this->setMD5($this->ranDomCode);
        return bcrypt($this->rule($this->ranDomCode));
    }



}