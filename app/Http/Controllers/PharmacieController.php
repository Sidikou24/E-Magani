<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pharmacie;

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
}
