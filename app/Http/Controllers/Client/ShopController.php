<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ShopController extends Controller
{
    // get list of products
    public function index(){
        $products = Product::latest()->paginate(10);

        return view('client.shop.index', compact('products'));
    }

    // get product filter
    public function filter(Request $request)
    {
        $priceRanges = $request->input('price_range');
        $productsAll = Product::query();

        if ($priceRanges) {
            foreach ($priceRanges as $range) {
                [$minPrice, $maxPrice] = explode('-', $range);
                $productsAll->orWhereBetween('price', [$minPrice, $maxPrice]);
            }
        }

        $products = $productsAll->latest()->paginate(10);

        return view('client.shop.index', compact('products', 'priceRanges'));
    }

    // get product search by name
    public function searchByName(Request $request){
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'like', '%'.$keyword.'%')->latest()->paginate(10);

        return view('client.shop.index', compact('products'));
    }
}
