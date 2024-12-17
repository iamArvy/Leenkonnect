<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store\Product;
use App\Models\Store\Category;
use App\Models\Store\Promotion;
class ShopController extends Controller
{
    public function index()
    {
        $promotions = Promotion::with(['products' => function ($query){
            $query->orderBy('products.created_at', 'desc')->take(15);
        }])->get();
        $categories = Category::with(['products' => function ($query) {
            $query->latest()->limit(15);
        }])->get();

        $data = [
            'promotions' => $promotions,
            'categories' => $categories
        ];

        return inertia('Client/Shop', $data);
    }

    public function catalog(Request $request)
    {
        $search = $request->input('search') ?? null;
        $category = $request->input('category') ?? null;
        $priceRange = $request->input('price_range') ?? null;

        // Start the query
        $query = Product::latest() ?? null;

        // Apply search filter
        if ($search) {
            $query->where('name', 'LIKE',  '%' . strtolower($search) .'%')
                ->orWhere('description', 'LIKE', "%{$search}%");
        }

        // Apply category filter
        if ($category) {
            $query->where('category_id', $category);
        }

        // Apply price range filter
        if ($priceRange) {
            [$minPrice, $maxPrice] = explode('-', $priceRange);
            $query->whereBetween('price', [(float)$minPrice, (float)$maxPrice]);
        }

        $filters = [
            'search' =>$search,
            'category'=>$category,
            'price_range'=>$priceRange
        ];
        // Get paginated results
        $categories = Category::all() ?? null;
        $products = $query->paginate(12); // Ensure query string persists
        $data = [
            'products' => $products,
            'categories' => $categories,
            'filters' => $filters
            // 'filters' => $request->only(['search', 'category', 'price_range']),
        ];
        return inertia('Client/Catalog', $data);
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $data = [
            'product' => $product,
        ];

        // dd($product);
        return inertia('Client/Product', $data);
    }
}
