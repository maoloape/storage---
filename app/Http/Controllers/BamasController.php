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
                            ->get(),
            'data_bm' => Bamas::where('return_in', 'in')
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

        return redirect('/bm')->with('Success', 'Data Berhasil Disimpan');
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

        return redirect('/bm')->with('Success', 'Data Berhasil Disimpan');
        
    }

    public function destroy($id)
    {
        Bamas::where('id', $id)->delete();
        return redirect('/bm')->with('Success', 'Data Berhasil Dihapus');
    }
}
