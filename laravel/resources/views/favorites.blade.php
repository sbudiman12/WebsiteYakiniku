@extends('layouts.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Your Favorites</h1>

        @if (count($favoriteProducts) > 0)
            <div class="table-responsive">
                <table class="table table-unbordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
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
                                    <img src="{{ asset('assets/' . $favoriteProduct->produk->gambar) }}"
                                        alt="Product Image" style="max-width: 100px;" class="img-fluid">
                                </td>
                                <td>Rp {{ number_format($favoriteProduct->produk->harga, 0, ',', '.') }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger"
                                        onclick="removeFromFavorites({{ $favoriteProduct->id }})">
                                        Hapus
                                    </button>
                                </td>
                            </tr>

                            @php
                                $totalHarga += $favoriteProduct->harga;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <script>
                function removeFromFavorites(cartId) {
                    if (confirm("Apakah anda yakin menghapus produk ini dari favorites?")) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/favorites/remove/' + cartId,
                            method: 'DELETE',
                            success: function(response) {
                                console.log('Produk berhasil dihapus dari favorites');
                                location.reload(); // Refresh the page after successful removal
                            },
                            error: function(error) {
                                console.error('Error menghapus produk dari favorites', error);
                            }
                        });
                    }
                }
            </script>
        @else
            <p>Favorites list anda kosong, silahkan menambahkan produk ke Favorites dengan menekan tombol hati.</p>
        @endif
    </div>
@endsection
