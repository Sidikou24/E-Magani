<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmacienController extends Controller
{
    function index(){
        return view('dashboards.pharmaciens.index');
    }

    function profile(){
        return view('dashboards.pharmaciens.profile');
    }
}
