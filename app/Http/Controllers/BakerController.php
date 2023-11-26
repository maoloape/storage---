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
        );

        return view('admin.master.barang-keluar.list',$data);
    }

    public function store(Request $request)
    {
        Bamas::where(
            'serial_no', $request->id_serial
        )->update([
            'id_barang'   => $request->id_barang,
            'type_barang' => $request->type_barang,
            'id_serial'   => $request->id_serial,
        ]);

        // Bamas::update([
        //     'id_barang'   => $request->id_barang,
        //     'type_barang' => $request->type_barang,
        //     'id_serial'   => $request->id_serial,
        // ]);

        return redirect('/bk')->with('Success', 'Data Berhasil Disimpan');
    }

    // public function update(Request $request, $id)
    // {
    //     Baker::where('id', $id)
    //     ->where('id', $id)
    //     ->update([
    //         'id_barang'   => $request->id_barang,
    //         'type_barang' => $request->type_barang,
    //         'id_serial'   => $request->id_serial,
    //     ]);

    //     return redirect('/bk')->with('Success', 'Data Berhasil Disimpan');
        
    // }

    public function destroy($id)
    {
        Bamas::where('id', $id)->delete();
        return redirect('/bk')->with('Success', 'Data Berhasil Dihapus');
    }
}
