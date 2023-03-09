<?php

namespace App\Http\Controllers\Shop;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Doctrine\Common\Cache\Cache;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
     //view giỏ hàng

     public function cart()
     {
         return view('shop.includes.cart');
     }
     public function addToCart($id)
     {
         $product = Product::find($id);
         if(!$product) {
             abort(404);
         }
         $cart = session()->get('cart');
         // if cart is empty then this the first product
         if(!$cart) {
             $cart = [
                     $id => [
                         "name" => $product->name,
                         "quantity" => 1,
                         "price" => $product->price,
                         "image" => $product->image
                     ]
             ];
            //  dd($cart);
             session()->put('cart', $cart);
             return redirect()->route('show.cart')->with('success', 'Product added to cart successfully!');
         }
         // if cart not empty then check if this product exist then increment quantity
         if(isset($cart[$id])) {
             $cart[$id]['quantity']++;
            //  dd($cart);

             session()->put('cart', $cart);
             return redirect()->route('show.cart')->with('success', 'Product added to cart successfully!');
         }
         // if item not exist in cart then add to cart with quantity = 1
         $cart[$id] = [
             "name" => $product->name,
             "quantity" => 1,
             "price" => $product->price,
             "image" => $product->image
         ];
         session()->put('cart', $cart);
         $product->save();
         return redirect()->route('show.cart')->with('success', 'Product added to cart successfully!');
     }
     public function update(Request $request)
     {
         if($request->id and $request->quantity)
         {
             $cart = session()->get('cart');
             $cart[$request->id]["quantity"] = $request->quantity;
             session()->put('cart', $cart);
             session()->flash('success', 'Cart updated successfully');
         }
     }
     public function remove(Request $request)
     {
         if($request->id) {
             $cart = session()->get('cart');
             if(isset($cart[$request->id])) {
                 unset($cart[$request->id]);
                 session()->put('cart', $cart);
             }
             session()->flash('success', 'Product removed successfully');
         }
     }
}
