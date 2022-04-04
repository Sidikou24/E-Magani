<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Pharmacie;
use DB;

class PharmacienController extends Controller
{
    function index($id){
        $pharmacie = Pharmacie::find($id);
        return view('dashboards.pharmaciens.index',compact('pharmacie'));
    }

    function supprimerEmploye($id){
        $employe = User::find($id);
        $employe->delete(); 
      return redirect()->back();
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

    function ajoutEmploye($pharmacie_id){
        $pharma = Pharmacie::find($pharmacie_id);//Récuperation de la pharmacie dans laquelle on souhaite faire l'ajout
        $pharmacien_id = auth()->user()->id;
        // $pharmacies = DB::table('pharmacies')->where('pharmacien_id',$pharmacien_id)->get();
        return view('dashboards.employes.ajoutEmploye',compact('pharma'));
    }

    function inscrireEmploye(Request $request, $pharmacie_id){
        $pharmacie = Pharmacie::find($pharmacie_id);//Récuperation de la pharmacie dans laquelle on souhaite faire l'ajout

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'fonction' => ['required', 'string', 'max:255'],
            'pharmacie_nom' => 'required',
            'dateNaiss' => 'required',
            'pays' => 'required',
            'ville' => 'required',
            'codePostal' => 'required',
            'numTel' => 'required',
            'sexe' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user= new User();
        $user->pharmacien_id = auth()->user()->id;
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->fonction = $request->fonction;
        $user->pharmacie_nom = $pharmacie->name; //prend le nom de la pharmacie dans laquelle on souhaite faire l'ajout        $user->dateNaiss = $request->dateNaiss;
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

    function voir_employe($pharmacie_id){
        $user_id = auth()->user()->id;
        $pharmacie = Pharmacie::find($pharmacie_id);
        $employes = DB::table('users')
                                      ->where('pharmacien_id',$user_id)
                                      ->where('pharmacie_nom',$pharmacie->name)
                                      ->get();
        
        return view('dashboards.employes.gestionEmployes',compact('employes','pharmacie'));
    }

    function rechercheEmploye($pharmacie_id){
        $pharmacie = Pharmacie::find($pharmacie_id);
        $user_id = auth()->user()->id;
        $employeSaisi = $_GET['recherche'];
        $employes = DB::table('users')
                                        ->where('name', 'LIKE', '%'.$employeSaisi.'%')
                                        ->where('pharmacien_id',$user_id)
                                        ->where('pharmacie_nom',$pharmacie->name)
                                        ->get();
        return view('dashboards.employes.gestionEmployes', compact('employes','pharmacie'));
    }
}
