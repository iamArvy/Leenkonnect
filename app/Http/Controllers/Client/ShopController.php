<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ShopController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::isfeatured()->limit(15)->get();
        $categories = Category::with(['products' => function ($query) {
            $query->where('is_active', true)->limit(15);
        }])->get();

        // dd($categories);
        $data = [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories
        ];

        return inertia('Client/Shop', $data);
    }

    public function catalog(Request $request, $category)
    {
        $categories = Category::all();
        $category = Category::where('slug', $category)->first();
        $products = $category->products()->cursorPaginate(15);
        $data = [
            'category' => $category->name,
            'products' => $products,
            'categories' => $categories
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'products' => $products,
            ]);
        }
        return inertia('Client/Catalog', $data);
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $data = [
            'product' => $product,
        ];

        return inertia('Client/Product', $data);
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%')->paginate(12);
        $data = [
            'products' => $products,
        ];

        return inertia('Client/Search', $data);
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
