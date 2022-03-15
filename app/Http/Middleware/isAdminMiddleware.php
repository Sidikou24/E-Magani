<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/*à ajouter */use Illuminate\Support\Facades\Auth;

class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //verifions la valeur de l'attribut fonction de l'utilisateur authentifié est egal à administrateur
        if( Auth::Check() && Auth::user()->fonction == 'administrateur' ){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        } 
        //return $next($request);
    }
    //Ne pas oublier d'ajouter ce middleware dans le fichier kernel
}
