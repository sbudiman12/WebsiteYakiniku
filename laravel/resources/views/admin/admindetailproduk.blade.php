@extends('layouts.template2')

@section('content')

<h1>Product Details</h1>

<p>Name: {{ $produk->nama }}</p>
<p>Price: {{ $produk->harga }}</p>
<p>Stock: {{ $produk->stok }}</p>
<p>Category ID: {{ $produk->kategori_id }} ({{$produk->kategori->kategori_name}})</p>
<p>Description: {{ $produk->deskripsi }}</p>
<img src="{{ asset($produk->gambar) }}" alt="Product Image" style="max-width: 300px; max-height: 300px;">
<!-- Adjust the style based on your design preferences -->

@endsection
