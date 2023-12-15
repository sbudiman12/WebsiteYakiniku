<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
         * Display a listing of the resource.
     */
    public function all() {

       $kategoris = Kategori::all();

       return view('admin/kategori', compact('kategoris'));

    }

    public function lihatSatu(Kategori $kategori) {

        $kategori->load('produks');

        return view('admin/adminkategoridetail', compact('kategori'));

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
        return view('admin/kategoriadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_name' => 'required|string|max:255',
        ]);

        Kategori::create([
            'kategori_name' => $validatedData['kategori_name'],
        ]);

        return redirect()->route('kategoris.index')->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin/kategoriedit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'kategori_name' => 'required|string|max:255',
        ]);
    
        $kategori->update([
            'kategori_name' => $validatedData['kategori_name'],
        ]);
    
        return redirect()->route('kategoris.index')->with('success', 'Category updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
{

    $kategori->delete();

    return redirect()->route('kategoris.index')->with('success', 'Product deleted successfully!');
}
}
