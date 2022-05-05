<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Pharmacie;
use Illuminate\Http\File;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class PharmacieController extends Controller
{
    function index()
    {
        return view('dashboards.pharmacies.index');
    }

    function enregistrer(Request $request){

        $validator = Validator::make($request->all(),[
                'name' => 'required|string',
                'localite' => 'required|string',
                'dateCrea' => 'required',
                'nbrAgent' => 'required',
                'pharmacie_image' => 'required|image',//|mimes:jpeg,bmp,png
        ],[
            'name.required'=>'Le nom de la Pharmacie est obligatoire',
            'name.string'=>'Le Nom de la Pharmacie doit etre une chaine',
            'localite.required'=>'la localite est obligatoire',
            'localite.string'=>'la localite doit etre une chaine',
            'pharmacie_image.required'=>'Pharmacie Image est Obligatoire',
            'pharmacie_image.image'=>'Le fichier doit etre une image',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code'=>0,'error'=>$validator->errors()->toArray()]);
        } else {
            $path = 'files/';
            $file = $request->file('pharmacie_image');
            $file_name = time().'_'.$file->getClientOriginalName();
            // $upload = $file->storeAs($path, $file_name);
            $upload = $file->storeAs($path, $file_name, 'public');
            
            if ($upload) {
                Pharmacie::insert([
                    'pharmacien_id' => auth()->user()->id,
                   'name' => $request->name,
                   'localite' => $request->localite,
                   'dateCrea' => $request->dateCrea,
                   'nbrAgent' => $request->nbrAgent,
                   'nom_proprio' => auth()->user()->prenom,
                    'pharmacie_image' => $file_name,

                ]);
                return response()->json(['code'=>1,'msg'=>'nouvel pharmacie']);
            }
        }
        
        
    }    

    function voir_pharmacie(){
        $pharmacien_id = auth()->user()->id;
        $employer = DB::table('users')->get();
        $pharmacies = DB::table('pharmacies')->where('pharmacien_id',$pharmacien_id)->get(); //relation One to Many;
        return view('dashboards.pharmacies.gestionPharmacies',[
            'pharmacies' => $pharmacies,
            'employer' => $employer,
        ]);
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
        if (!$pharmacie) {
           return back()->with('error','Employer introuvable');
        }
        $pharmacie->update($request->all());
        return back()->with('success','Employer Modifier');
    }

    function listeDesPharmacies(){
        $pharmacies = DB::table('pharmacies')->get();
        return view('listePharmacie',compact('pharmacies'));
    }

    // function recherchePharmacie(){
        
    //     $pharmacieSaisi = $_GET['recherche'];
    //     $pharmacies = DB::table('pharmacies')
    //                                     ->where('name', 'LIKE', '%'.$pharmacieSaisi.'%')
    //                                     ->where('pharmacien_id',auth()->user()->id)
    //                                     ->get();
    //     return view('dashboards.pharmacies.gestionpharmacies', compact('pharmacies'));
    
    function recherchepharmacie(Request $request){
        $pharmacies = Pharmacie::all();

        if($request->keyword != ''){
            $pharmacies = Pharmacie::where('name','LIKE','%'.$request->keyword.'%')
                                    ->where('pharmacien_id',auth()->user()->id)
                                    ->get();
        }
        return response()->json([
            'pharmacies' => $pharmacies
        ]);
    }
}