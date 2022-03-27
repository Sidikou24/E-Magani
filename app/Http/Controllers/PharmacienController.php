<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

class PharmacienController extends Controller
{
    function index(){
        return view('dashboards.pharmaciens.index');
    }

    function profile(){
        return view('dashboards.pharmaciens.profile');
    }

    function settings()
    {
        return view('dashboards.pharmaciens.settings');
    }

    function search_pharmacien(){
        $pharmaciens = DB::table('users')->where('fonction', 'pharmacien')->get();
        return view('dashboards.admins.gestionPharmaciens', compact('pharmaciens'));
    }

    function ajoutEmploye(){
        return view('dashboards.employes.ajoutEmploye');
    }

    function inscrireEmploye(Request $request){
        $request->validate([
           'pharmacien_id' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'prenom' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fonction' => ['required', 'string', 'max:255'],
            'num_reference',
            'dateNaiss' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'codePostal' => 'required',
            'numTel' => 'required',
            'sexe' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user= new User();
        $user->pharmacien_id = Auth::user()->id;
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
            return redirect()->back()->with('success','Employé ajouté avec succés');
        }else {
            return redirect()->back()->with('error','l\'enregistrement a echouée');
        }
    }

}
