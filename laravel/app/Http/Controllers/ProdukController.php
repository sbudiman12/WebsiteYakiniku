<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    public function all()
    {
        $produks = Produk::all();

        return view('admin/Adminproduk',compact('produks'));
    }

    public function lihatSatu(Produk $produk) {

        $produk->load('kategori');

        return view('admin/admindetailproduk', compact('produk'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Kategori::all();
        return view('admin/adminaddproduk', compact('categories'));
    }
    


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $gambarPath = $request->file('gambar')->store('produk_images', 'public');

        Produk::create([
            'nama' => $validatedData['nama'],
            'harga' => $validatedData['harga'],
            'stok' => $validatedData['stok'],
            'gambar' => $gambarPath,
            'deskripsi' => $validatedData['deskripsi'],
            'kategori_id' => $validatedData['kategori_id'],
        ]);

        return redirect()->route('produks.index')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
