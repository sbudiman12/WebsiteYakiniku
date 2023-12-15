@extends('layouts.template2')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produks as $produk)
            <tr>
                <td><a href="/products/{{$produk['id']}}">{{ $produk->nama }}</a></td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
                <td>{{ $produk->kategori_id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
