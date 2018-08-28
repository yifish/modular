<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/28
 * Time: 22:33
 */

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class SuccessException extends HttpException
{
    public function __construct(int $code, string $message = null, \Exception $previous = null, array $headers = array())
    {
        parent::__construct(200, $message, $previous, $headers, $code);
    }
}