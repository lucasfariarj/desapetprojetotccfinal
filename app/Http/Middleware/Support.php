<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Support
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if($user->admin == 1){
            return $next($request);
        }else{
            return redirect('/dashboard');
        }
        
    }
}
