@extends('layouts.navbar')

@section('content')
    <div class="row d-flex justify-content-center fit pt-5">
        <div class="col-md-8">
            <div class="">
                <div id="carouselExampleFade" class="carousel slide carousel-fade">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="fit d-block " src="{{ url('assets/carousel1.png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="fit d-block " src="{{ url('assets/carousel2.png') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="fit d-block" src="{{ url('assets/carousel3.png') }}" alt="Third slide">
                        </div>
                    </div>
                    <button class="carousel-control-prev hover-expand" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next hover-expand" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center pt-5 overflow-x-auto flex-nowrap" style="overflow-y: hidden;">
        <div class="px-3 hover-expand">
            <div style="width: 5rem;">
                <a href="/">
                    <img src="{{ url('/assets/all.png') }}" class="card-img-top" alt="All Category">
                </a>
            </div>
            <div class="text-center text-wrap">
                <h5 class="pt-2">All</h5>
            </div>
        </div>
        <div class="px-3 hover-expand">
            <div style="width: 5rem;">
                <a href="/produk-sapi">
                    <img src="{{ url('/assets/sapi.png') }}" class="card-img-top" alt="Sapi Category">
                </a>
            </div>
            <div class="text-center text-wrap">
                <h5 class="pt-2">Sapi</h5>
            </div>
        </div>
        <div class="px-3 hover-expand">
            <div style="width: 5rem;">
                <a href="/produk-ayam">
                    <img src="{{ url('/assets/ayam.png') }}" class="card-img-top" alt="Ayam Category">
                </a>
            </div>
            <div class="text-center text-wrap">
                <h5 class="pt-2">Ayam</h5>
            </div>
        </div>
        <div class="px-3 hover-expand">
            <div style="width: 5rem;">
                <a href="/produk-ikan">
                    <img src="{{ url('/assets/ikan.png') }}" class="card-img-top" alt="Ikan Category">
                </a>
            </div>
            <div class="text-center text-wrap">
                <h5 class="pt-2">Ikan</h5>
            </div>
        </div>
        <div class="px-3 hover-expand">
            <div style="width: 5rem;">
                <a href="/produk-snacks">
                    <img src="{{ url('/assets/snacks.png') }}" class="card-img-top" alt="Snacks Category">
                </a>
            </div>
            <div class="text-center text-wrap">
                <h5 class="pt-2">Snacks</h5>
            </div>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5 mt-4 p-5 d-flex justify-content-center">
        @foreach ($products as $product)
            <div class="col mb-4">
                <div class="card h-100 shadow-sm hover-expand">
                    <a href="/product/{{ $product->id }}">
                        <img src="{{ asset('assets/' . $product->gambar) }}" alt="{{ $product->nama }}"
                            class="card-img-top" style="object-fit: cover; height: 225px;">
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->nama }}</h4>
                        <h5 class="card-text">Rp. {{ number_format($product->harga, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
