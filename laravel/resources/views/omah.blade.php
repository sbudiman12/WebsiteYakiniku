@extends('layouts.navbar')

@section('content')
    {{-- <div class="container mt-5">
        <!-- About Section -->
        @if ($currentPage == 'All')
        <div class="container py-5">
            <div class="row align-items-center">
                <!-- Column for the image -->
                <div class="col-md-6">
                    <img src="{{ url('/images/home.jpg') }}" class="img-fluid rounded" style="max-height: 500px; width: 100%;">
                </div>
                <!-- Column for the text -->
                <div class="col-md-6">
                    <div class="d-flex flex-column h-100 justify-content-center">
                        <h2 class="masthead-subheading"><strong>YAKINIKU AT HOME</strong></h2>
                        <div class="card-body">
                            <p class="lead">Best BBQ supplier in Town</p>
                            <a href="/about" class="btn btn-info">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Product Cards Section -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mt-4">
            @foreach ($products as $product)
                <div class="col mb-4">
                    <div class="card h-100 shadow-sm">
                        <a href="/product/{{ $product->id }}">
                            <!-- Make the image clickable with a link to the detail view -->
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                class="card-img-top" style="object-fit: cover; height: 225px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Price: Rp.{{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}

    <div class="p-5 d-flex justify-content-center">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNFjCXfvOORXUP5LnUDIVXTSh6SD3V-qm64Ze9gPX44w&s" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="data:image/jpeg;base64,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" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8cjSyrx4_SChhPNESJzEN1mk3zguOPGqLq-mUxMVA1A&s" alt="Third slide">
                  </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

    <div class="p-5 d-flex justify-content-center">
        <h3>Categories</h3>
    </div>

    <div class="d-flex justify-content-center">
       <div class="px-2">
        <div class="card" style="width: 10rem;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNFjCXfvOORXUP5LnUDIVXTSh6SD3V-qm64Ze9gPX44w&s" class="card-img-top" alt="...">

        </div>
       <div class="text-center text-wrap">
        <h3>Test</h3>
       </div>
       </div>
       <div class="px-2">
        <div class="card" style="width: 10rem;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNFjCXfvOORXUP5LnUDIVXTSh6SD3V-qm64Ze9gPX44w&s" class="card-img-top" alt="...">

        </div>
       <div class="text-center text-wrap">
        <h3>Test</h3>
       </div>
       </div>
       <div class="px-2">
        <div class="card" style="width: 10rem;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNFjCXfvOORXUP5LnUDIVXTSh6SD3V-qm64Ze9gPX44w&s" class="card-img-top" alt="...">

        </div>
       <div class="text-center text-wrap">
        <h3>Test</h3>
       </div>
       </div>
       <div class="px-2">
        <div class="card" style="width: 10rem;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNFjCXfvOORXUP5LnUDIVXTSh6SD3V-qm64Ze9gPX44w&s" class="card-img-top" alt="...">

        </div>
       <div class="text-center text-wrap">
        <h3>Test</h3>
       </div>
       </div>
       <div class="px-2">
        <div class="card" style="width: 10rem;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNFjCXfvOORXUP5LnUDIVXTSh6SD3V-qm64Ze9gPX44w&s" class="card-img-top" alt="...">

        </div>
       <div class="text-center text-wrap">
        <h3>Test</h3>
       </div>
       </div>




    </div>

@endsection
