<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
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
        $file=$request->file('pharmacien_image');
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

        $path='users/images/';
        $fontPath= public_path('fonts/cream-DEMO.ttf');
        $char= strtoupper($request->name[0]);
        $newAvatarName =  rand(12,34353).time().'_avatar.png';
        $dest= $path.$newAvatarName;

       $createAvatar = makeAvatar($fontPath,$dest,$char);
       $picture = $createAvatar == true ? $newAvatarName : '';

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
        $user->image= $picture;
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
