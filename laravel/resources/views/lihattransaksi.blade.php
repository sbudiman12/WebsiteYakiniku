@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h2>Transaction Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Transaction Information</h5>
                <a href="/profil" class="btn btn-primary m-4">Back to Profile</a>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <span id="status-{{ $transaksi->id }}" class="status_name status-{{ $transaksi->status->id }}">{{ $transaksi->status->status_name }}</span>

                    </li>
                    <li class="list-group-item"><strong>Delivery: </strong> {{ $transaksi->delivery->delivery_name }}</li>

                    <li class="list-group-item"><strong>Alamat: </strong>{{$transaksi->alamat}}</li>

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
                                <li><a href="/product/{{$product->id}}">{{ $product->nama }}</a> : {{ $p->harga }} x {{ $p->jumlah }}</li>
                            @endforeach
                        </ul>
                    </li>

                   

                    <!-- Display Subtotal -->
                    <li class="list-group-item"><strong>Subtotal:</strong> Rp {{ number_format($subtotal, 0, ',', '.') }}
                    
                        

                        @if($transaksi->delivery->id === 2)
                            
                        + 7.000 = Rp {{ number_format($subtotal + 7000, 0, ',', '.') }}

                        @endif

                        
                    
                    </li>

                    <li>
                        <img src="{{ asset('storage/' . $transaksi->bukti_transfer) }}" class="img-thumbnail">
                    </li>
                </ul>
            </div>
        </div>
    </div>

  
@endsection
