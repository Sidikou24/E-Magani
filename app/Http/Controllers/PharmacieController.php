<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacie;
use App\Models\User;
use DB;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PharmacieController extends Controller
{
    function index()
    {
        return view('dashboards.pharmacies.index');
    }

    function enregistrer(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'localite' => 'required',
            'dateCrea' => 'required',
            'nbrAgent' => 'required',
        ]);
        $pharmacie = new Pharmacie();
        $pharmacie->pharmacien_id = auth()->user()->id;
        $pharmacie->name = $request->name;
        $pharmacie->nom_proprio = auth()->user()->prenom;
        $pharmacie->localite = $request->localite;
        $pharmacie->dateCrea = $request->dateCrea;
        $pharmacie->nbrAgent = $request->nbrAgent;
        
        if ($pharmacie->save()) {
            return redirect()->back()->with('success','pharmacie ajouté avec succés');
        }else {
            return redirect()->back()->with('error','l\'enregistrement a echouée');
        }
    }    

    function voir_pharmacie(){
        $pharmacien_id = auth()->user()->id;
        $pharmacies = DB::table('pharmacies')->where('pharmacien_id',$pharmacien_id)->get(); //relation One to Many;
        return view('dashboards.pharmacies.gestionPharmacies',compact('pharmacies'));
    }

    function supprimerPharmacie($id){
        $pharmacie = Pharmacie::find($id);
        $pharmacie->delete(); 
      return redirect()->back();
    }

    function modifierPharmacie($id){
        $pharmacie = Pharmacie::find($id);
        return view('dashboards.pharmacies.modificationPharmacies',compact('pharmacie')); 
    }

    function majPharmacie(Request $request,$id){
        $pharmacie = Pharmacie::find($id);

        $nouvPharmacie = $request->all();
        //$pharmacie->name = $nouvPharmacie['name'];
        $pharmacie->localite = $nouvPharmacie['localite'];
       // $pharmacie->dateCrea = $nouvPharmacie['dateCrea'];
        $pharmacie->nbrAgent = $nouvPharmacie['nbrAgent'];
        $pharmacie->save();
        return redirect('pharmacien/voir_pharmacie');
    }

}
