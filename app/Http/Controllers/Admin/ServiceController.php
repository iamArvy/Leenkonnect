<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        // $ = Category::paginate(12);
        // dd('here');
        return inertia('Admin/Services', [
            'title' => 'Services',
            // 'categories'=> $categories
        ]);
    }

    public function create() {
        // Show form to create a new product
    }

    public function store(Request $request) {
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
