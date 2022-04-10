<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Pharmacie;
use DB;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProduitController extends Controller
{
    function index($pharmacie_id)
    {
        $pharmacie = Pharmacie::find($pharmacie_id);
        return view('dashboards.produits.index', compact('pharmacie'));
    }

    function ajouterProduit(Request $request, $pharmacie_id){
        $pharmacie = Pharmacie::find($pharmacie_id);
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'num_lot' => 'required',
            'quantite' => 'required',
            'prix' => 'required',
            'dateFab' => 'required',
            'datePer' => 'required',
        ]);
        $produit= new Produit();
        $produit->user_id = auth()->user()->id; 
        $produit->name = $request->name;
        $produit->num_lot = $request->num_lot;
        $produit->quantite = $request->quantite;
        $produit->prix = $request->prix;
        $produit->dateFab = $request->dateFab;
        $produit->datePer = $request->datePer;
        $produit->pharmacie_nom = $pharmacie->name;
        
        if ($produit->save()) {
            return redirect()->back()->with('success','Produit ajouté avec succés');
        }else {
            return redirect()->back()->with('error','l\'enregistrement a echouée');
        }
    }

    function voir_produit($id){
        $pharmacie = Pharmacie::find($id);
        $user_id = auth()->user()->id;
        $produits = DB::table('produits')
                                         ->where('user_id',$user_id)
                                         ->where('pharmacie_nom',$pharmacie->name)
                                         ->get();
        return view('dashboards.produits.gestionProduits',compact('produits','pharmacie'));
    }

    function supprimerProduit($id){
        $produit = Produit::find($id);
        $produit->delete(); 
      return redirect()->back();
    }

    function modifierProduit($id){
        $produit = Produit::find($id);
        return view('dashboards.produits.modificationProduit',compact('produit')); 
    }

    function majProduit(Request $request,$id){
        $nouvProduit = $request->all();
        
        $produit = Produit::find($id);
        $produit->name = $nouvProduit['name'];
        $produit->num_lot = $nouvProduit['num_lot'];
        $produit->quantite = $nouvProduit['quantite'];
        $produit->prix = $nouvProduit['prix'];
        $produit->dateFab = $nouvProduit['dateFab'];
        $produit->datePer = $nouvProduit['datePer'];
        $produit->save();

        return redirect()->back();
        //return redirect('pharmacien/voir_produit');
    }

    function recherche($pharmacie_id){
        $pharmacie = Pharmacie::find($pharmacie_id);
        $user_id = auth()->user()->id;
        $produitSaisi = $_GET['recherche'];
        $produits = DB::table('produits')
                                        ->where('name', 'LIKE', '%'.$produitSaisi.'%')
                                        ->where('pharmacie_nom',$pharmacie->name)
                                        ->where('user_id',$user_id)
                                        ->get();
        return view('dashboards.produits.rechercheProduit', compact('produits','pharmacie'));
    }

    function clientformProduitSearch(){
        return view('clientProduitSearch');
    }

    function clientProduitSearch(){
        $produit1 = $_GET['produit1'];
        $produit2 = $_GET['produit2'];
        $produit3 = $_GET['produit3'];
        $produit4 = $_GET['produit4'];

        $produits = DB::table('produits')
                                         ->whereIn('name',[$produit1,$produit2,$produit3,$produit4])
                                         ->get();

        return view('resultatRechercheProduit',compact('produits'));                                 
    }
}