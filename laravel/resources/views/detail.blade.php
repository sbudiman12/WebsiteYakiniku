@extends('layouts.navbar')

@section('content')
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->

        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('assets/' . $product->gambar) }}" alt="{{ $product->nama }}"
                        class="card-img-top mb-5 mb-md-0">
                    </div>
                    <div class="col-md-6">

                        <h1 class="display-5 fw-bolder">{{ $product->nama }}</h1>
                        <div class="fs-5 mb-5">

                            <span>Rp. {{ $product->harga }}</span>
                        </div>
                        <p class="lead">{{ $product->deskripsi }}</p>
                        <div class="d-flex">

                            

                            <form action="{{ route('keranjang.addToCart', ['productId' => $product->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="col mb-5">
                            <div class="card h-100 shadow-sm hover-expand">
                                <a href="/product/{{ $relatedProduct->id }}">
                                <!-- Product image -->
                                <img  class="card-img-top" style="object-fit: cover; height: 225px;" src="{{ asset('assets/' . $relatedProduct->gambar) }}" alt="..." />
                                <!-- Product details -->
                                </a>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name -->
                                        <h5 class="fw-bolder">{{ $relatedProduct->nama }}</h5>
                                        <!-- Product price -->
                                        Rp. {{ $relatedProduct->harga }}
                                    </div>
                                </div>
                                <!-- Product actions -->

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        
        <script src="js/scripts.js"></script>

        
    </body>

    @if(session('toast'))
    <script>
        Toastify({
            text: "{{ session('toast.message') }}",
            duration: 3000,
            close: true,
            gravity: "bottom", // Adjust as needed
            position: "right", // Adjust as needed
            backgroundColor: "#28a745", // Green color, adjust as needed
        }).showToast();
    </script>
@endif

</html>


@endsection


<script>

function addToCart(productId) {
    $.ajax({
        url: '/keranjang/add-to-cart/' + productId,
        method: 'POST',
        data: {_token: '{{ csrf_token() }}'},
        success: function(response) {
            alert(response.success);
            // Handle success (e.g., update UI)
        },
        error: function(error) {
            console.error('Error adding to cart', error);
        }
    });
}

</script>
