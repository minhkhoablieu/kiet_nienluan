<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create', [
            'categories' => Category::where('parent_id', 0)->get(),
            'brands' => Brand::where('active', true)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product();
        $product->name = $request->post('name');
        $product->slug = $request->post('slug');

        $product->amount = $request->post('amount');
        $product->price = $request->post('price');

        $product->specifications = $request->post('specifications');
        $product->content = $request->post('content');

        $product->thumbnail =  $request->post('thumbnail');
        $product->image =  $request->post('image');

        $product->user_id = $request->post('user_id');
        $product->brand_id = $request->post('brand');
        $product->active = $request->post('active');
        $product->is_new = $request->post('is_new');
        $product->size = $request->post('size');
        $product->sale = $request->post('sale');

        $product->save();

        $product->categories()->attach($request->post('categories'));
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::where('parent_id', 0)->get(),
            'brands' => Brand::where('active', true)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->size = $request->post('size');

        $product->name = $request->post('name');
        $product->slug = $request->post('slug');

        $product->amount = $request->post('amount');
        $product->price = $request->post('price');

        $product->specifications = $request->post('specifications');
        $product->content = $request->post('content');

        $product->thumbnail =  $request->post('thumbnail');
        $product->image =  $request->post('image');

        $product->user_id = $request->post('user_id');
        $product->brand_id = $request->post('brand');

        $product->active = $request->post('active');
        $product->is_new = $request->post('is_new');
        $product->sale = $request->post('sale');

        $product->categories()->sync($request->post('categories'));

        $product->save();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
