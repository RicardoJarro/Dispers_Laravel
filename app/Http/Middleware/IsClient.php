<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsClient
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


        // if (auth()->user()->rol == 'cliente') {
        //     return $next($request);
        // }

        // // return 'eres un admin';
        // redirect()->route('prueba2');


        if ( Auth::check() && Auth::user()->rol=='cliente' ) {
            //Auth::id();         
             //return Auth::id() ;
            return $next($request);
        } 
        //return redirect('home');
        return redirect('prueba2');
    }
}
