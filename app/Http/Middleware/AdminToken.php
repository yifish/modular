<?php

namespace App\Http\Middleware;

use Closure;
use App\MyTrait\TokenTrait;

class AdminToken
{
    use TokenTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->adminToken($request);
        return $next($request);
    }
}
