@extends('layouts.main')
@section('container')
<div class="p-5">

 <div class="shadow-md rounded-md mx-auto  bg-base-100 p-5">
 <form action="simpan" method="POST">
 @csrf
    <h2 class="text-2xl font-bold">Form Tambah Barang</h2>
    <br>
      <div class="lg:flex flex-row gap-5">
            <div class="basis-1/2">
                <div class="form-control">
                    <label class="label">
                    <span class="label-text">Nama Barang</span>
                    </label>
                    <input type="text" name="nama_barang" class="input input-bordered" required/>
                </div>
                <div class="form-control">
                    <label class="label">
                    <span class="label-text">Jumlah Barang</span>
                    </label>
                    <input type="number" name="jml_barang" class="input input-bordered" required/>
                </div>
                <div class="form-control">
                    <label class="label">
                    <span class="label-text">Spesifikasi</span>
                    </label>
                    <textarea name="spesifikasi" cols="20" rows="5" class="textarea textarea-bordered" required></textarea>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Kondisi Barang</span>
                    </label>
                    <input type="text" name="kondisi_barang" class="input input-bordered" required/>
                </div>
            </div>

            <div class="basis-1/2">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Supplier</span>
                    </label>
                    <select class="select select-bordered w-full max-w-xs" name="supplier" required>
                        <option disabled selected>-- Pilih Supplier --</option>
                        @foreach ($supplier as $item)
                            <option value="{{ $item->id_supplier }} ">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                    <span class="label-text">Nama Manejemen</span>
                    </label>
                    <input type="text" name="nama_manajemen" class="input input-bordered" required/>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Jenis Barang</span>
                    </label>
                    <select class="select select-bordered w-full max-w-xs" name="jenis_barang" required>
                        <option disabled selected>-- Pilih Jenis Barang --</option>
                        @foreach ($jenisBarang as $item)
                            <option value="{{ $item->id_jenis_brg }}">{{ $item->nama_jenis }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-control">
                    <label class="label">
                    <span class="label-text">Foto Barang</span>
                    </label>
                    <input type="text" name="foto_barang" class="input input-bordered" required/>
                </div>
            </div>
      </div>
        <div class="form-control mt-6">
          <button type="submit" value="simpan" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>

</div>
@endsection
