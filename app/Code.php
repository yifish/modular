<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 22:29
 */

namespace App;

class Code
{
    const SUCCESS = 200;
    const CANT_INCLUDE_SPACES = 420;//不能包含空格
    const NOT_EXIST = 421;//不存在
    const AREA_INCORRECTNESS = 423;//地区信息不正确
    const MISMATCHING = 424;//不匹配
    const USERNAME_ERROR = 425;//用户名错误
    const USER_PASSWORD_ERROR = 426;//用户密码错误
    const EXIST = 427;//已存在该信息
    const SAME = 439;//相同
    const CANNOT_UPDATE = 440; //无法修改
    const NUMBER_BEYOND = 441; //数量超出指定范围
    const ILLEGAL_OPERATION = 442;//非法操作
    const EMPTY_TOKEN = 480;//token为空
    const TOKEN_ERROR = 481;//token错误
    const TOKEN_PAST_DUE = 482;//token过期
    const CAPTCHA_ERROR = 483;//验证码错误
    const CREDIT_CARD_NOT_EXIST = 484;//信用卡不存在
    const NO_COMPETENCE = 485;//权限为空
    const NULL_COMPETENCE = 486;//没有权限



    const NOT_EXIST_INFO = 401;//不存在该信息
    const DATA_EXISTED = 101;
    const INSERT_FAILED = 102;
    const ERROR_BEING_CODE = 103;
    const OPERATE_ERROR = 104;//操作失败
    const INSERT_STATISTIC_FAILED = 105;
    const PARAMETER_ERROR = 106;//参数错误
    const NOT_COLLECTED = 107;//不是已收藏店铺
    //
    const BE_DEFEATED = 500;//失败
}
