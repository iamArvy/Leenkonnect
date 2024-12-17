<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store\Product;
use App\Models\Store\Order;
use App\Models\Store\OrderItem;
use App\Models\Store\Delivery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderDetailsMail;
use App\Services\CartService;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = app(CartService::class)->getCart();
        if(!$cart || $cart == []) return back()->with('error');
        return inertia('Client/Checkout');
    }

    public function store(Request $request)
    {
        $cart = app(CartService::class)->getCart();
        if(!$cart || $cart == []) return back()->with('error');

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required'
        ]);

        $address = [
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state
        ];
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['total'];
        }

        $user_id = auth()->user() ? auth::user()->id : null;
        $order = Order::create([
            'order_number' => 'ORD-' . time(),
            'total' => $total,
            'user_id' => $user_id,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        $delivery = Delivery::create([
            'order_id' => $order->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $address
        ]);

        session()->forget('cart');
        Mail::send(new OrderDetailsMail([
            'order' => $order,
            'delivery' => $delivery,
            'items' => $cart
        ]));
        // return redirect()->route('checkout.success');
    }
}
