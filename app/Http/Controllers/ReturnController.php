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

        // Bamas::update([
        //     'id_barang'   => $request->id_barang,
        //     'type_barang' => $request->type_barang,
        //     'id_serial'   => $request->id_serial,
        // ]);

        return redirect('/br')->with('Success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        Bamas::where('id', $id)
        ->where('id', $id)
        ->update([
            'text'   => $request->text,
        ]);

        return redirect('/br')->with('Success', 'Data Berhasil Disimpan');
        
    }

    public function destroy($id)
    {
        Bamas::where('id', $id)->delete();
        return redirect('/br')->with('Success', 'Data Berhasil Dihapus');
    }
}
