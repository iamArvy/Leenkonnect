<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog\Post;
use App\Models\Blog\Category;

class BlogController extends Controller
{
    // public function index(Request $request)
    // {
    //     $blogs = Blog::latest()->paginate(15);
    //     $data = [
    //         'blogs' => $blogs
    //     ];
    //     return inertia('Client/BlogCatalog', $data);
    // }
    public function index(Request $request)
    {
        $search = $request->input('search') ?? null;
        $category = $request->input('category') ?? null;

        // Start the query
        $query = Post::with('category')->latest() ?? null;

        // Apply search filter
        if ($search) {
            $query->where('title', 'LIKE', '%' . strtolower($search) .'%');
                // ->orWhere('description', 'LIKE', "%{$search}%");
        }

        // Apply category filter
        if ($category) {
            $query->where('category_id', $category);
        }

        $filters = [
            'search' =>$search,
            'category'=>$category,
        ];
        // Get paginated results
        $categories = Category::all() ?? null;
        $posts = $query->paginate(12); // Ensure query string persists
        // dd($blogs);
        $data = [
            'posts' => $posts,
            'categories' => $categories,
            'filters' => $filters
            // 'filters' => $request->only(['search', 'category', 'price_range']),
        ];
        return inertia('Client/BlogCatalog', $data);
    }
    public function show(Post $blog)
    {
        // $product = Blog::where('slug', $slug)->first();
        $data = [
            'post' => $blog,
        ];

        return inertia('Client/Blog', $data);
    }
}
