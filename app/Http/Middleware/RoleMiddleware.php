<?php

namespace App\Http\Middleware;

use Closure;
use App\MyTrait\TokenTrait;

class RoleMiddleware
{
    use TokenTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  String $role 权限参数
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $this->adminToken($request);
        $admin = $this->getAdmin();
        dd($admin);
        return $next($request);
    }
}
