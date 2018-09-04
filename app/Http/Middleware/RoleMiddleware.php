<?php

namespace App\Http\Middleware;

use Closure;
use App\MyTrait\TokenTrait;
use App\MyTrait\CompetenceTrait;

class RoleMiddleware
{
    use TokenTrait,CompetenceTrait;
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
        $this->checkCompetence($role, $admin->roles['competence']);
        return $next($request);
    }
}
