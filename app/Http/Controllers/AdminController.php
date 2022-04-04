<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    function index()
    {
        return view('dashboards.admins.index');
    }

    function profile()
    {
        return view('dashboards.admins.profile');
    }
    function settings()
    {
        return view('dashboards.admins.settings');
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
