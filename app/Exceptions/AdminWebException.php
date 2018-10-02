<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/2
 * Time: 9:56
 */

namespace App\Exceptions;

use Exception;
use Throwable;

class AdminWebException extends Exception
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
        return back()->with('errors', $this->errors)->withInput();
    }
}