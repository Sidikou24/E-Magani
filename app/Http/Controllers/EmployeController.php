<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\User;
use App\Models\Orders;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use App\Models\Order_details;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeController extends Controller
{
    function index(){
      
        return view('dashboards.pharmaciens.home');
    }

    function profile(){
        return view('dashboards.employes.profile');
    }
    function settings()
    {
        return view('dashboards.employes.settings');
    }


    function updateInfo(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=> 'required',
            'prenom'=>'required',
            'email'=> 'required|email|unique:users',
            'fonction'=> 'required',
            // 'num_reference'=>'required',
            // 'dateNaiss'=>'required',
            // 'pays'=> 'required',
            // 'ville'=>'required',
            // 'codePostal'=>'required',
            'numTel'=>'required',
            'sexe'=>'required',

        ]);
        if ($validator->passes()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        } else {
            $path='users/images/';
             $fontPath= public_path('fonts/cream-DEMO.ttf');
             $char= strtoupper($request->name[0]);
             $newAvatarName =  rand(12,34353).time().'_avatar.png';
             $dest= $path.$newAvatarName;
 
            $createAvatar = makeAvatar($fontPath,$dest,$char);
            $picture = $createAvatar == true ? $newAvatarName : '';
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
        $file=$request->file('employe_image');
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



    public function vente()
    {
        $user_ids = auth()->user()->pharmacien_id;
        $user_id= auth()->user()->id;
        $pharmacie = Pharmacie::find(auth()->user()->pharmacie_id);
        // $pharmacien = auth()->user();
        // $produits = $pharmacien->produits; //DB::table('produits')->where('user_id',$user_id)->get();
        $orders = Orders::where('user_id',$user_ids AND 'pharmacie_nom',$pharmacie->name)->get();

        $lastID= Order_details::where('pharmacie_nom',$pharmacie->name)
                                                                    ->max('order_id');
         // lats order details
         $order_receipts = Order_details::where('order_id', $lastID)->get();
         $order_Jour= Order_details::where('created_at', '>=', Carbon::now()->subDay())
                                ->where('pharmacie_nom',$pharmacie->name)
                                ->where('user_id', $user_id)
                                ->get();
         // Les ventes Hebdomadaires 
         $order_Semaine =Order_details::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                                                        ->where('pharmacie_nom',$pharmacie->name)
                                                        ->where('user_id', $user_id)
                                                        ->get();
                        // Les ventes Du mois 
        $order_Mois= Order_details::where('pharmacie_nom',$pharmacie->name)
                                    ->whereMonth('created_at', date('m'))
                                    ->whereYear('created_at', date('Y'))
                                    ->where('user_id', $user_id)
                                    ->get();
                                     // Les ventes de L'Annee
        $order_Annee = Order_details::where('pharmacie_nom',$pharmacie->name)
                                        ->whereYear('created_at', date('Y'))
                                        ->where('user_id', $user_id)
                                        ->get();
        $produits = DB::table('produits')
                                        ->where('user_id',$user_ids)
                                        ->where('pharmacie_nom',$pharmacie->name)
                                        ->get();
        return view('dashboards.orders.index',[
            'produits'=>$produits,
            'pharmacie'=>$pharmacie,
            'orders'=>$orders,
            'order_Jour'=>$order_Jour,
            'order_Semaine'=>$order_Semaine,
            'order_Mois'=>$order_Mois,
            'order_Annee'=>$order_Annee,
            'order_receipts'=>$order_receipts,
        ]);
        // ,compact('produits','pharmacie','orders')
    }


    function search_employer($pharmacien_id, $status_code){
        $Pharmacien = User::whereId($pharmacien_id)->update([
            'statut' => $status_code
        ]);
        $user_id = auth()->user()->id;
        $employes = DB::table('users')
                                        ->where('pharmacien_id',$user_id)
                                        ->get();
        return view('dashboards.pharmaciens.settings', compact('employes'));
    }


}

