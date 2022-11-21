@extends('layouts.main')
@section('container')
<div class="p-5">

    <div class="card mx-auto lg:max-w-md shadow-2xl bg-base-100">
    <form method="POST" action="simpan">
    @csrf
         <div class="card-body">
         <h2 class="card-title text-2xl font-bold ">Form Tambah Pengguna</h2>
           <div class="form-control">
             <label class="label">
               <span class="label-text">Username</span>
             </label>
             <input type="text" name="username" class="input input-bordered" />
           </div>
           <div class="form-control">
             <label class="label">
               <span class="label-text">Email</span>
             </label>
             <input type="email" name="email" class="input input-bordered" />
           </div>
           <div class="form-control">
             <label class="label">
               <span class="label-text">Password</span>
             </label>
             <input type="text" name="password" class="input input-bordered" />
           </div>
           <div class="form-control">
                <label class="label">
                    <span class="label-text">Pilih Level User</span>
                </label>
                <select class="select select-bordered w-full max-w-xs" name="id_level">
                    @foreach ($level as $item)
                        <option value="{{ $item->id_level }}">{{ $item->nama_level }}</option>
                    @endforeach
                </select>
           </div>

           <div class="form-control mt-6">
             <button type="submit" value="Simpan" class="btn btn-primary">Simpan</button>
           </div>
         </div>
       </form>
       </div>

   </div>
@endsection
