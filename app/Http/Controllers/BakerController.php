<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baker;
use App\Models\Bamas;

use function Laravel\Prompts\select;

class BakerController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Barang Keluar',
            'data_bm' => Bamas::where('good_in', 'out')
                            ->get(),
            'data_bk' => Bamas::where('good_in', 'in')
                            ->get(),
        );

        return view('admin.master.barang-keluar.list',$data);
    }

    public function destroy($id)
    {
        Bamas::where('id', $id)->update([
            'good_in' => 'in'
        ]);
        return redirect('/Barang-Keluar')->with('Success', 'Data Berhasil Dimasukan');
    }

    public function filter(Request $request){
        $start_date = $request->start_date;
        $end_date   = $request->end_date;

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ],
        [
            'start_date' => 'Start Date Wajib Di Isi',
            'end_date' => 'End Date Wajib Di Isi',
        ]);

        $data_bm = Bamas::where('good_in', 'out')
                        ->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date)
                        ->get();

        return view('admin.master.barang-keluar.list', compact('data_bm'));
    }
}
