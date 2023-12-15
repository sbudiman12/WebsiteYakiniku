@extends('layouts.template2')

@section('content')

<h1>Kategori</h1>

<p>NAMA KATEGORI: {{ $kategori->kategori_name }}</p>

<h3>PRODUK YANG ADA :</h3>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategori->produks as $produk)

            <tr>
                <td><a href="/products/{{$produk['id']}}">{{ $produk->nama }}</a></td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    
@endsection
