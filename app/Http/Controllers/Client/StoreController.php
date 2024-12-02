<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('client.store.index');
    }

    public function show($id)
    {
        return view('client.store.show');
    }

    public function filter(Request $request)
    {
        return view('client.store.index');
    }
}
