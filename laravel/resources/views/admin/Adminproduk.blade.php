@extends('layouts.template2')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $produk)
            <tr>
                <td><a href="/products/{{$produk['id']}}">{{ $produk->nama }}</a></td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
                <td><a href="/kategoris/{{$produk['kategori_id']}}">{{ $produk->kategori_id }}</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
