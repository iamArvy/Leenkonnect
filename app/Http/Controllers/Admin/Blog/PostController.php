<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Post;
use App\Models\Blog\Category;
use App\Http\Requests\Blog\PostRequest;
use App\Http\Requests\Blog\PostUpdateRequest;
use App\Services\ImageService;
class PostController extends Controller
{
    public function index()
    {
        $q = request()->query('q') ?? null;
        $c = request()->query('c') ?? null;
        $filters = [
            'q' =>$q,
            'c'=>$c,
        ];

        // Start the query
        $query = Post::with('category')->latest() ?? null;

        // Apply search filter
        if ($q) {
            $query->where('title', 'LIKE', "%{$q}%");
        }

        if ($c) {
            $query->where('category_id', $c);
        }

        $blogs = $query->paginate(12)->withQueryString(); // Ensure query string persists
        return inertia('Admin/Blog/Blogs', [
            'title' => 'Blogs',
            'blogs' => $blogs,
            'categories' => Category::all(),
            'filters' =>$filters,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, ImageService $imageService)
    {
        $validated = $request->validated();
        $validated['image'] = $request->hasFile('image') ? $imageService->storeImage($request->file('image'), 'blogs/images') : null;
        Post::create($validated);
        return back()->with('success', 'Post Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $validated = $request->validated();
        $validated['image'] = $request->hasFile('image') ? $imageService->storeImage($request->file('image'), 'blogs/images') : $post->image;
        $post->update($validated);
        return back()->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted Successfully');
    }
}
