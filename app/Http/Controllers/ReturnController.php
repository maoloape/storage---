<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bamas;

class ReturnController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Barang Keluar',
            'data_br' => Bamas::where('return_in', 'in')
                            ->get(),
            'data_bm' => Bamas::where('return_in', 'out')
                            ->get(),
        );

        return view('admin.master.barang-return.list',$data);
    }

    public function store(Request $request)
    {
        Bamas::where(
            'serial_no', $request->id_serial
        )->update([
            'id_barang'   => $request->id_barang,
            'type_barang' => $request->type_barang,
            'id_serial'   => $request->id_serial,
            'text'        => $request->text,
        ]);

        return redirect('/Barang-Return')->with('Success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        Bamas::where('id', $id)
        ->where('id', $id)
        ->update([
            'text'   => $request->text,
        ]);

        return redirect('/Barang-Return')->with('Success', 'Data Berhasil Disimpan');
        
    }

    public function destroy($id)
    {
        Bamas::where('id', $id)->update([
            'return_in' => 'in'
        ]);
        return redirect('/Barang-Return')->with('Success', 'Data Berhasil Dimasukan');
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

        $data_bm = Bamas::where('return_in', 'out')
                        ->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date)
                        ->get();

        return view('admin.master.barang-return.list', compact('data_bm'));
    }
}
