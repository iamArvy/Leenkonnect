<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $brand = $request->input('brand');
        // $priceRange = $request->input('price_range'); // example: "0-100"

        // Start the query
        $query = Product::latest() ?? null;

        // Apply search filter
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }

        // Apply category filter
        if ($category) {
            $query->where('category_id', $category);
        }

        if($brand){
            $query->where('brand_id', $brand);
        }

        // Apply price range filter
        // if ($priceRange) {
        //     [$minPrice, $maxPrice] = explode('-', $priceRange);
        //     $query->whereBetween('price', [(float)$minPrice, (float)$maxPrice]);
        // }

        // Get paginated results
        $categories = Category::all() ?? null;
        $brands = Brand::all() ?? null;
        $products = $query->paginate(12)->withQueryString(); // Ensure query string persists
        return inertia('Admin/Products', [
            'title' => 'Products',
            'categories'=> $categories,
            'brands' => $brands,
            'products'=> $products,
            'filters' => $request->only(['search', 'category', 'brand']),
        ]);
    }

    public function store(ProductRequest $request)
    {
        try {
            $validated = $request->validated();
        // dd($validated);
        $validated['image'] = $request->hasFile('image') ? $this->productService->storeImage($request->file('image')) : null;
        $validated['gallery'] = $request->hasFile('gallery') ? $this->productService->storeGallery($request->file('gallery')) : null;
        $product = Product::create($validated);
        dd($product);
        return redirect()->back()->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $validated = $request->validated();
            $validated['image'] = $request->hasFile('image') ? $this->productService->updateImage($request->hasFile('image'), $product->image) : $product->image;
            $product->update($validated);
            return redirect()->back()->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteImage($product->image);
        $this->productService->deleteGallery($product->gallery);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function addGalleryImage(Request $request, Product $product)
    {
        $currentGallery = $product->gallery;
        $gallery = $this->productService->addToGallery($request->file('image'), $currentGallery);
        $product->update(['gallery' => $gallery]);
        return back()->with('success', 'Image added successfully.');
    }

    public function deleteGalleryImage(Request $request, Product $product)
    {
        $currentGallery = $product->gallery;
        try {
            $gallery = $this->productService->removeFromGallery($request->image, $currentGallery);
            $product->update(['gallery' => $gallery]);
            return back()->with('success', 'Image deleted successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
