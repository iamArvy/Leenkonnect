<?php
namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;

class CartRepository
{
    public function addProduct($userId, $productId, $quantity)
    {
        return Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $quantity
        ]);
    }

    public function updateQuantity($userId, $productId, $quantity)
    {
        $cart = Cart::where('user_id', $userId)->where('product_id', $productId)->first();
        if ($cart) {
            $cart->update(['quantity' => $quantity]);
        }
        return $cart;
    }

    public function transferCart($guestSessionId, $userId)
    {
        // Transfer all guest cart items to the user's cart
        return Cart::where('session_id', $guestSessionId)->update(['user_id' => $userId]);
    }

    public function getUserCart($userId)
    {
        return Cart::where('user_id', $userId)->get();
    }
}
