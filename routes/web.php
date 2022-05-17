<?php
use App\Models\Produit;
use App\Models\Pharmacie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrdersController;
// use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\contactsController;

use App\Http\Controllers\PharmacieController;
use App\Http\Controllers\PharmacienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
   $pharmacies = DB::table('pharmacies')->get(); //Toutes les pharmacies du sites
    
    $produit1 = $request->input('produit1');
    $produit2 = $request->input('produit2');
    $produit3 = $request->input('produit3');
    $produit4 = $request->input('produit4');
    
        $produits = DB::table('produits')
                                 ->whereIn('name',[$produit1,$produit2,$produit3,$produit4])
                                 ->get();
       
                                 
    return view('welcome',compact('produits','pharmacies'));
})->name('rechercheProd');

// Route::get('/home', function () {
//     return view('home');
// });

//quand je suis authentifié en tant qu'admin et qu'on fait retour en arriére cela va nous retourner la page d'authentification 
//il faut arranger cela en creant une route de middleware
Route::middleware(['middleware' => 'empecherRetourEnArriere'])->group(function(){
    Auth::routes(); 
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//aprés application des différent middleware aux différents routes, il faut mettre à jour le fichier redirectMMiddleware
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class,'settings'])->name('admin.settings');
   
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('changer-image-profile',[AdminController::class,'updateImage'])->name('adminImageUpdate');
    Route::post('changer-password',[AdminController::class,'changepassword'])->name('adminChangePassword');

    Route::get('supprimerPharmacien/{id}', [AdminController::class,'supprimerPharmacien'])->name('suppPharmacien');
    Route::get('search_pharmacien/{id}/{status_code}', [PharmacienController::class,'search_pharmacien'])->name('search_pharmacien');
    Route::get('recherchePharmacien', [AdminController::class,'recherchePharmacien'])->name('recherchePharmacien');

});


Route::group(['prefix' => 'pharmacien', 'middleware' => ['isPharmacien','auth', 'empecherRetourEnArriere']], function(){
    // Route::get('dashboard', [PharmacienController::class,'indexs'])->name('pharmacien.dashboards');
    Route::get('dashboard/{id}', [PharmacienController::class,'index'])->name('pharmacien.dashboard');
    Route::get('profile', [PharmacienController::class,'profile'])->name('pharmacien.profile');
    Route::get('settings', [PharmacienController::class,'settings'])->name('pharmacien.settings');

    // le pharmacien modifie le profil de son employer
    Route::post('update-profile-Employe/{id}',[PharmacienController::class,'updateE'])->name('users.update');

    Route::post('update-profile-info',[PharmacienController::class,'updateInfo'])->name('pharmacienUpdateInfo');
    Route::post('changer-image-profile',[PharmacienController::class,'updateImage'])->name('pharmacienImageUpdate');
    Route::post('changer-password',[PharmacienController::class,'changepassword'])->name('pharmacienChangePassword');

    // Route::get('voir_produit',[ProduitController::class,'voir_produit'])->name('voir_produit');
    Route::get('voir_produits/{pharmacie_id}',[PharmacienController::class,'voir_produits'])->name('voir_produits'); //rechercher les produits
    Route::get('ajouterProduit', [ProduitController::class,'ajouterProduit'])->name('ajouterProduit');
    Route::post('ajouterProduit/{pharmacie_id}', [PharmacienController::class,'ajouterProduit'])->name('ajouterProduits');//Fonction qui fait l'enregistrement d'un produits
    Route::get('voir_employe/{pharmacie_id}',[PharmacienController::class,'voir_employe'])->name('voir_employe');
    Route::get('ajoutEmploye/{pharmacie_id}', [PharmacienController::class,'ajoutEmploye'])->name('ajoutEmploye'); //Pour afficher le formulaire pour ajouter un nouveau employé
    Route::post('inscrireEmploye/{pharmacie_id}', [PharmacienController::class,'inscrireEmploye'])->name('inscrireEmploye');//Fonction qui fait l'enregistrement de l'employé
    Route::get('rechercheEmploye/{id}', [PharmacienController::class,'rechercheEmploye'])->name('rechercheEmploye');
    Route::get('supprimerEmploye/{id}', [PharmacienController::class,'supprimerEmploye'])->name('suppEmploye');
    Route::get('voir_pharmacie',[PharmacieController::class,'voir_pharmacie'])->name('voir_pharmacie');
    Route::get('supprimerPharmacie/{id}', [PharmacieController::class,'supprimerPharmacie'])->name('suppPharmacie');
    Route::get('modifierPharmacie/{id}', [PharmacieController::class,'modifierPharmacie'])->name('modifierpharmacie');
    Route::get('recherchePharmacie', [PharmacieController::class,'recherchePharmacie'])->name('recherchePharmacie');
    Route::get('majPharmacie/{id}', [PharmacieController::class,'majPharmacie'])->name('majPharmacie');
});


Route::group(['prefix' => 'employe', 'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [EmployeController::class,'index'])->name('employe.dashboard');
    Route::get('profile', [EmployeController::class,'profile'])->name('employe.profile');
    Route::get('settings', [EmployeController::class,'settings'])->name('employe.settings');

    

    Route::post('update-profile-info',[EmployeController::class,'updateInfo'])->name('employeUpdateInfo');
    Route::post('changer-image-profile',[EmployeController::class,'updateImage'])->name('employeImageUpdate');
    Route::post('changer-password',[EmployeController::class,'changepassword'])->name('employeChangePassword');
});


Route::group(['prefix' => 'produit', /*'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']*/], function(){
    Route::get('dashboard', [ProduitController::class,'index'])->name('produit.dashboard');
    // Route::get('ajouterProduit', [ProduitController::class,'ajouterProduit'])->name('ajouterProduit');
    Route::get('modifierProduit/{id}', [ProduitController::class,'modifierProduit'])->name('modifierProduit');
    Route::get('majProduit/{id}', [ProduitController::class,'majProduit'])->name('majProduit');
    Route::get('supprimerProduit/{id}', [ProduitController::class,'supprimerProduit'])->name('suppProduit');
    Route::get('recherche/{pharmacie_id}', [ProduitController::class,'recherche'])->name('rechercheProduit');
});

Route::group(['prefix' => 'pharmacie', /*'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']*/], function(){
    Route::get('dashboard', [PharmacieController::class,'index'])->name('pharmacie.dashboard');
    Route::post('ajouterPharmacie', [PharmacieController::class,'enregistrer'])->name('enregistrer');
   // Route::get('listeDesPharmacies', [PharmacieController::class,'listeDesPharmacies'])->name('listeDesPharmacies');

});


//Route::get('/{email}',[PharmacienController::class, 'voir']);



// Gestions de la Ventes 

Route::get('vente/{pharmacie_id}',[OrdersController::class,'index'])->name('ventes');
Route::post('orders.store/{pharmacie_id}',[OrdersController::class,'store'])->name('orders.store');


// Employer gerer Vente
Route::get('vente',[EmployeController::class,'vente'])->name('vente');


//Contatcs
Route::get('/googlemap/{pharmacie_id}', [App\Http\Controllers\PharmacieController::class, 'map'])->name('googlemap');
Route::view('/contacts','contacts')->name('contatcts');
Route::post('/send',[contactsController::class,'send'])->name('send.email');