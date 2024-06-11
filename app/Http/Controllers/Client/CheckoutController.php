<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CreateOrderRequest;
use App\Models\Order;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function create(){
        $cartContents = Cart::content();
        // dd($cartContents);
        return view('client.checkout.index', compact('cartContents'));
    }

    public function store(CreateOrderRequest $request){
        $dataCreate = $request->all();
        // dd($dataCreate);exit;
        Order::create($dataCreate);
        foreach(Cart::content() as $row){
            // dd($row);exit;
            ProductOrder::create([
                'order_id' => $row->id,
                'product_name' => $row->name,
                'product_size' => null,
                'product_quantity' => $row->qty,
                'product_price' => $row->price
            ]);
        }

        Cart::destroy();
        return to_route('checkout')->with(['message' => 'Create Order Success']);
    }
}
