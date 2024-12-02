<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('client.booking.index');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
