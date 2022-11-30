<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;

class UserController extends Controller
{
   public function index(){
    $data = DB::select('SELECT * FROM banyak_pengguna');
    return view('pengguna.index', compact('data'));
   }

   private function getJenisBarang(): Collection
    {
        return collect(DB::select('SELECT * FROM level_user'));
    }

    public function formtambah() {
        $lu = $this->getJenisBarang();

        return view('pengguna.tambahform', compact('lu'));
    }

    public function simpan(Request $request)
    {
        try {

        $tambahpengguna = DB::insert("CALL tambah_barangmasuk(:username, :email, :hashing_password, :kondisi_barang, :supplier, :nama_manajemen, :jenis_barang, :foto_barang)", [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'hashing_password' => Hash::make($request->input('hashing_password')),
            'kondisi_barang' => $request->input('kondisi_barang'),
            
            //dd($request->all())
        ]);

        if ($tambahpengguna)
            return redirect('pengguna');
        else
            return "input data gagal";
        } catch (\Exception $e) {
        return  $e->getMessage();
        }
    }

}
