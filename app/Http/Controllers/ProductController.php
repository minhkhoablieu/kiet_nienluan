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
        
        $products = Product::where('active', true);

        if ($request->get('price') != null) {
            $price = explode("-", $request->get('price'));
            $minPrice = $price[0];
            $maxPrice = $price[1];

            $products = $products->whereBetween('sale', [$minPrice, $maxPrice]);
        }
        if($request->get('search') != null)
        {
            if(is_numeric($request->get('search')))
            {
                $products = $products->whereBetween('sale', [$request->get('search')-100000, $request->get('search')+100000]);
            }
            else
            {
                $products = $products->where('name', 'like', "%{$request->get('search')}%");
            }
        }
        $products = $products->Category($request)->paginate(9)->appends(request()->query());
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
