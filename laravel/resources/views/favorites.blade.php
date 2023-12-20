@extends('layouts.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Your Favorites</h1>

        @if (count($favorites) > 0)
            <div class="row">
                @foreach ($favorites as $favorite)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('assets/' . $favorite->produk->gambar) }}" class="card-img-top" alt="{{ $favorite->produk->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $favorite->produk->nama }}</h5>
                                <p class="card-text">Stock: {{ $favorite->produk->stok }}</p>
                                <p class="card-text">Price: Rp. {{ $favorite->produk->harga }}</p>
                                <!-- Add more details as needed -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Your favorites list is empty. Add your favorite products by clicking the love button.</p>
        @endif
    </div>
@endsection
