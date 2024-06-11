<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('client.product.show', compact('product'));
    }
}
