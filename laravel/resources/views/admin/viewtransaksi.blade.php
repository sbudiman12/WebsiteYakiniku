@extends('layouts.template2')

@section('content')
    <div class="container">
        <h2>Transaction Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Transaction Information</h5>
                <a href="/transaksis" class="btn btn-primary m-4">Back to List</a>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</li>
                    <li class="list-group-item"><strong>User:</strong> {{ $transaksi->user->name }}</li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <span id="status-{{ $transaksi->id }}" class="status_name status-{{ $transaksi->status->id }}">{{ $transaksi->status->status_name }}</span>

                        <button class="btn btn-sm btn-warning change-status-btn mx-4" data-transaksi-id="{{ $transaksi->id }}">
                            Change Status
                        </button>
                    </li>
                    <li class="list-group-item"><strong>Delivery ID:</strong> {{ $transaksi->delivery->delivery_name }}</li>
                    <li class="list-group-item"><strong>Produks:</strong>
                        <ul>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($pa as $p)
                                @php
                                    $product = App\Models\Produk::find($p->product_id);
                                    $subtotal += $p->harga * $p->jumlah;
                                @endphp
                                <li>{{ $product->nama }} : {{ $p->harga }} x {{ $p->jumlah }}</li>
                            @endforeach
                        </ul>
                    </li>

                   

                    <!-- Display Subtotal -->
                    <li class="list-group-item"><strong>Subtotal:</strong> Rp {{ number_format($subtotal, 0, ',', '.') }}</li>

                    <li>
                        <img src="{{ asset('storage/' . $transaksi->bukti_transfer) }}" class="img-thumbnail">
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Add this script at the end of your Blade view -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.change-status-btn').on('click', function() {
                var transaksiId = $(this).data('transaksi-id');

                // Send an AJAX request to update the status
                $.ajax({
                    type: 'PATCH',
                    url: '/transaksis/update-status/' + transaksiId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('AJAX request successful');
                        // Update the status in the UI
                        var statusElement = $('#status-' + transaksiId);
                        statusElement.text(response.status);

                        // Change the background color based on the updated status
                        var backgroundColor = response.status_id == 2 ? 'green' : 'gray';
                        $(statusElement).find('.status_name').css('background-color', backgroundColor);
                        console.log('Status style updated');
                    },
                    error: function(error) {
                        console.log('AJAX request error', error);
                    }
                });
            });
        });
    </script>
@endsection
