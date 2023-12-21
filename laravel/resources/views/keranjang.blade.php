<!-- resources/views/keranjang/index.blade.php -->

@extends('layouts.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Keranjang</h1>

        @if (count($keranjangs) > 0)
            <table class="table table-unbordered">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Gambar</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalHarga = 0;
                    @endphp

                    @foreach ($keranjangs as $keranjang)
                        <tr>
                            <td>{{ $keranjang->produk->nama }}</td>
                            <td>
                                <img src="{{ url('assets/' . $keranjang->produk->gambar) }}" alt="Product Image"
                                    style="max-width: 100px;">
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Quantity">
                                    <button type="button" class="btn btn-secondary"
                                        onclick="decrementQuantity({{ $keranjang->id }})">-</button>
                                    <input class="form-control" id="input-quantity-{{ $keranjang->id }}"
                                        value="{{ $keranjang->jumlah }}" readonly>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="incrementQuantity({{ $keranjang->id }})">+</button>
                                    <button type="button" class="btn btn-info refresh-btn" style="display: none"
                                        onclick="refreshPage()">Refresh</button>
                                </div>
                            </td>

                            </td>
                            <td>Rp {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                            <td class="total-price" data-harga="{{ $keranjang->produk->harga }}">
                                Rp {{ number_format($keranjang->jumlah * $keranjang->produk->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger"
                                    onclick="removeFromCart({{ $keranjang->id }})">
                                    Hapus
                                </button>
                            </td>
                        </tr>

                        @php
                            $totalHarga += $keranjang->jumlah * $keranjang->produk->harga;
                        @endphp
                    @endforeach


                </tbody>
            </table>

            <div class="mt-3">
                <h3>Total Harga: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h3>
            </div>

            <!-- Submit Button with Confirmation -->
            <form id="pembayaranForm" action="/showpembayaran" method="POST">
                @csrf
                <button type="button" class="btn btn-primary" onclick="confirmPayment()">Submit Payment</button>
            </form>


            <script>
                function incrementQuantity(cartId) {
                    var currentQuantity = parseInt($('#input-quantity-' + cartId).val());
                    var newQuantity = currentQuantity + 1;


// Periksa apakah newQuantity melebihi stok produk
                    if (newQuantity <= {{ $keranjang->produk->stok }}) {
                        $('#input-quantity-' + cartId).val(newQuantity);
                        updateQuantity(cartId, newQuantity);
                        showRefreshButton(); // Show the refresh button
                    } else {
                        alert('Stok produk hanya ada {{ $keranjang->produk->stok }}');
                    }
                }
            </script>
        @else
            <p>Keranjang anda kosong, silahkan tambah produk ke keranjang dengan menekan tombol "Add to Cart".</p>
        @endif

    </div>


    <script>
        function removeFromCart(cartId) {
            if (confirm("Apakah anda yakin mau menghapus produk dari keranjang?")) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/keranjang/remove/' + cartId,
                    method: 'DELETE',
                    success: function(response) {
                        console.log('Produk berhasil dihapus dari keranjang');
                        location.reload(); // Refresh the page after successful removal
                    },
                    error: function(error) {
                        console.error('Produk gagal dihapus dari favorites', error);
                    }
                });
            }
        }
    </script>

    <script>
        function updateQuantity(cartId, newQuantity) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/keranjang/update-quantity/' + cartId,
                method: 'PATCH',
                data: {
                    newQuantity: newQuantity
                },
                success: function(response) {
                    console.log('Jumlah berhasil diupdate');
                    $('#totalPrice').text('Total Price: Rp ' + response.totalHarga);
                },
                error: function(error) {
                    console.error('Gagal mengupdate jumlah', error);
                }
            });
        }



        function decrementQuantity(cartId) {
            var currentQuantity = parseInt($('#input-quantity-' + cartId).val());

            if (currentQuantity > 1) {
                var newQuantity = currentQuantity - 1;

                $('#input-quantity-' + cartId).val(newQuantity);
                updateQuantity(cartId, newQuantity);
                showRefreshButton(); // Show the refresh button
            }
        }

        function showRefreshButton() {
            $('.refresh-btn').show();
        }

        function refreshPage() {
            location.reload();
        }

function confirmPayment() {
            if (confirm("Apakah anda yakin mau melanjutkan ke pembayaran?")) {
                document.getElementById("pembayaranForm").submit();
            } else {
                // If the user clicks "Cancel", do nothing
            }
        }
    </script>
@endsection
