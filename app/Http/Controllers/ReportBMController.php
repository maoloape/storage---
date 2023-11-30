<?php

namespace App\Http\Controllers;

use App\Exports\BmExport;
use App\Models\Bamas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportBMController extends Controller
{
    public function index()
    {
        $data_bm = Bamas::where('good_in', 'in')
        ->where('return_in', 'in')
        ->get();

        return view('admin.master.report-bm.list', compact('data_bm'));
    }

    public function bmexport(Request $request)
    {
        $start_date = $request -> input('start_date');
        $end_date   = $request -> input('end_date');

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ],
        [
            'start_date' => 'Start Date Wajib Di Isi',
            'end_date' => 'End Date Wajib Di Isi',
        ]);

        $data_bm    = Bamas ::where('good_in', 'in')
                            ->where('return_in', 'in')
                            ->whereDate('created_at', '>=', $start_date)
                            ->whereDate('created_at', '<=', $end_date)
                            ->get();

        return Excel::download(new BmExport($data_bm), 'Barang_Masuk.xlsx');
    }
        
}