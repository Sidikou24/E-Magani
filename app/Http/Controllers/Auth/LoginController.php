<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

        //j'ai implementé la fonction redirectTo pour la redirection des utilisateurs authentifié

        protected function redirectTo(){
            //Selon la valeur de l'utilisateur authentifié, on le redirige vers sa page
            if( Auth()->user()->fonction == "administrateur" ){
                return route('admin.dashboard');
            }
            elseif( Auth()->user()->fonction == "pharmacien" ){
                return route('voir_pharmacie');
            }
            elseif( Auth()->user()->fonction == "employé" ){
                return route('employe.dashboard');
            }
        }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //j'ai creé la fonction login
    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Verifions le mot de passe et l'email saisi
        if( auth()->attempt(array('email' => $input['email'] , 'password' => $input['password'])) ){
            if( auth()->user()->fonction == 'administrateur' ){
                return redirect()->route('admin.dashboard');
            }
            elseif( auth()->user()->fonction == "pharmacien" ){
                return redirect()->route('voir_pharmacie');
            }
            elseif( auth()->user()->fonction == 'employé' ){
                return redirect()->route('employe.dashboard');
            }
        }
        else{
            return redirect()->route('login')->with('error', 'Email et Mot de passe incorrect');
        }
    }
}
