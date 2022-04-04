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



    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('changer-image-profile',[AdminController::class,'updateImage'])->name('adminImageUpdate');
    Route::post('changer-password',[AdminController::class,'changepassword'])->name('adminChangePassword');
});


Route::group(['prefix' => 'pharmacien', 'middleware' => ['isPharmacien','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [PharmacienController::class,'index'])->name('pharmacien.dashboard');
    Route::get('profile', [PharmacienController::class,'profile'])->name('pharmacien.profile');
    Route::get('settings', [PharmacienController::class,'settings'])->name('pharmacien.settings');


    Route::post('update-profile-info',[PharmacienController::class,'updateInfo'])->name('pharmacienUpdateInfo');
    Route::post('changer-image-profile',[PharmacienController::class,'updateImage'])->name('pharmacienImageUpdate');
    Route::post('changer-password',[PharmacienController::class,'changepassword'])->name('pharmacienChangePassword');
});


Route::group(['prefix' => 'employe', 'middleware' => ['isEmploye','auth', 'empecherRetourEnArriere']], function(){
    Route::get('dashboard', [EmployeController::class,'index'])->name('employe.dashboard');
    Route::get('profile', [EmployeController::class,'profile'])->name('employe.profile');
    Route::get('settings', [EmployeController::class,'settings'])->name('employe.settings');
    

    Route::post('update-profile-info',[EmployeController::class,'updateInfo'])->name('employeUpdateInfo');
    Route::post('changer-image-profile',[EmployeController::class,'updateImage'])->name('employeImageUpdate');
    Route::post('changer-password',[EmployeController::class,'changepassword'])->name('employeChangePassword');
});