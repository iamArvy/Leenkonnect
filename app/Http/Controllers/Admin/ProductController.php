<?php

namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateProductRequest;
use App\Services\ProductService;
use App\Models\Product;
class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::paginate(12);
        // dd($products);
        return inertia('Admin/Products', [
            'title' => 'Products',
            'products'=> $products
        ]);
    }

    public function show($slug)
    {
        $id = $request->product;
        try {
            $product = $this->productService->getProduct();
            $data = [
                'title' => 'Product',
                'product'=> $product
            ];
            return $this->render('Emporium/Product', $product);
        } catch (\Exception $e) {
            return redirect()->route('error', ['code' => 404, 'message' => 'Product Not Found']);
        }

    }

    public function create(CreateProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['images'] = $request->hasFile('images') ? $this->productService->uploadImage($request->hasFile('images')) : null;
            $product = $this->productService->create($this>store, $validated);
            return redirect()->back()->with('success', 'Product added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function createVariants(Request $request, Product $product)
    {
        $validated = $request->validated();
        foreach ($validated['variants'] as $item){
            $variant = $product->variants()->create($item);
        }
        // $variant = $product->variants()->create($validated);

    }
}
