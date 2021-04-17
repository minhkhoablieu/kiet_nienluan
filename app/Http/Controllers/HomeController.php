<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        $banners = Banner::where('active', true)->orderBy('order')->get();
        $brands = Brand::where('active', true)->orderBy('order')->get();
        $products = Product::latest()->where('active', true)->limit(4)->get();
        $categories = Category::where('active', true)->where('parent_id', 0)->get();
        $sponsors = Sponsor::where('active', true)->orderBy('order')->get();
        return view('public.home.index', [
            'banners' => $banners,
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
