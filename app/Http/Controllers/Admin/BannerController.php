<?php


namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends \App\Http\Controllers\Controller
{

    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index',[
            'banners' => $banners
        ]);
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        Banner::create($request->all()); //insert into .... . ...
        return redirect(route('admin.banners.index'));
    }


    public function update(Request $request, Banner $banner)
    {
        $banner->update($request->all());
        return redirect(route('admin.banners.index'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',[
            'banner' => $banner
        ]);
    }

    public function destroy(Banner $banner)
    {
        return $banner->delete();
    }



}
