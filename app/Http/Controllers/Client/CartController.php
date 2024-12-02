<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    public function __construct()
    {
        $this->cartService = new \App\Services\CartService();
    }

    public function add(Request $request)
    {
        dd('here');
        $id = $request->id;
        $quantity = $request->quantity;
        try{
            $this->cartService->add($id, $quantity);
            dd($this->cartService->getCart());
            return back()->with('success', 'Product added to cart successfully!');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return back()->with('success', 'Cart updated successfully!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return back()->with('success', 'Product removed successfully!');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Cart cleared successfully!');
    }
}
