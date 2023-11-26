<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        return view('beranda');
    }

    function admin(){
        return view('beranda');
    }
    function user(){
        return view('beranda');
    }
}
