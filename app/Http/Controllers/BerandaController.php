<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bamas;

class BerandaController extends Controller
{
    public function index()
    {
        $data_bm = Bamas::where('good_in', 'in')
                        ->where('return_in', 'in')
                        ->get();
                            
        $data_br = Bamas::where('return_in', 'out')
                        ->get();

        $data_bk = Bamas::where('good_in', 'out')
                        ->get();

        return view('Beranda',compact('data_bm', 'data_bk', 'data_br'));
    }
}
