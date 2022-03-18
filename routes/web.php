<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PharmacienController;
use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Auth;

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
});


Route::group(['prefix' => 'pharmacien', 'middleware' => ['isPharmacien','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [PharmacienController::class,'index'])->name('pharmacien.dashboard');
    Route::get('profile', [PharmacienController::class,'profile'])->name('pharmacien.profile');
    Route::get('settings', [PharmacienController::class,'settings'])->name('pharmacien.settings');
});


Route::group(['prefix' => 'employe', 'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [EmployeController::class,'index'])->name('employe.dashboard');
    Route::get('profile', [EmployeController::class,'profile'])->name('employe.profile');
    Route::get('settings', [EmployeController::class,'settings'])->name('employe.settings');
});