<!-- resources/views/keranjang/index.blade.php -->

@extends('layouts.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Your Shopping Cart</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
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
                            <img src="{{ asset('storage/' . $keranjang->produk->gambar) }}" alt="Product Image"
                                style="max-width: 100px;">
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Quantity">
                                <button type="button" class="btn btn-secondary" onclick="decrementQuantity({{ $keranjang->id }})">-</button>
                                <input class="form-control" id="input-quantity-{{ $keranjang->id }}" value="{{ $keranjang->jumlah }}"
                                    readonly>
                                <button type="button" class="btn btn-secondary" onclick="incrementQuantity({{ $keranjang->id }})">+</button>
                                <button type="button" class="btn btn-info refresh-btn" style="display: none"
                                    onclick="refreshPage()">Refresh</button>
                            </div>
                        </td>
                            
                        </td>
                        <td>Rp {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                        <td class="total-price" data-harga="{{ $keranjang->produk->harga }}">
                            Rp {{ number_format($keranjang->jumlah * $keranjang->produk->harga, 0, ',', '.') }}
                        </td>
                    </tr>

                    @php
                        $totalHarga += $keranjang->jumlah * $keranjang->produk->harga;
                    @endphp
                @endforeach

                
            </tbody>
        </table>

        <div class="mt-3">
            <h3>Total Price: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h3>
        </div>

        <!-- Submit Button with Confirmation -->
        <form id="pembayaranForm" action="/pembayaran" method="POST">
            @csrf
            <button type="button" class="btn btn-primary" onclick="confirmPayment()">Submit Payment</button>
        </form>

    </div>

    


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
                    console.log('Quantity updated successfully');
                    $('#totalPrice').text('Total Price: Rp ' + response.totalHarga);
                },
                error: function(error) {
                    console.error('Error updating quantity', error);
                }
            });
        }
    
        function incrementQuantity(cartId) {
            var currentQuantity = parseInt($('#input-quantity-' + cartId).val());
            var newQuantity = currentQuantity + 1;
    
            $('#input-quantity-' + cartId).val(newQuantity);
            updateQuantity(cartId, newQuantity);
            showRefreshButton(); // Show the refresh button
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
            if (confirm("Are you sure you want to proceed with the payment?")) {
                document.getElementById("pembayaranForm").submit();
            } else {
                // If the user clicks "Cancel", do nothing
            }
        }
    </script>
@endsection
