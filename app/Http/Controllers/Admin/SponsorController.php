<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index',[
            'sponsors' => $sponsors
        ]);
    }

    public function create()
    {
        return view('admin.sponsors.create');
    }

    public function store(Request $request)
    {
        sponsor::create($request->all());
        return redirect(route('admin.sponsors.index'));
    }


    public function update(Request $request, Sponsor $sponsor)
    {
        $sponsor->update($request->all());
        return redirect(route('admin.sponsors.index'));
    }

    public function edit(Sponsor $sponsor)
    {
        return view('admin.sponsors.edit',[
            'sponsor' => $sponsor
        ]);
    }

    public function destroy(Sponsor $sponsor)
    {
        return $sponsor->delete();
    }
}
