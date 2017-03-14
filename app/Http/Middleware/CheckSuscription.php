<?php

namespace App\Http\Middleware;

use Closure;

class CheckSuscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $c = $request->route()->parameter('cursoId');
        $u = $request->user();

        if(is_null($c)){
            $l = $request->route()->parameter('leccionId');
            $c = $l->getCurso;
        }

        if(!$c->gratuito && !$u->premium){
            return redirect()->route('webapp.suscripcion');
        }

        return $next($request);
    }
}
