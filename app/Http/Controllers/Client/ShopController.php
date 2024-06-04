<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ShopController extends Controller
{
    // count product filter
    public function countProduct($start, $end){
        $numbers = Product::where('price', '>', $start)
                    ->where('price', '<', $end)
                    ->count();
        return $numbers;
    }

    // get list of products
    public function index(){
        $products = Product::latest()->paginate(10);

        $count_0_100 = $this->countProduct(0, 100);
        $count_101_200 = $this->countProduct(101, 200);

        return view('client.shop.index', compact('products', 'count_0_100', 'count_101_200'));
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

        $count_0_100 = $this->countProduct(0, 100);
        $count_101_200 = $this->countProduct(101, 200);

        $products = $productsAll->latest()->paginate(10);

        return view('client.shop.index', compact('products', 'priceRanges', 'count_0_100', 'count_101_200'));
    }

    // get product search by name
    public function searchByName(Request $request){
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'like', '%'.$keyword.'%')->latest()->paginate(10);

        $count_0_100 = $this->countProduct(0, 100);
        $count_101_200 = $this->countProduct(101, 200);

        return view('client.shop.index', compact('products', 'count_0_100', 'count_101_200'));
    }
}
