<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SupplierController extends Controller
{
    public function index(){
        $data = DB::select('SELECT * FROM supplier');
        return view('supplier.index', compact('data'));
    }

    public function formTambah(){
        return view('supplier.formtambah');
    }

    public function store(Request $request)
    {
        try {

        $tambahSupplier = DB::insert("CALL tambah_supplier(:nama, :kontak, :alamat)", [
            'nama' => $request->input('nama'),
            'kontak' => $request->input('kontak'),
            'alamat' => $request->input('alamat'),
            // dd($request->all())
        ]);

        if ($tambahSupplier)
            return redirect('supplier');
        else
            return "input data gagal";
        } catch (\Exception $e) {
        return  $e->getMessage();
        }
    }
}
