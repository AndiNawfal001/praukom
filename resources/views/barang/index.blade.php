@extends('layouts.main')
@section('container')


<div class="overflow-x-auto overflow-y-auto">
    <table class="table w-full ">
      <tr>
        <th>NO</th>
        <th>Nama Barang</th>
        <th>Jumlah Barang</th>
        <th>Tgl Masuk</th>
        <th>Spesifkasi</th>

        {{-- <th>Password</th> --}}

      </tr>
      <?php $no=1;?>
      @foreach($data as $key)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $key->nama_barang }}</td>
        <td>{{ $key->jml_barang }}</td>
        <td>{{ $key->tgl_masuk }}</td>
        <td>{{ $key->spesifikasi }}</td>
        {{-- <td>{{ $key->password }}</td> --}}

      </tr>
      @endforeach

    </table>
  </div>

  <a href="/barang/tambah"><button type="submit" class="btn btn-success mt-10">Tambah barang masuk</button></a>



@endsection
