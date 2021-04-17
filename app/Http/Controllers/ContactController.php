<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    public function index()
    {
        return view('public.contact.index');
    }
    public function store(Request $request)
    {

        if(Contact::create($request->all())){
            return true;
        }

    }

}
