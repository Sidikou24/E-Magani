<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fonction' => ['required', 'string', 'max:255'],
            'num_reference' => 'required',
            'dateNaiss' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'codePostal' => 'required',
            'numTel' => 'required',
            'sexe' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
<<<<<<< HEAD
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'name' => $data['name'],
    //         'prenom' => $data['prenom'],
    //         'email' => $data['email'],
    //         'fonction' => $data['fonction'],
    //         'num_reference' => $data['num_reference'],
    //         'dateNaiss' => $data['dateNaiss'],
    //         'pays' => $data['pays'],
    //         'ville' => $data['ville'],
    //         'codePostal' => $data['numTel'],
    //         'numTel' => $data['numTel'],
    //         'sexe' => $data['sexe'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
    function register(Request $request){
            $request->validate([
                'name' => $data['name'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'fonction' => $data['fonction'],
                'num_reference' => $data['num_reference'],
                'dateNaiss' => $data['dateNaiss'],
                'pays' => $data['pays'],
                'ville' => $data['ville'],
                'codePostal' => $data['codePostal'],
                'numTel' => $data['numTel'],
                'sexe' => $data['sexe'],
                'password' => Hash::make($data['password']),
            ]);
            $user= new User();
            $user->name = $request->name;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->fonction = $request->fonction;
            $user->num_reference = $request->num_reference;
            $user->dateNaiss = $request->dateNaiss;
            $user->pays = $request->pays;
            $user->ville = $request->ville;
            $user->codePostal = $request->codePostal;
            $user->numTel = $request->numTel;
            $user->sexe= $request->sexe;
            $user->password = Hash::make($request->password );
            if ($user->save()) {
                return redirect()->back()->with('success','vous avez été enregistrer');
            }else {
                return redirect()->back()->with('error','l\'enregistrement a echouée');
            }
=======
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'fonction' => $data['fonction'],
            'num_reference' => $data['num_reference'],
            'dateNaiss' => $data['dateNaiss'],
            'pays' => $data['pays'],
            'ville' => $data['ville'],
            'codePostal' => $data['codePostal'],
            'numTel' => $data['numTel'],
            'sexe' => $data['sexe'],
            'password' => Hash::make($data['password']),
        ]);
>>>>>>> 7f0f29330d6f4d21b64bd893dab6bb472b5d4995
    }
}
