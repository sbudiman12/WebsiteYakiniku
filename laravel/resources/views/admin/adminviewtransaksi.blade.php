@extends('layouts.template2') 

@section('content')
    <div class="container">
        <h2>Transaksi List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>User ID</th>
                    <th>Status ID</th>
                    <th>Delivery ID</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis->sortByDesc('tanggal') as $transaksi)
                    <tr>
                        <td><a href="/transaksis/{{$transaksi['id']}}">{{ $transaksi->tanggal }}</a></td>
                        <td>{{ $transaksi->user->name }}</td>
                        <td>{{ $transaksi->status->status_name }}</td>
                        <td>{{ $transaksi->delivery->delivery_name }}</td>
                        <td>{{ 
                        
                        
                        calculateTotalHarga($transaksi->transaksi_produk)
                       
                        

                        }}
                    
                    @if($transaksi->delivery->id === 2)
                            + 7000
                        
                    @endif
                    
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@php
    function calculateTotalHarga($transaksiProduks) {
        $totalHarga = 0;
        foreach ($transaksiProduks as $transaksiProduk) {
            $totalHarga += $transaksiProduk->harga * $transaksiProduk->jumlah;
        }
        return $totalHarga;
    }
@endphp
