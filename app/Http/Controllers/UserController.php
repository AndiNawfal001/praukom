<?php

namespace App\Http\Controllers;

use App\Models\LevelUserModel;
use App\Models\PenggunaModel;
use App\Http\Controllers\Post;
use App\Http\Controllers\search;
use App\Models\User;
use App\Models\UserModel;
// use App\Models\UserModel;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    protected $PenggunaModel;
    public function __construct()
    {
        $this->PenggunaModel = new PenggunaModel;
    }

    private function getLevelUser(): Collection
    {
        return DB::table('pengguna')
                ->select()
                ->join('level_user', 'level_user.id_level', '=', 'pengguna.id_level')
                ->orderBy('level_user.id_level')
                ->get();
    }

    public function index()
    {
        // searching
        $search = UserModel::latest('id_level');

        if(request('search')){
            $search->where('username', 'like', '%' . request('search') . '%');
        }


        //menampilkan seluruh data
        $users = $this->getLevelUser();
        // dd($users);

        $data = [
            'title' => 'Daftar  User',
            'User' =>  $users

        ];
        return view('pengguna.index', $data);
    }
    public function formTambah()
    {
        $level = DB::table('level_user')->select()->get();
        return view('pengguna.tambahform', compact('level'));
    }
    public function simpan(Request $request)
    {
        try {
            $data = [
                'username'  => $request->input('username'),
                'email'     => $request->input('email'),
                'password'  => Hash::make($request->input('password')),
                'id_level'  => $request->input('id_level')
            ];
            //substr(hexdec(random_int(0,9999908)),4,-4);

            // stored function lpad char AI
            $newIdPengguna = collect(DB::select('SELECT newIdPengguna() AS newIdPengguna'))->first()->newIdPengguna;
            $data['id_pengguna'] = $newIdPengguna;



            //insert data ke database
            $insert = $this->PenggunaModel->create($data);
            //Promise
            if ($insert) {
                //redirect('gudang','refresh');
                return redirect('User');
            } else {
                return "input data gagal";
            }
        } catch (Exception $e) {
            return $e->getMessage();
            //return "yaaah error nih, sorry ya";
        }
    }
}
