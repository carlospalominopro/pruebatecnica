<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Flash;

class BannedUser
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


        if (\Auth::check()) {

            $user = \App\User::where('id',\Auth::id())->first();

          
            if ($user->status == 0 || $user->status == "0") {

                Flash::error('Tu cuenta se encuentra inactiva');
                return redirect('login')->with(\Auth::logout());
            }
            else{
                return $next($request);
            }
        }
        else{
            return $next($request);
        }
        

    }
}
