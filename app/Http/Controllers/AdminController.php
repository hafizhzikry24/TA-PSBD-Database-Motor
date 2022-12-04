<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has("search")) {
            $datas = DB::select('select * from pembeli where nama like :search',[
                'search'=>'%'.$request->search.'%',
            ]);

            return view('admin.index')
                ->with('datas', $datas);
            }

            else {
                $datas = DB::select('select * from pembeli');

                return view('admin.index')
                    ->with('datas', $datas);

        }
    }




    public function create()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pembeli' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO pembeli(id_pembeli, nama, alamat, username, password) VALUES (:id_pembeli, :nama, :alamat, :username, :password)',
            [
                'id_pembeli' => $request->id_pembeli,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('pembeli')->where('id_pembeli', $id)->first();

        return view('admin.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_pembeli' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE pembeli SET id_pembeli = :id_pembeli, nama = :nama, alamat = :alamat, username = :username, password = :password WHERE id_pembeli = :id',
            [
                'id' => $id,
                'id_pembeli' => $request->id_pembeli,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('admin.index')->with('success', 'Data Pembeli berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembeli WHERE id_pembeli = :id_pembeli', ['id_pembeli' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus');
    }
}
