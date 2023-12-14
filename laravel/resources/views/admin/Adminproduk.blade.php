@extends('layouts.template2')


@section('content')


<table class="table table-dark table-striped">
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
                <td>{{ $produk->nama }}</td>
                <td>{{ $produk->harga }}</td>
                <td>{{ $produk->stok }}</td>
                <td>{{ $produk->kategori_id }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection