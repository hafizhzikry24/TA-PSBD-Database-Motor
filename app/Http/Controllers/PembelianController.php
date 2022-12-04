<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PembelianController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has("search")) {
            $datas = DB::select('SELECT pembelian.id_pembelian,pembelian.jumlah,pembelian.tahun,pembelian.id_pembeli,pembeli.nama,pembeli.alamat FROM `pembelian`
            LEFT JOIN pembeli ON pembeli.id_pembeli = pembelian.id_pembeli where pembelian.tahun like :search',[
                'search'=>'%'.$request->search.'%',
            ]);

            return view('pembelian.index')
                ->with('datas', $datas);
        }
            else {
                $datas = DB::select('SELECT pembelian.id_pembelian,pembelian.jumlah,pembelian.tahun,pembelian.id_pembeli,pembeli.nama,pembeli.alamat FROM `pembelian`
                 LEFT JOIN pembeli ON pembeli.id_pembeli = pembelian.id_pembeli');

            return view('pembelian.index')
                ->with('datas', $datas);

        }


    }

    public function create()
    {
        return view('pembelian.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pembelian' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
            'id_pembeli' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO pembelian (id_pembelian, jumlah, tahun, id_pembeli) VALUES (:id_pembelian, :jumlah, :tahun, :id_pembeli)',
            [
                'id_pembelian' => $request->id_pembelian,

                'jumlah' => $request->jumlah,
                'tahun' => $request->tahun,
                'id_pembeli' => $request->id_pembeli,
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

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('pembelian')->where('id_pembelian', $id)->first();

        return view('pembelian.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_pembelian' => 'required',
            'jumlah' => 'required',
            'tahun' => 'required',
            'id_pembeli' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE pembelian SET id_pembelian = :id_pembelian, jumlah = :jumlah, tahun = :tahun, id_pembeli = :id_pembeli WHERE id_pembelian = :id ',
            [
                'id' => $id,
                'id_pembelian' => $request->id_pembelian,

                'jumlah' => $request->jumlah,
                'tahun' => $request->tahun,
                'id_pembeli' => $request->id_pembeli,
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

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pembelian WHERE id_pembelian = :id_pembelian', ['id_pembelian' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus');
    }
}
