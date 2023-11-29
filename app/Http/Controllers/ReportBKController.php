<?php

namespace App\Http\Controllers;

use App\Exports\BkExport;
use App\Models\Bamas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportBKController extends Controller
{
    public function index()
    {
        $data_bm = Bamas::where('good_in', 'out')
        ->get();

        return view('admin.master.report-bk.list', compact('data_bm'));
    }

    public function bkexport(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $data_bm = Bamas::where('good_in', 'out')
                        ->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date)
                        ->get();

        return Excel::download(new BkExport($data_bm), 'Barang-Keluar.xlsx');
    }
}