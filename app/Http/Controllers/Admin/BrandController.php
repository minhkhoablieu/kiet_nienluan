<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index',[
            'brands' => $brands
        ]);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        Brand::create($request->all());
        return redirect(route('admin.brands.index'));
    }


    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());
        return redirect(route('admin.brands.index'));
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit',[
            'brand' => $brand
        ]);
    }

    public function destroy(Brand $brand)
    {
        return $brand->delete();
    }
}
