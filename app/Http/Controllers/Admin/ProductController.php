<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $product;
    protected $role;

    public function __construct(Product $product){
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest('id')->paginate(5);
        return view('admin/products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id', 'name']);
        return view('admin/products/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $dataCreate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes) : [];
        // dd($request->sizes);exit;
        $product = Product::create($dataCreate);
        $dataCreate['image'] = $this->product->saveImage($request);
        $product->images()->create(['url' => $dataCreate['image']]);
        $product->categories()->attach($dataCreate['category_ids']);
        $sizeArray = [];
        foreach ($sizes as $size) {
            $sizeArray[] = [
                'product_id' => $product->id,
                'size' => $size->size,
                'quantity' => $size->quantity,
                'color' => null
            ];
        }
        // dd($sizeArray);
        ProductDetail::insert($sizeArray);

        return to_route('products.index')->with(['message' => 'Create successfull']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::get(['id', 'name']);
        return view('admin/products/show', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get(['id', 'name']);
        return view('admin/products/edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $dataUpdate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes) : [];
        $product = Product::findOrFail($id);
        $currentImage = $product->images->count() > 0 ? $product->images->first()->url : '';
        $dataUpdate['image'] = $this->product->updateImage($request, $currentImage);
        $product->update($dataUpdate);
        // dd($sizes);exit;
        $product->images()->delete();
        $product->images()->create(['url' => $dataUpdate['image']]);
        $product->categories()->sync($dataUpdate['category_ids']);
        $sizeArray = [];
        foreach ($sizes as $size) {
            $sizeArray[] = [
                'product_id' => $product->id,
                'size' => $size->size,
                'quantity' => $size->quantity,
                'color' => null
            ];
        }
        $product->details()->delete();

        ProductDetail::insert($sizeArray);

        return to_route('products.index')->with(['message' => 'Create successfull']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  $this->product->findOrFail($id);
        $product->images()->delete();
        $imageName =  $product->images->count() > 0 ? $product->images->first()->url : '';
        $this->product->deleteImage($imageName);
        $product->details()->delete();
        $product->delete();

        return to_route('products.index')->with(['message' => 'Delete successfully']);
    }
}
// 1716447281
