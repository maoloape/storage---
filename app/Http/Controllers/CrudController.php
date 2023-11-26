<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\bcrypt;

class CrudController extends Controller
{
     public function index()
    {
        $data = array(
            'title' => 'Data User',
            'data_user' => user::all(),
        );

        return view('admin.master.user.list',$data);
    }

    public function store(Request $request)
    {
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect('/crud')->with('Success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        user::where('id', $id)
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect('/crud')->with('Success', 'Data Berhasil Disimpan');
        
    }

    public function destroy($id)
    {
        user::where('id', $id)->delete();
        return redirect('/crud')->with('Success', 'Data Berhasil Dihapus');
    }
}
