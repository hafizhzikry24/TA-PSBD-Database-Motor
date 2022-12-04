<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MotorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has("search")) {
            $datas = DB::select('SELECT motor.id_motor,motor.warna,motor.harga,motor.tipe,pembelian.tahun,pembelian.jumlah FROM `motor`
            LEFT JOIN pembelian ON pembelian.id_pembelian = motor.id_pembelian WHERE is_delete = 0 and motor.tipe like :search',[
                'search'=>'%'.$request->search.'%',
            ]);

            $deleted = DB::select('SELECT motor.id_motor,motor.warna,motor.harga,motor.tipe,pembelian.tahun,pembelian.jumlah FROM `motor`
            LEFT JOIN pembelian ON pembelian.id_pembelian = motor.id_pembelian WHERE is_delete = 1 and motor.tipe like :search',[
                'search'=>'%'.$request->search.'%',
            ]);

            return view('motor.index')
                ->with('datas', $datas)
                ->with('deleted', $deleted);
        }
            else {
                $datas = DB::select('SELECT motor.id_motor,motor.warna,motor.harga,motor.tipe,pembelian.tahun,pembelian.jumlah FROM `motor`
            LEFT JOIN pembelian ON pembelian.id_pembelian = motor.id_pembelian WHERE is_delete = 0');

            $deleted = DB::select('SELECT motor.id_motor,motor.warna,motor.harga,motor.tipe,pembelian.tahun,pembelian.jumlah FROM `motor`
            LEFT JOIN pembelian ON pembelian.id_pembelian = motor.id_pembelian WHERE is_delete = 1');

            return view('motor.index')
                ->with('datas', $datas)
                ->with('deleted', $deleted);

        }


    }

    public function create()
    {
        return view('motor.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_motor' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
            'id_pembelian' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO motor (id_motor, warna, harga, tipe,id_pembelian) VALUES (:id_motor, :warna, :harga, :tipe,:id_pembelian )',
            [
                'id_motor' => $request->id_motor,

                'warna' => $request->warna,
                'harga' => $request->harga,
                'tipe' => $request->tipe,
                'id_pembelian' => $request->id_pembelian,
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

        return redirect()->route('motor.index')->with('success', 'Data motor berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('motor')->where('id_motor', $id)->first();

        return view('motor.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_motor' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'tipe' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE motor SET id_motor = :id_motor, warna = :warna, harga = :harga, tipe = :tipe,id_pembelian = :id_pembelian Where id_motor = :id ',
            [
                'id' => $id,
                'id_motor' => $request->id_motor,

                'warna' => $request->warna,
                'harga' => $request->harga,
                'tipe' => $request->tipe,
                'id_pembelian' => $request->id_pembelian,
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

        return redirect()->route('motor.index')->with('success', 'Data Motor berhasil diubah');
    }

    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM motor WHERE id_motor = :id_motor', ['id_motor' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('motor.index')->with('success', 'Data motor berhasil dihapus');
    }

    public function softdelete($id){
        DB::delete('Update motor set is_delete = 1  WHERE id_motor = :id_motor', ['id_motor' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('motor.index')->with('success', 'Data motor berhasil dihapus');
    }

    public function restore($id) {
        DB::update('UPDATE motor set is_delete = 0 WHERE id_motor = :id_motor', ['id_motor' => $id]);
        return redirect()->route('motor.index')->with('success', 'Data Admin berhasil dihapus');
    }
}
