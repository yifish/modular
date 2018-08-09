<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/9
 * Time: 20:41
 */

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class AbnormalException extends HttpException
{
    public function __construct(int $code, string $message = null, \Exception $previous = null, array $headers = array())
    {
        parent::__construct(404, $message, $previous, $headers, $code);
    }
}