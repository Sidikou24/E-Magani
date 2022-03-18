<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    function index(){
        return view('dashboards.employes.index');
    }

    function profile(){
        return view('dashboards.employes.profile');
    }
    function settings()
    {
        return view('dashboards.employes.settings');
    }
}

