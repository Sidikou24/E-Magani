<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PharmacienController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PharmacieController;
use Illuminate\Support\Facades\Auth;
use App\Produit;

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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('search_pharmacien', [PharmacienController::class,'search_pharmacien'])->name('search_pharmacien');
    Route::get('recherchePharmacien', [AdminController::class,'recherchePharmacien'])->name('recherchePharmacien');
});


Route::group(['prefix' => 'pharmacien', 'middleware' => ['isPharmacien','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard/{id}', [PharmacienController::class,'index'])->name('pharmacien.dashboard');
    Route::get('profile', [PharmacienController::class,'profile'])->name('pharmacien.profile');
    Route::get('settings', [PharmacienController::class,'settings'])->name('pharmacien.settings');
    Route::get('voir_produit',[ProduitController::class,'voir_produit'])->name('voir_produit');
    Route::get('ajouterProduit', [ProduitController::class,'ajouterProduit'])->name('ajouterProduit');
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
});
Route::group(['prefix' => 'produit', /*'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']*/], function(){
    Route::get('dashboard', [ProduitController::class,'index'])->name('produit.dashboard');
    Route::get('ajouterProduit', [ProduitController::class,'ajouterProduit'])->name('ajouterProduit');
    Route::get('modifierProduit/{id}', [ProduitController::class,'modifierProduit'])->name('modifierProduit');
    Route::get('majProduit/{id}', [ProduitController::class,'majProduit'])->name('majProduit');
    Route::get('supprimerProduit/{id}', [ProduitController::class,'supprimerProduit'])->name('suppProduit');
    Route::get('recherche', [ProduitController::class,'recherche'])->name('rechercheProduit');
    // Route::get('NomDupharmacien', [ProduitController::class, 'user'])->name('nomdupharmacien');
});

Route::group(['prefix' => 'pharmacie', /*'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']*/], function(){
    Route::get('dashboard', [PharmacieController::class,'index'])->name('pharmacie.dashboard');
    Route::get('ajouterPharmacie', [PharmacieController::class,'enregistrer'])->name('enregistrer');
});


//Route::get('/{email}',[PharmacienController::class, 'voir']);
