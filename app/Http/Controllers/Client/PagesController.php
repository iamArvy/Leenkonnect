<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\Testimonial;
class PagesController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::isfeatured()->limit(4)->get();
        $testimonials = Testimonial::latest()->limit(9)->get();
        return Inertia::render('Client/Home',['featuredProducts'=>$featuredProducts, 'testimonials' => $testimonials]);
    }
}
