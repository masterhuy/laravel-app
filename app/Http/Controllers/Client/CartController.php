<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function index(){
        $products = Product::all();

        $cartContents = Cart::content();
        return view('client.cart.index', compact('products', 'cartContents'));
    }

    public function addToCart(Request $request){
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $product = Product::findOrFail($productId);

        Cart::add($product->id, $product->name, $quantity, $product->price);


        return redirect()->back()->with('success', 'Add to cart successfully');
    }

    public function removeItem($id){
        Cart::remove($id);
        return redirect()->back()->with('success', 'Delete from cart successfully');
    }
}
