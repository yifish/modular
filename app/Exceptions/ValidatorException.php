<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/6
 * Time: 21:28
 */

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ValidatorException extends HttpException
{
    public function __construct(int $code, string $message = null, \Exception $previous = null, array $headers = array())
    {
        parent::__construct(422, $message, $previous, $headers, $code);
    }
}