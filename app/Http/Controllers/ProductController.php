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
        $minPrice = 0;
        $maxPrice = 100000000;
        if ($request->get('price') != null) {
            $price = explode("-", $request->get('price'));
            $minPrice = $price[0];
            $maxPrice = $price[1];
        }

        $products = Product::where('active', true)
            ->where('name', 'ilike', "%{$request->get('search')}%")
            ->orWhereBetween('sale',  [$request->get('search') - 100000, $request->get('search') + 100000])
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->Category($request)
            ->paginate(9)->appends(request()->query());

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
