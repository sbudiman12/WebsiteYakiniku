<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class FavoritesController extends Controller
{
    public function updateQuantity(Request $request, $id)
    {
        // Your code here for updating quantity in favorites
        // ...

        return response()->json(['message' => 'Quantity berhasil diupdate']);
    }

    public function all()
    {
        $userId = Auth::id();

        // Fetch favorite products for the authenticated user
        $favoriteProducts = Favorites::where('user_id', $userId)
            ->with('produk') // Assuming you have a relation in Favorites model named 'produk'
            ->get();

        return view('favorites', compact('favoriteProducts'));
    }

    public function showPayment()
    {
        // Your code here for showing payment in favorites
        // ...

        // return view('formbayar-favorites', compact('favoriteProducts'));
    }

    public function index()
    {
        // Your code here for index action in favorites
        // ...
    }

    public function addToFavorites(Request $request, $productId)
    {
        // Check if the product is already in favorites
        $existingFavorite = Favorites::where('user_id', auth()->user()->id)
            ->where('produk_id', $productId)
            ->first();

        // If not, add it to favorites
        if (!$existingFavorite) {
            Favorites::create([
                'user_id' => auth()->user()->id,
                'produk_id' => $productId,
            ]);

            $message = 'Produk berhasil ditambahkan ke Favorites';
            return redirect()->back()->with('toast', compact('message'));
        }

        // You may want to return a response or redirect here if the product is already in favorites
        $message = 'Produk sudah ada di Favorites';
        return redirect()->back()->with('toast', compact('message'));
    }

    public function processPayment(Request $request)
    {
        // Your code here for processing payment in favorites
        // ...

        // return redirect('/favorites')->with('success', 'Payment successful! Thank you for your purchase.');
    }

    public function removeFromFavorites($id)
    {
        $keranjang = Favorites::findOrFail($id);

        // Hapus item dari keranjang
        $keranjang->delete();


        return response()->json(['message' => 'Produk berhasil dihapus dari favorites']);
    }

    // ... other methods ...
}
