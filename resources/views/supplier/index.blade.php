@extends('layouts.main')
@section('container')


<div class="overflow-x-auto overflow-y-auto">
    <table class="table w-full ">
      <tr>
        <th>NO</th>
        <th>Nama Supplier</th>
        <th>Kontak</th>
        <th>Alamat</th>
        <th>Aksi</th>

        {{-- <th>Password</th> --}}

      </tr>
      <?php $no=1;?>
      @foreach($data as $key)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $key->nama }}</td>
        <td>{{ $key->kontak }}</td>
        <td>{{ $key->alamat }}</td>
        <td>
            <a href="supplier/edit/{{$key->id_supplier}}"><button class="btn btn-sm btn-outline btn-info">EDIT</button></a>
            <a href="supplier/hapus/{{$key->id_supplier}}"><button class="btn btn-sm btn-outline btn-warning">HAPUS</button></a>
        </td>
        {{-- <td>{{ $key->password }}</td> --}}

      </tr>
      @endforeach

    </table>
  </div>

  <a href="/supplier/tambah"><button type="submit" class="btn btn-success mt-10">Tambah Supplier</button></a>



@endsection
