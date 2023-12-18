<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function all()
    {

        $transaksis = Transaksi::all();



        return view('admin/adminviewtransaksi', compact('transaksis'));
    }

    public function view(Transaksi $transaksi)
    {

        // Eager load the necessary relationships
        $transaksi->load('transaksi_produk');

        // Access the transaksi_produk relationship and then the produk relationship
        $pa = $transaksi->transaksi_produk;

        $pa->load('produk');


        return view('admin/viewtransaksi', compact('transaksi', 'pa'));
    }

    // TransaksiController.php

    public function updateStatus(Transaksi $transaksi)
    {
        $transaksi->status_id = $transaksi->status_id === 1 ? 2 : 1; // Toggle status between 1 and 2
        $transaksi->save();

        return response()->json(['status' => $transaksi->status->status_name]);
    }


<<<<<<< Updated upstream
=======
    public function all() {

        $transaksis = Transaksi::all();

        $transaksis->load('transaksi_produk');

        return view('admin/adminviewtransaksi', compact('transaksis'));
    }

    public function view(Transaksi $transaksi) {

        return view('admin/viewtransaksi', compact('transaksi'));
    }

>>>>>>> Stashed changes
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
