@extends('layouts.template2')

@section('content')

<div class="container mt-5">
    <h1>Edit Category</h1>

    <form action="{{ route('kategoris.update', $kategori) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kategori_name">Category Name:</label>
            <input type="text" class="form-control" name="kategori_name" value="{{ $kategori->kategori_name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

@endsection
