<?php

use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaprogController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard',[DashboardController::class,'dashboard']);

Route::get('/barang', function () {
    return view('barang.index');
});

Route::get('/barangmasuk', function () {
    return view('brg.barangmasuk');
});


// Route::get('/levelUser',[LevelUserController::class,'index']);
Route::get('/levelUser/tambah',[LevelUserController::class,'formTambah']);
Route::post('/levelUser/simpan',[LevelUserController::class,'simpan']);


Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//Route Group untuk menggabungkan banyaknya middleware
Route::group(['middleware' => ['auth','level:admin,manajemen']], function (){
    Route::get('/levelUser',[LevelUserController::class,'index']);
});

Route::get('/User',[ UserController::class,'index']);
Route::get('/User/tambah',[ UserController::class,'formTambah']);
Route::post('/User/simpan',[ UserController::class,'simpan']);

// Route::get('/User/kaprog',[ KaprogController::class,'index']);

Route::get('/User/kaprog', [KaprogController::class, 'index']);

Route::group(['middleware' => ['auth','level:manajemen']], function (){
    Route::get('/barang',[ BarangMasukController::class,'index']);
    Route::get('/barang/tambah',[ BarangMasukController::class,'formTambah']);
    Route::post('/barang/simpan',[ BarangMasukController::class,'store']);
});


Route::get('/supplier',[ SupplierController::class,'index']);
Route::get('/supplier/tambah',[ SupplierController::class,'formTambah']);
Route::post('/supplier/simpan',[ SupplierController::class,'store']);
Route::get('/supplier/edit/{id}',[SupplierController::class,'edit']);
Route::post('/supplier/edit/editsimpan',[ SupplierController::class,'editsimpan']);
Route::get('/supplier/hapus/{id}',[SupplierController::class,'hapus']);






