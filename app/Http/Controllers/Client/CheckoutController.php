<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\CreateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function create(){
        $cartContents = Cart::content();
        return view('client.checkout.index', compact('cartContents'));
    }

    public function store(CreateOrderRequest $request){
        $dataCreate = $request->all();
        // dd($dataCreate);exit;
        Order::create($dataCreate);
        return to_route('checkout')->with(['message' => 'Create Order Success']);
    }
}
