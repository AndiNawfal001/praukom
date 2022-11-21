@extends('layouts.main')
@section('container')
<div class="p-5 lg:p-0">
<h1 class="text-2xl font-semibold leading-loose">Pengguna</h1>
<div class="form-control flex-row-reverse m-2">
    <form action="/User">
        <div class="">
            <div class="input-group">
                    <input type="text" name="search"  placeholder="Search…" class="input input-bordered" />
                    <button class="btn btn-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </button>
            </div>
        </div>
    </form>
</div>
  <div class="overflow-x-auto overflow-y-auto">
    <table class="table w-full ">
      <tr>
        <th></th>
        <th>Username</th>
        <th>Email</th>
        {{-- <th>Password</th> --}}
        <th>Level user</th>
      </tr>
      <?php $no=1;?>
      @foreach($User as $key)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $key->username }}</td>
        <td>{{ $key->email }}</td>
        {{-- <td>{{ $key->password }}</td> --}}
        <td><p class="font-semibold">{{ $key->nama_level }}</p></td>

      </tr>
      @endforeach

    </table>
  </div>
   <div class="flex flex-row-reverse">
        <a href="User/tambah"><button class="btn btn-success my-5">Tambah Pengguna</button></a>
    </div>
</div>


@endsection
