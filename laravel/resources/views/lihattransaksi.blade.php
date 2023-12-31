@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h2 class="py-5">Detail Transaksi</h2>

        <div class="card">

                <div class="card-header cbbg seasalt">Informasi Transaksi</h5></div>
                {{-- <a href="/profil" class="btn btn-primary m-4">Back to Profile</a> --}}
                <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</li>
                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <span id="status-{{ $transaksi->id }}" class="status_name status-{{ $transaksi->status->id }}">{{ $transaksi->status->status_name }}</span>

                    </li>
                    <li class="list-group-item"><strong>Metode Pengiriman: </strong> {{ $transaksi->delivery->delivery_name }}</li>

                    <li class="list-group-item"><strong>Alamat: </strong>{{$transaksi->alamat}}</li>

                    <li class="list-group-item"><strong>Pesanan:</strong>


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
                    <li class="list-group-item"><strong>Bukti:</strong>

                        <li class="list-group-item">

                            <img src="{{ asset('storage/' . $transaksi->bukti_transfer) }}" class="img-thumbnail">
                        </li>


                    </li>

                </ul>
            </div>
        </div>
    </div>


@endsection
