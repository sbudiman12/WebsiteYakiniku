@extends('layouts.template2')

@section('content')

<a href="/addproduct">Tambah Kategori</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $produk)
            <tr>
                <td><a href="/kategoris/{{$produk['id']}}">{{ $produk->kategori_name }}</a></td>
              
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