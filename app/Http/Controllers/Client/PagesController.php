<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Review;
class PagesController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::isfeatured()->limit(4)->get();

        $reviews = Review::latest()->limit(9)->get();
        // dd(Product::all()->with('reviews'));
        return Inertia::render('Client/Home',['featuredProducts'=>$featuredProducts]);
    }
}
