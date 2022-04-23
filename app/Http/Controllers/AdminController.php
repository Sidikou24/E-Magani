<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use DB;

class AdminController extends Controller
{
    function index()
    {
        $pharmaciens = DB::table('users')->where('fonction', 'pharmacien')->get();
       
        return view('dashboards.admins.index',compact('pharmaciens'));
    }

    function profile()
    {
        return view('dashboards.admins.profile');
    }
    function settings()
    {
        return view('dashboards.admins.settings');
    }


    function updateInfo(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=> 'required',
            'prenom'=>'required',
            'email'=> 'required|email|unique:users',
            'fonction'=> 'required',
            'num_reference'=>'required',
            'dateNaiss'=>'required',
            'pays'=> 'required',
            'ville'=>'required',
            'codePostal'=>'required',
            'numTel'=>'required',
            'sexe'=>'required',

        ]);
        if ($validator->passes()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        } else {
            $query=  User::find(Auth::user()->id)->update([
                'name' => $request->name,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'fonction' => $request->fonction,
                'num_reference' => $request->num_reference,
                'dateNaiss' => $request->dateNaiss,
                'pays' => $request->pays,
                'ville' => $request->ville,
                'codePostal' => $request->codePostal,
                'numTel' => $request->numTel,
                'sexe'=> $request->sexe,
            ]);
            if (!$query) {
                // return redirect()->back()->with('error','Les Modification ont echouée');
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            }else {
                // return redirect()->back()->with('success','Les modification sont enregistrer ');
                 return response()->json(['status'=>1,'msg'=>'Votre profile a bien été']);
            }
        }
        
    }



    function updateImage(Request $request){
        $path='users/images/';
        $file=$request->file('admin_image');
        $new_name='UIMG_'.date('Ymd').uniqid().'.jpg';


        $upload=$file->move(public_path($path),$new_name);
        if (!$upload) {
            // return redirect()->back()->with('error','Les Modification ont echouée');
             return response()->json(['status'=>0,'msg'=>'Erreur s\'est produite .']);
        }else {
            // return redirect()->back()->with('success','Les modification sont enregistrer ');
             $oldImage=User::find(Auth::user()->id)->getAttributes()['image'];


             if ($oldImage != '') {
                 if(File::exists( public_path($path.$oldImage))){
                     File::delete( public_path($path.$oldImage));
                 }
             } 
             $update=User::find(Auth::user()->id)->update(['image'=>$new_name]);
             if (!$upload) {
                // return redirect()->back()->with('error','Les Modification ont echouée');
                 return response()->json(['status'=>0,'msg'=>'Enregistrement Echoué.']);
            }else {
                // return redirect()->back()->with('success','Les modification sont enregistrer ');
                 return response()->json(['status'=>1,'msg'=>'Votre profile a bien été modifier']);
            }
             
        }
    }



    function changepassword(Request $request){
        $validator = Validator::make($request->all(),[
            'oldpassword'=>[
                'required',function($attribute,$value,$fail){
                    if (!Hash::check($value,Auth::user()->password)) {
                        return $fail(__('L\'ancien mot de passe est incorrect'));
                    }
                    
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword',

        ],
        [
            'oldpassword.required'=>'entrer votre ancien mot de passe', 
            'oldpassword.min'=>'L\ancien mot de passe doit avoir au moins 8 caracters',
            'oldpassword.max'=>'L\ancien mot de passe ne doit pas depasser 30 caracters' , 
            'newpassword.required'=>'entrer votre nouveau mot de passe',
            'newpassword.min'=>'Le nouveau mot de passe doit avoir au moins 8 caracters',
            'newpassword.max'=>'Le nouveau mot de passe ne doit pas depasser 30 caracters' , 
            'cnewpassword.required'=>'ReEntrer votre nouveau mot de passe',
            'cnewpassword.same'=>'Le nouveau mot de passe doit correspondre avec celui ci'  
        ]);
        if (!$validator->passes()) {
            // return redirect()->back()->with('error','Les Modification ont echouée');
              return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else {
            // return redirect()->back()->with('success','Les modification sont enregistrer ');
            $update= User::find(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);
            if (!$update) {
                return response()->json(['status'=>0,'msg'=>'Les Modification ont echouée.']);
                // return redirect()->back()->with('error','Les Modification ont echouée');
            } else {
                return response()->json(['status'=>1,'msg'=>'Le Mot de passe a été changer']);
                // return redirect()->back()->with('success','Le Mot de passe a été changer ');
            }
            
        }
    }

    function recherchePharmacien(){
        $nomSaisi = $_GET['recherche'];
        $pharmaciens = DB::table('users')
                                        ->where('name', 'LIKE', '%'.$nomSaisi.'%')
                                        ->where('fonction','pharmacien')
                                        ->get();
        return view('dashboards.admins.gestionPharmaciens', compact('pharmaciens'));
    }

}
