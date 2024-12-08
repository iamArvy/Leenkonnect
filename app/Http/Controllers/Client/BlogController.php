<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::latest()->paginate(15);
        $data = [
            'blogs' => $blogs
        ];
        return inertia('Client/BlogCatalog', $data);
    }

    public function show($slug)
    {
        $product = Blog::where('slug', $slug)->first();
        $data = [
            'blog' => $blog,
        ];

        return inertia('Client/Blog', $data);
    }
}
