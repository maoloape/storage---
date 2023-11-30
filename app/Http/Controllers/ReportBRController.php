<?php

namespace App\Http\Controllers;

use PDF;
use App\Exports\BrExport;
use App\Models\Bamas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportBRController extends Controller
{
    public function index()
    {
        $data_bm = Bamas::where('return_in', 'out')
        ->get();

        return view('admin.master.report-br.list', compact('data_bm'));
    }

    public function brexport(Request $request){
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ],
        [
            'start_date' => 'Start Date Wajib Di Isi',
            'end_date' => 'End Date Wajib Di Isi',
        ]);

        $data_bm = Bamas::where('return_in', 'out')
                        ->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date)
                        ->get();

        if ($request->export_type == 'PDF') 
        {
                                                
            $pdf = PDF::loadView('admin.master.report-br.list', compact('data_bm'));
            return $pdf->download('admin.master.report-br.table-pdf');
                    
        }
                        
            else if ($request->export_type == 'EXCEL') {
            return Excel::download(new BrExport($data_bm), 'Barang_Return.xlsx');
        }
    }
}
