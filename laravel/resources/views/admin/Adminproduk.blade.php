@extends('layouts.template2')

@section('content')

<a href="/addproduct">Tambah Produk</a>

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
                <td>
                    <a href="/produks/{{$produk['id']}}/edit" class="btn btn-warning">Update</a>
                    
                    <form action="{{ route('produks.destroy', $produk->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                    
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                            Delete Product
                        </button>
                    </form>
                    

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
