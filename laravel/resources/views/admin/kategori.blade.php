@extends('layouts.template2')

@section('content')

<a href="/kategorisadd">Tambah Kategori</a>

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
                    <a href="/kategorisedit/{{$produk['id']}}" class="btn btn-warning">Update</a>
                    
                    <form action="{{ route('kategoris.destroy', $produk) }}" method="post">
                        @csrf
                        @method('DELETE')
                    
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                            Delete
                        </button>
                    </form>
                    

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
