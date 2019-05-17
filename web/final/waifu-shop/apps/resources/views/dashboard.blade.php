@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>Katalog</h3>
                <p>Saldo anda: ${{Auth::user()->balance}}</p>
                <p>Anda telah membeli {{$total}} catalog</p>
            </div>
            <div class="col s4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">FLAG GAN</span>
                        <p>Bendera sangat murah</p>
                        <p>Harga: $1000000</p>
                        <a href="/buy/flag"><button class="btn">BUY</button></a>
                    </div>
                </div>
            </div>
            @foreach($catalogs as $catalog)
            <form method="POST" action="/buy/{{$catalog->slug}}">
            <div class="col s4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">{{$catalog->name}}</span>
                        @csrf
                        <img class="responsive-img" src="img/{{$catalog->src}}" alt="" srcset="">
                        <p>{{$catalog->description}}</p>
                        <p>Harga: ${{$catalog->price}}</p>
                        <input type="submit" class="btn" value="Buy">
                    </div>
                </div>
            </div>
            </form>
            @endforeach
        </div>
        <p>*WARNING: SEMUA GAMBAR DIATAS BUKAN PUNYA PROBSET YANG BIKIN SOAL INI, TETAPI PUNYA ORANG LAIN YA</p>
    </div>
@endsection