<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeranjangRequest;
use App\Http\Requests\UpdateKeranjangRequest;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function updateQuantity(Request $request, $id)
    {
        $this->middleware('csrf');

        // Validate the request
        $request->validate([
            'newQuantity' => 'required|integer|min:1', // Adjust validation rules as needed
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Find the cart item
        $cartItem = Keranjang::where('id', $id)
            ->where('user_id', $user->id)
            ->first();

        // Check if the cart item exists
        if ($cartItem) {
            // Update the quantity
            $cartItem->update(['jumlah' => $request->input('newQuantity')]);

            // Calculate the total price after the update
            $totalHarga =$cartItem->jumlah * $cartItem->produk->harga;
        
            // Return a response with the updated total price
            return response()->json(['totalHarga' => $totalHarga]);
        }

        // Return an error response if the cart item is not found
        return response()->json(['error' => 'Cart item not found'], 404);
    }

    public function all(){
        
        
        $userId = Auth::id();
        

        // Fetch Keranjang records for the authenticated user
        $keranjangs = Keranjang::where('user_id', $userId)->get();

        

        return view('keranjang', compact('keranjangs'));
    }

    public function showPayment()
    {
        $userId = Auth::id();

        // Fetch Keranjang records for the authenticated user
        $keranjangs = Keranjang::where('user_id', $userId)->get();
        return view('formbayar', compact('keranjangs'));
    }
        public function index()
    {
        //
    }
    public function addToCart(Request $request, $productId)
    {
        // Ambil produk berdasarkan ID
        $product = Produk::findOrFail($productId);

        // Cek apakah produk sudah ada di keranjang pengguna saat ini
        $existingCartItem = Keranjang::where('user_id', auth()->user()->id)
            ->where('produk_id', $product->id)
            ->first();

        // Jika produk sudah ada di keranjang, tingkatkan jumlahnya
        if ($existingCartItem) {
            $existingCartItem->jumlah += 1;
            $existingCartItem->save();
        } else {
            // Jika produk belum ada di keranjang, tambahkan sebagai item baru
            Keranjang::create([
                'user_id' => auth()->user()->id,
                'produk_id' => $product->id,
                'jumlah' => 1,
            ]);
        }

        // Tampilkan pemberitahuan sebagai toast
        $message = 'Item added to cart successfully';
        return redirect()->back()->with('toast', compact('message'));
    }

    public function processPayment(Request $request)
    {
        // Validate the form data
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'delivery' => 'required|in:1,2', 
        ]);
    
        $buktiTransferPath = $request->file('bukti_transfer')->store('bukti_transfer', 'public');
    
        $transaksi = Transaksi::create([
            'tanggal' => Carbon::now(),
            'bukti_transfer' => $buktiTransferPath,
            'user_id' => auth()->user()->id,
            'status_id' => 2, 
            'delivery_id' => $request->input('delivery'),
        ]);
    
        $keranjangs = auth()->user()->keranjang;
        
        foreach ($keranjangs as $keranjang) {
            // Mengurangi stok produk sesuai dengan jumlah di keranjang
            $produk = $keranjang->produk;
            $produk->stok -= $keranjang->jumlah;
            $produk->save();
        }
    
        $transaksi->transaksi_produk()->createMany($keranjangs->map(function ($keranjang) {
            return [
                'product_id' => $keranjang->produk_id,
                'harga' => $keranjang->produk->harga,
                'jumlah' => $keranjang->jumlah,
            ];
        })->toArray());
    
        // Menghapus item di keranjang setelah transaksi selesai
        auth()->user()->keranjang()->delete();
    
        return redirect('/')->with('success', 'Payment successful! Thank you for your purchase.');
    }
    
    public function removeFromCart($id)
    {
        $keranjang = Keranjang::findOrFail($id);

        // Hapus item dari keranjang
        $keranjang->delete();

        return response()->json(['message' => 'Item removed from cart successfully']);
    }
  

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
    public function store(StoreKeranjangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeranjangRequest $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
