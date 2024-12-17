<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Store\Product;
use App\Models\Testimonial;
use App\Models\Blog\Post;
use App\Models\Store\Promotion;
class PagesController extends Controller
{
    public function index()
    {
        $promotion = Promotion::latest()->where('name', 'featured')->first();
        $featuredProducts = $promotion ? $promotion->products()->take(4)->get() : null;
        $testimonials = Testimonial::latest()->limit(9)->get();
        $blogs = Post::latest()->limit(3)->get();
        return Inertia::render('Client/Home',['featuredProducts'=>$featuredProducts, 'testimonials' => $testimonials, 'blogs' => $blogs]);
    }

    public function services()
    {
        return Inertia::render('Client/Services');
    }

    public function about()
    {
        return Inertia::render('Client/About');
    }

    public function contact()
    {
        return Inertia::render('Client/Contact');
    }
}
