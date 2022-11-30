<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class BarangMasukController extends Controller
{
    public function index(){
        $data = DB::select('SELECT * FROM barang_banyak');
        return view('barang.index', compact('data'));
    }

    private function getJenisBarang(): Collection
    {
        return collect(DB::select('SELECT * FROM jenis_barang'));
    }

    private function getSupplier(): Collection
    {
        return collect(DB::select('SELECT * FROM supplier'));
    }

    public function formTambah(){
        $jenisBarang = $this->getJenisBarang();
        $supplier = $this->getSupplier();

        return view('barang.formtambah', compact('jenisBarang', 'supplier'));
    }

    public function store(Request $request)
    {
        try {

        $tambahBarangMasuk = DB::insert("CALL tambah_barangmasuk(:nama_barang, :jml_barang, :spesifikasi, :kondisi_barang, :supplier, :nama_manajemen, :jenis_barang, :foto_barang)", [
            'nama_barang' => $request->input('nama_barang'),
            'jml_barang' => $request->input('jml_barang'),
            'spesifikasi' => $request->input('spesifikasi'),
            'kondisi_barang' => $request->input('kondisi_barang'),
            'supplier' => $request->input('supplier'),
            'nama_manajemen' => $request->input('nama_manajemen'),
            'jenis_barang' => $request->input('jenis_barang'),
            'foto_barang' => $request->input('foto_barang'),
            //dd($request->all())
        ]);

        if ($tambahBarangMasuk)
            return redirect('barang');
        else
            return "input data gagal";
        } catch (\Exception $e) {
        return  $e->getMessage();
        }
    }
}
