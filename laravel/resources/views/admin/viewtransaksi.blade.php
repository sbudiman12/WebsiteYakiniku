@extends('layouts.template2')

@section('content')

<div class="container">
    <h2>Transaction Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction Information</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</li>
                <li class="list-group-item"><strong>User ID:</strong> {{ $transaksi->user->user_name }}</li>
                <li class="list-group-item"><strong>Status ID:</strong> {{ $transaksi->status->status_name }}</li>
                <li class="list-group-item"><strong>Delivery ID:</strong> {{ $transaksi->delivery->delivery_name }}</li>
                <li class="list-group-item"><strong>Produks:</strong>
                    <ul>
                        @foreach($transaksi->transaksi_produk as $transaksiProduk)
                            <li>
                                {{ $transaksiProduk->produk->name }} -
                                Harga: {{ $transaksiProduk->harga }} 
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
