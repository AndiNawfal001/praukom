<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;




class SupplierController extends Controller
{
    public function index(){
        $data = DB::select('SELECT * FROM supplier');
        return view('supplier.index', compact('data'));
    }

    public function formTambah(){
        return view('supplier.formtambah');
    }

    private function getSupplier($id)
    {
        return collect(DB::select('SELECT * FROM supplier WHERE id_supplier = ?', [$id]))->firstOrFail();
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

    public function edit($id = null)
    {

        $edit = $this->getSupplier($id);

        return view('supplier.editform', compact('edit'));
    }
    public function editsimpan(Request $request)
    {
        try {
            $data = [
                'nama'   => $request->input('nama'),
                'kontak' => $request->input('kontak'),
                'alamat' => $request->input('alamat')
            ];
            $upd = DB::table('supplier')
                        ->where('id_supplier', '=', $request->input('id_supplier'))
                        ->update($data);
            if($upd){
                return redirect('supplier');
            }
            dd("berhasi", $upd);
        } catch (\Exception $e) {
            return $e->getMessage();
            dd("gagal");
        }
    }

    public function hapus($id=null){
        try{
            $hapus = DB::table('supplier')
                            ->where('id_supplier',$id)
                            ->delete();
            if($hapus){
                return redirect('supplier');
            }
        }catch(\Exception $e){
            $e->getMessage();
        }
    }


}
