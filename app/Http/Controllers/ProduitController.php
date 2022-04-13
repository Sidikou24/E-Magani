<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Pharmacie;
use DB;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ProduitController extends Controller
{
    function index()
    {
        $produits= Produit::paginate(5);
        return view('dashboards.produits.gestionProduits',['produits'=>$produits]);
    }

    function ajouterProduit(Request $request,  $pharmacien_id){
        $pharmacie = Pharmacie::find($pharmacie_id);//Récuperation de la pharmacie dans laquelle on souhaite faire l'ajout
        $pharmacien_id = auth()->user()->id;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'num_lot' => 'required',
            'quantite' => 'required',
            'prix' => 'required',
            'dateFab' => 'required',
            'datePer' => 'required',
            'pharmacie_nom' => 'required',
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

    function voir_produit(){
        $user_id = auth()->user()->id;
        $pharmacien = auth()->user();
        $produits = $pharmacien->produits; //DB::table('produits')->where('user_id',$user_id)->get();
        return view('dashboards.produits.gestionProduits',compact('produits'));
    }

    function supprimerProduit($id){
        $produit = Produit::find($id);
        $produit->delete(); 
        return back()->with('success','Produit Supprimer');
    }

    function modifierProduit($id){
        $produit = Produit::find($id);
        return view('dashboards.produits.modificationProduit',compact('produit')); 
    }

    function majProduit(Request $request,$id){
        $produit = Produit::find($id);
        // $nouvProduit = $request->all();
        if (! $produit) {
            return back()->with('error','Produit introuvable');
         }
          $produit->update($request->all());
         return back()->with('success','Produit Modifier');
         
        // $produit->name = $nouvProduit['name'];
        // $produit->num_lot = $nouvProduit['num_lot'];
        // $produit->quantite = $nouvProduit['quantite'];
        // $produit->prix = $nouvProduit['prix'];
        // $produit->dateFab = $nouvProduit['dateFab'];
        // $produit->datePer = $nouvProduit['datePer'];
        // $produit->save();

        // return redirect('pharmacien/voir_produit');
    }



    function recherche(){
        $user_id = auth()->user()->id;
        $produitSaisi = $_GET['recherche'];
        $produits = DB::table('produits')
                                        ->where('name', 'LIKE', '%'.$produitSaisi.'%')
                                        ->where('user_id',$user_id)
                                        ->get();
        return view('dashboards.produits.rechercheProduit', compact('produits'));
    }
}