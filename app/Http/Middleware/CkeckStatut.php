<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CkeckStatut
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
        //Middleware crée pour verifier si le status du pharmacien est à 0 donc il est bloqué il doit pas avoir accés à son compte
        //Ne pas oublier d'ajout ce middleware dans le tableau middleware group dans le fichier kernel
        if(auth()->check() && (auth()->user()->statut == 0)){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error','Votre compte a été suspendu veuillez contactez l\'administrateur!');
        }
        return $next($request);
    }
}
