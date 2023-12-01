<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bamas;

class BamasController extends Controller
{   
    public function index()
    {
        $data = array(
            'title' => 'Data Barang Masuk',
            'data_bm' => Bamas::where('good_in', 'in')
                            ->where('return_in', 'in')
                            ->get(),
                            
        );

        return view('admin.master.barang-masuk.list',$data);
    }

    public function store(Request $request)
    {
        Bamas::create([
            'nama_barang'   => $request->nama_barang,
            'type'          => $request->type,
            'serial_no'     => $request->serial_no,
            'no_produk'     => $request->no_produk,
            'no_kontrak'    => $request->no_kontrak,
            'good_in'       => 'in',
            'return_in'     => 'in',
        ]);

        return redirect('/Barang-Masuk')->with('Success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        Bamas::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_barang'   => $request->nama_barang,
            'type'          => $request->type,
            'serial_no'     => $request->serial_no,
            'no_produk'     => $request->no_produk,
            'no_kontrak'    => $request->no_kontrak,
        ]);

        return redirect('/Barang-Masuk')->with('Success', 'Data Berhasil Disimpan');
        
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

        $data_bm = Bamas::where('good_in', 'in')
                        ->where('return_in', 'in')
                        ->whereDate('created_at', '>=', $start_date)
                        ->whereDate('created_at', '<=', $end_date)
                        ->get();

        return view('admin.master.barang-masuk.list', compact('data_bm'));
    }


    public function destroy($id)
    {
        Bamas::where('id', $id)->delete();
        return redirect('/Barang-Masuk')->with('Success', 'Data Berhasil Dihapus');
    }

    public function keluar($id)
    {
        Bamas::where('id', $id)->update([
            'good_in' => 'out'
        ]);
        return redirect('/Barang-Masuk')->with('Success', 'Data Berhasil Dikeluarkan');
    }

    public function return(Request $request, $id)
    {
        Bamas::where('id', $id)->update([
            'return_in' => 'out',
            'text'      => $request->text,
        ]);
        return redirect('/Barang-Masuk')->with('Success', 'Data Berhasil Dikeluarkan');
    }

    
}
