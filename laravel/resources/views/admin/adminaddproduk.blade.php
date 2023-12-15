@extends('layouts.template2')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Add New Product</h1>

    <form action="{{ route('produks.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" class="form-control" name="harga" min="0" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok:</label>
            <input type="number" class="form-control" name="stok" min="0" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" class="form-control" name="gambar" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" required></textarea>
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori:</label>
            <select class="form-select" name="kategori_id" required>
                <option value="" disabled selected>Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->kategori_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

@endsection
