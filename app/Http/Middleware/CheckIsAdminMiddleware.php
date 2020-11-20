<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
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
        $user = auth()->user();
       if(!in_array($user->email, ['teste@teste.com.br','alcidespsoares@gmail.com'])){
        return redirect('/');
       }else{
        return $next($request);
       }
    }
}
