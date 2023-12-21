@extends('layouts.template2')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Edit Product</h1>

    <form action="{{ route('produks.update', $produk->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="nama" value="{{ $produk->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" class="form-control" name="harga" value="{{ $produk->harga }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <input type="number" class="form-control" name="stok" value="{{ $produk->stok }}" min="0" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" class="form-control" name="gambar" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" required>{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori:</label>
            <select class="form-select" name="kategori_id" required>
                <option value="" disabled>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $produk->kategori_id ? 'selected' : '' }}>
                        {{ $category->kategori_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

@endsection
