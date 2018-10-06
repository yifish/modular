<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6
 * Time: 14:29
 */

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\MessageBag;

class WebException extends Exception
{
    private $errors;

    public function __construct($message, int $code = 200, Throwable $previous = null)
    {
        $this->errors = $message;
        parent::__construct('', $code, $previous);
    }
    /**
     * Report the exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        $messageBag = new MessageBag($this->errors);
        return back()->with('errors', $messageBag)->withInput();
    }
}