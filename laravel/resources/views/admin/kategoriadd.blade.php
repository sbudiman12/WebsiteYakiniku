

@extends('layouts.template2')

@section('content')

<div class="container mt-5">
    <h1>Add New Category</h1>

    <form action="{{ route('kategoris.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="kategori_name">Category Name:</label>
            <input type="text" class="form-control" name="kategori_name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

@endsection
