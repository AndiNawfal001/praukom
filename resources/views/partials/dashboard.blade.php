@extends('layouts.main')
@section('container')

@auth
{{-- <p>anda login sebagai ( <b>{{ Auth::user()->level_user->ket }}</b> )</p> --}}
@endauth

 <h1 class="text-3xl font-semibold leading-loose">Dashboard</h1>

        <div class="lg:flex gap-5">
            <div class="basis-3/4">
                <div class="card w-full bg-base-300 shadow-xl mb-10">
                    <div class="card-body">
                        <h2 class="card-title">Data Barang Masuk</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                        <button class="btn btn-outline btn-primary">More Info</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="basis-1/4">
                <div class="card w-96 bg-base-100 shadow-xl image-full mb-10">
                    <figure><img src="https://placeimg.com/400/225/arch" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Data Pemutihan</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                        <button class="btn btn-outline btn-primary">More Info</button>
                        </div>
                    </div>
                </div>
                <div class="card w-96 bg-neutral shadow-xl mb-10">
                    <div class="card-body">
                        <h2 class="card-title">Data Supplier</h2>
                        <p>If a dog chews shoes whose shoes does he choose?</p>
                        <div class="card-actions justify-end">
                        <button class="btn btn-outline btn-primary">More Info</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
