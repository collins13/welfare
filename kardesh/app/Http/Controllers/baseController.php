<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class baseController extends Controller
{
    public function index(Request $request){
        return view('base');
    }

    public function dashboard(Request $request){
        return view('dashbord');
    }
}
