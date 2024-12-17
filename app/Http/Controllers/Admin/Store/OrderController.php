<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store\Order;

class OrderController extends Controller
{
    public function index(Request $request){
        $orn = request()->query('orn') ?? null;
        $sts = request()->query('sts') ?? null;
        $filters = [
            'sts' =>$sts,
            'orn'=>$orn,
        ];
        // $priceRange = $request->input('price_range'); // example: "0-100"

        // Start the query
        $query = Order::with('user')->latest() ?? null;

        // Apply search filter
        if ($orn) {
            $query->where('order_number', 'LIKE', "%{$orn}%");
        }

        // Apply category filter
        if ($sts) {
            $query->where('status', $sts);
        }

        // Apply price range filter
        // if ($priceRange) {
        //     [$minPrice, $maxPrice] = explode('-', $priceRange);
        //     $query->whereBetween('price', [(float)$minPrice, (float)$maxPrice]);
        // }

        // Get paginated results
        $statusList = ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'];
        $orders = $query->paginate(12)->withQueryString(); // Ensure query string persists
        // dd($orders);
        return inertia('Admin/Store/Orders', [
            'title' => 'Orders',
            'statusList'=> $statusList,
            'orders'=> $orders,
            'filters' =>$filters,
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
