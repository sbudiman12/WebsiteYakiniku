@extends('layouts.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Your Favorites</h1>

        @if (count($favoriteProducts) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>

                        <th>Price</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalHarga = 0;
                    @endphp

                    @foreach ($favoriteProducts as $favoriteProduct)
                        <tr>
                            <td>{{ $favoriteProduct->produk->nama }}</td>
                            <td>
                                <img src="{{ asset('assets/' . $favoriteProduct->produk->gambar) }}" alt="Product Image"
                                    style="max-width: 100px;">
                            </td>

                            <td>Rp {{ number_format($favoriteProduct->produk->harga, 0, ',', '.') }}</td>

                            <td>
                                <button type="button" class="btn btn-danger"
                                    onclick="removeFromFavorites({{ $favoriteProduct->id }})">
                                    Remove
                                </button>
                            </td>
                        </tr>

                        @php
                            $totalHarga += $favoriteProduct->harga;
                        @endphp
                    @endforeach


                </tbody>
            </table>





            <script>
                function removeFromFavorites(cartId) {
                    if (confirm("Are you sure you want to remove this item from the list?")) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/favorites/remove/' + cartId,
                            method: 'DELETE',
                            success: function(response) {
                                console.log('Item removed from list successfully');
                                location.reload(); // Refresh the page after successful removal
                            },
                            error: function(error) {
                                console.error('Error removing item from list', error);
                            }
                        });
                    }
                }
            </script>
        @else
            <p>Your favorites list is empty.</p>
        @endif

    </div>
@endsection
