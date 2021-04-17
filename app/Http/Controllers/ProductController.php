<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {

        $products = Product::where('active', true)
            ->where('name', 'ilike', "%{$request->get('search')}%")
            ->Category($request)
            ->paginate(16)->appends(request()->query());
        $productCount =  Product::where('active', true)->count();
        return view('public.product.index', [
            'products' => $products,
            'categories' => Category::where('parent_id', 0)->get(),
            'brands' => Brand::where('active', true)->get(),
            'productCount' => $productCount,
        ]);
    }
    public function show(Product $product)
    {
        $products = Product::latest()->where('active', true)->limit(4)->get();
        return view('public.product.show', [
            'product' => $product,
            'products' => $products
        ]);
    }
}
