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
});


Route::group(['prefix' => 'pharmacien', 'middleware' => ['isPharmacien','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [PharmacienController::class,'index'])->name('pharmacien.dashboard');
    Route::get('profile', [PharmacienController::class,'profile'])->name('pharmacien.profile');
    Route::get('settings', [PharmacienController::class,'settings'])->name('pharmacien.settings');
    Route::get('voir_produit',[ProduitController::class,'voir_produit'])->name('voir_produit');
    Route::get('ajouterProduit', [ProduitController::class,'ajouterProduit'])->name('ajouterProduit');
    Route::get('ajoutEmploye', [PharmacienController::class,'ajoutEmploye'])->name('ajoutEmploye'); //Pour afficher le formulaire pour ajouter un nouveau employé
    Route::post('inscrireEmploye', [PharmacienController::class,'inscrireEmploye'])->name('inscrireEmploye');//Fonction qui fait l'enregistrement de l'employé
});


Route::group(['prefix' => 'employe', 'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [EmployeController::class,'index'])->name('employe.dashboard');
    Route::get('profile', [EmployeController::class,'profile'])->name('employe.profile');
    Route::get('settings', [EmployeController::class,'settings'])->name('employe.settings');
     //Fonction qui fait l'enregistrement de l'employé
    //Route::post('inscrireEmploye', [EmployeController::class,'inscrireEmploye'])->name('inscrireEmploye');
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
