<?php

// FavoritesController.php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Produk;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function addToFavorites(Request $request, $id)
    {
        $product = Produk::findOrFail($id);

        // Check if the product is already in favorites
        $existingFavorite = Favorites::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($existingFavorite) {
            return response()->json(['success' => false, 'message' => 'Product already in favorites']);
        }

        // Add the product to favorites
        auth()->user()->favorites()->create(['product_id' => $product->id]);

        return response()->json(['success' => true, 'message' => 'Product added to favorites']);
    }
}
