<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAdmin
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
         $user = \Auth::user();
         if ($user && $user->isAdmin()) {
             return $next($request);
         }
         return redirect(route('cabinet.user', ['name'=>$user->name]))->with('status', 'Вы не являетесь Администратором');

    }
}