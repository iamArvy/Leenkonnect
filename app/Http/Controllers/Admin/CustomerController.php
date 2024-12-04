<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(){
        // $categories = Customer::paginate(12);
        return inertia('Admin/Customers', [
            'title' => 'Customers',
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
