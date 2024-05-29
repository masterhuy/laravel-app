<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ShopController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);
        return view('client.shop.index', compact('products'));
    }
}
