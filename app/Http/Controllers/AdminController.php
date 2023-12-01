<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        return view('Beranda');
    }

    function admin(){
        return view('Beranda');
    }
    function user(){
        return view('Beranda');
    }
}
