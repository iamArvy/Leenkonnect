<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(12) ?? null;
        return inertia('Admin/Categories', [
            'title' => 'Categories',
            'categories'=> $categories
        ]);
    }

    public function create() {
        // Show form to create a new product
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            // 'description' => 'required',
        ]);

        Category::create($request->all());
        return back()->with('success', 'Category created successfully.');
        // Save a new product
    }

    public function show($id) {
        // Show a single product
    }

    public function edit($id) {
        // Show form to edit a product
    }

    public function update(Request $request, $id) {
        // Update an existing product
    }

    public function destroy($id) {
        // Delete a product
    }
}
