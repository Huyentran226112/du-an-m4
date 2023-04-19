<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function getAllCart()
    {
        // Cache::forget('carts');
        $products = [];
        $carts = Cache::get('carts');
        if ($carts) {
            $carts = array_values($carts);
        } else {
            $carts = [];
        }
        return response()->json($carts);
        
    }
    function addToCart(Request $request)
    {
        
        $id = $request->id;
        $product = Product::find($id);
        $carts = Cache::get('carts');
        if (isset($carts[$id])) {
            $carts[$id]['quantity']++;
            $carts[$id]['price'] = $product->price;
        } else {
            $carts[$id] = [
                'id' => $id,
                'quantity' => 1,
                'name' => $product->name,
                'price' => $product->price,
                'image' => url('/').'/public/assets/product/'.$product->image,
             
            ];
        }
        Cache::put('carts', $carts);
        return response()->json($carts);
    }
    function removeToCart(Request $request)
    {
      $id= $request->id;
        try {
            $carts = Cache::get('carts');
            unset($carts[$id]);
            Cache::put('carts', $carts);
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }
    function updateCart($id, $quantity)
    {
        try {
            $carts = Cache::get('carts');
            $carts[$id]['quantity'] = $quantity;
            Cache::put('carts', $carts);
        } catch (\Exception $e) {
            Log::error('message: ' . $e->getMessage() . 'line: ' . $e->getLine() . 'file: ' . $e->getFile());
        }
    }
 
}