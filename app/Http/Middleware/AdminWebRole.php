<?php

namespace App\Http\Middleware;

use Closure;
use App\MyModel\competenceModel;
use App\Exceptions\AdminWebException;

class AdminWebRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $admin = session('admin');
        if(empty($admin)){
            return redirect()->guest('admin/login');
        }
        if ($admin->roles['competence'] != '*') {
            if (!$role) {
                throw new AdminWebException(trans('login.null_competence'));
            }
            $competence = competenceModel::where('competence', $role)->first();
            if (!$competence) {
                throw new AdminWebException(trans('login.null_competence'));
            }
            if (strpos($admin->roles['competence'],',' . $competence->id . ',',0) === false) {
                throw new AdminWebException(trans('login.no_competence'));
            }
        }
        return $next($request);
    }
}
