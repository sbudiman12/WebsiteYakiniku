@extends('layouts.navbar')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<div class="container mt-4">
    <h1 class="mb-4">Payment Confirmation</h1>

    <form action="/pembayaran/process" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card mb-4">
            <div class="card-body">
                <h2>Your Shopping Cart</h2>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalHarga = 0;
                                $tambahan = 0;
                            @endphp

                            @foreach($keranjangs as $keranjang)
                                <tr>
                                    <td>{{ $keranjang->produk->nama }}</td>
                                    <td>{{ $keranjang->jumlah }}</td>
                                    <td>Rp {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($keranjang->jumlah * $keranjang->produk->harga, 0, ',', '.') }}</td>
                                </tr>

                                @php
                                    $totalHarga += $keranjang->jumlah * $keranjang->produk->harga;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script>
                    $(document).ready(function() {
                        // Initial total
                        var totalHarga = {{ $totalHarga }};
                        var hargaAwal = {{$totalHarga}};

                        // Function to update total based on delivery option
                        function updateTotal() {
                            var deliveryOption = $('#delivery').val();

                            // Update total based on the delivery option
                            if (deliveryOption === '2') { // Kurir
                                totalHarga += 7000;
                                tambahan = 7000;

                            }
                            else if (deliveryOption === '1') {
                                totalHarga = hargaAwal;
                                tambahan = 0;
                            }

                            // Display the updated total
                            $('#totalHarga').text('Sub Total: Rp ' + totalHarga.toLocaleString());
                            $('#tambahan').text('Delivery Fee: Rp ' + tambahan.toLocaleString());
                        }

                        // Initial update
                        updateTotal();

                        // Listen for the change event on the delivery option
                        $('#delivery').on('change', function() {
                            updateTotal();
                        });
                    });
                </script>

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <h3>Total Barang: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h3>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p class="text-muted" id="tambahan">Delivery Fee: Rp {{$tambahan}}</p>
                        <h3 class="font-weight-bold" id="totalHarga">Sub Total: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2>Delivery Options</h2>

                <div class="form-group">
                    <label for="delivery">Choose Delivery Option:</label>
                    <select class="form-control" id="delivery" name="delivery" required>
                        <option value="1">Pickup</option>
                        <option value="2">Kurir</option>
                    </select>
                </div>

                <h2>Payment Confirmation</h2>

                <div class="form-group">
                    <label for="bukti_transfer">Proof of Payment (Image):</label>
                    <input type="file" class="form-control-file" id="bukti_transfer" name="bukti_transfer" accept="image/*" required>
                </div>
<br>
                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </div>
        </div>
    </form>
</div>

@endsection
