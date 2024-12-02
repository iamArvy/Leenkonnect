<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
class PagesController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::isfeatured()->limit(8)->get();

        return Inertia::render('Client/Home',['featuredProducts'=>$featuredProducts]);
    }
}
